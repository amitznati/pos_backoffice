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

            console.log("{{route('menu_design.saveMenu') }}");
            

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
                grid.addWidget($('<div display_name="'+node.display_name+'" item-type="'+ node.displayable_type +'" item-id="'+ node.displayable_id +'"><div class="grid-stack-item-content">' + node.display_name + '<div/><div/>'),
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
                    displayable_type: 'App\\Models\\'+ toTitleCase(type),
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

            $('#btnSave').click(function() {
                this.serializedData = _.map($('.grid-stack > .grid-stack-item:visible'), function (el) {
                        el = $(el);
                        var node = el.data('_gridstack_node');
                        return {
                            index_row: node.x,
                            index_column: node.y,
                            number_of_columns: node.width,
                            number_of_rows: node.height,
                            displayable_type: el.attr('item-type'),
                            displayable_id: el.attr('item-id'),
                            display_name: el.attr('display_name'),

                        };
                    }, this);
                    var nodes = JSON.stringify(this.serializedData, null, '    ');
                //Send the AJAX call to the server
                  $.ajax({
                  //The URL to process the request
                    'url' : '{{route('menu_design.saveMenu') }}',
                  //The type of request, also known as the "method" in HTML forms
                  //Can be 'GET' or 'POST'
                    'type' : 'POST',
                  //Any post-data/get-data parameters
                  //This is optional
                    'data' : {
                      'nodes': nodes,
                      'menu_id': currentMenu.id
                    },
                  //The response from the server
                    'success' : function(data) {
                    //You can use any jQuery/JavaScript here!!!
                      if (data == "success") {
                        alert('request sent!');
                      }
                    }
                  });
                });


        
    </script>
    <script>$('.grid-stack').addTouch();</script>
@endsection