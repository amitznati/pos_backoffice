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
                <div id="select-item-fields" class="row" style="display:none">
                    @include('menu_design.select_item')
                </div>
            </div>
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
        $(function () {
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

            $(".btn-product-select").click(function(){
                var row = $(this).closest("tr");    
                var id = row.find(".product-id").text(); 
                var name = row.find(".product-name").text(); 
                grid.addWidget($('<div><div class="grid-stack-item-content">' + name + '<div/><div/>'),
                        0, 0, 2, 2);
                itemClicked();
            });

            $('.grid-stack').on('added', function(event, items) {
                for (var i = 0; i < items.length; i++) {
                  console.log('item added');
                  console.log(items[i]);
                }
            });

            $('.grid-stack').on('dragstop', function(event, ui) {
                var grid = this;
                var element = event.target;
                console.log(element);
            });

            $('.grid-stack').on('resizestop', function(event, ui) {
                var grid = this;
                var element = event.target;
                console.log(element);
            });


        });
    </script>
    <script>$('.grid-stack').addTouch();</script>
@endsection