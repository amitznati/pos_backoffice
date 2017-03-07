@extends('backpack::layout')

@section('after_styles')
    <link rel="stylesheet" href="{{asset('gridstack.js-master')}}/dist/gridstack.css"/>


    <style type="text/css">
        .grid-stack {
            /*background: lightgoldenrodyellow;*/
        }
        .grid-stack-item{
            

        }
        .grid-stack-item-content{
            
            text-align: center;
            vertical-align: middle;
            background: rgb(123, 150, 15);
        }

       

    </style>
@endsection
@section('content')
    <section class="content-header">
        <h1 class="pull-{{$left}}">עיצוב תפריט</h1>
        <h1 class="pull-{{$right}}">
           <a class="btn btn-primary pull-{{$right}}" style="margin-top: -10px;margin-bottom: 5px" href="#">הוסף פריט</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix">
            <div class="box-body">
            <a id="select-item-show" class="btn btn-primary">הוסף פריט</a>
            <a id="btnSave" href="#" class='btn btn-primary'><i class="glyphicon glyphicon-eye-open"></i>שמור</a>
                <div id="select-item-fields" class="row" style="display:none">
                    @include('menu_design.select_item')
                </div>
            </div>
        </div>
        <div>
            <p>{{$currentMenu->name}}</p>
        </div>
        <div class="grid-stack-div">                  
            <div class="clearfix"></div>
            <div class="box box-primary">
                <div class="box-body" style="height: 720px;">
                    <div class="row-fluid" >
                        <div class="col-sm-12">
                            <div class="grid-stack">
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
</div>
    
@endsection

@section('after_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.0/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.5.0/lodash.min.js"></script>
    <script src="{{asset('gridstack.js-master')}}/dist/gridstack.all.js"></script>
    <script src="{{asset('gridstack.js-master')}}/dist/jquery.ui.touch.js"></script>

    <script type="text/javascript">
        

            function toTitleCase(str)
            {
                return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
            }

            console.log("{{url('menu_design.saveMenu') }}");
            

            var currentMenu = {!! $currentMenu !!};
            console.log(currentMenu);
            var isSelectItemOpen = false;

            var itemClicked = function()
            {
                $('#select-item-fields').toggle();
                $('.grid-stack-div').toggle();
                if(isSelectItemOpen)
                    $('#select-item-show').text('הוסף פריט');
                else
                    $('#select-item-show').text('בטל הוספת פריט');
                isSelectItemOpen = !isSelectItemOpen;
            }

            $('#select-item-show').click(itemClicked);
            
            var options = {
                height : 9,
                float: true,
            };
            

            $('.grid-stack').gridstack(options);
            var grid = $('.grid-stack').data('gridstack');

            var addItemToGrid = function(node)
            {
                grid.addWidget($('<div item-type="'+ node.displayable_type +'" item-id="'+ node.displayable_id +'"><div class="grid-stack-item-content">' + node.display_name + '<div/><div/>'),
                        node.index_row, node.index_column, node.number_of_rows, node.number_of_columns);
            }

            if(currentMenu)
            {
                currentMenu.contains_display_infos.forEach(function(displayInfo){
                    addItemToGrid(displayInfo);
                });
            }

            var creatNewDisaplyableItem = function(td,type)
            {
                var row = $(td).closest("tr");    
                var id = row.find("."+type+"-id").text(); 
                var name = row.find("."+type+"-name").text();
                var node = {
                    display_name: name,
                    displayable_id: id,
                    displayable_type: toTitleCase(type),
                    index_row: 0,
                    index_column: 0,
                    number_of_rows: 2,
                    number_of_columns: 2 
                } 
                return node;
            }

            $(".btn-product-select").click(function(){
                var node = creatNewDisaplyableItem(this,'product'); 
                addItemToGrid(node)               
                itemClicked();
            });

            

            $('.grid-stack').on('added', function(event, items) {
                for (var i = 0; i < items.length; i++) {
                  console.log('item added');
                }
            });

            $('.grid-stack').on('dragstop', function(event, ui) {
                var element = event.target;
                console.log(grid.grid.nodes[0]);
            });

            $('.grid-stack').on('resizestop', function(event, ui) {
                var element = event.target;

            });

            $('#btnSave').click(updateDatabase);

            function updateDatabase()
            {

                // make an ajax request to a PHP file
                // on our site that will update the database
                // pass in our lat/lng as parameters
                $.ajax( {url: "{{url('menu_design.saveMenu') }}", type: "GET", data: [ "Jon", "Susan" ] } );
                // $.post('{{url('menu_design.saveMenu') }}', {
                //      _token: $('meta[name=csrf-token]').attr('content'),
                //      nodes: grid.grid.nodes[0],
                //      menu_id: currentMenu.id
                //  }
                // )
                // .done(function(data) {
                //     alert(data);
                // })
                // .fail(function() {
                //     alert( "error" );
                // });
            }


        
    </script>
    <script>$('.grid-stack').addTouch();</script>
@endsection