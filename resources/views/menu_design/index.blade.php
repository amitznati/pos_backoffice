@extends('backpack::layout')

@section('after_styles')
    <link rel="stylesheet" href="{{asset('gridstack.js-master')}}/dist/gridstack.css"/>


    <style type="text/css">
        .grid-stack {
            /*background: lightgoldenrodyellow;*/
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

        <div class="clearfix"></div>
        <div class="box box-primary">
        <div class="box-body" style="height: 500px;">
            <div class="row-fluid" >
                <div class="col-sm-10">
                    <div class="grid-stack">
                    </div>
                </div>
                <div class="col-sm-2">
                    
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

             $('#select-item-show').click(function(){
                $('#select-item-fields').toggle();
             })
             $("button[id^='select-product-id-']").click(function(){
                console.log('here')
             })
            var options = {
                height : 6,
                float: true
            };
            $('.grid-stack').gridstack(options);

            new function () {
                this.items = [
                    {x: 0, y: 0, width: 2, height: 2},
                    {x: 3, y: 1, width: 1, height: 2},
                    {x: 4, y: 1, width: 1, height: 1},
                    {x: 2, y: 3, width: 3, height: 1},
//                    {x: 1, y: 4, width: 1, height: 1},
//                    {x: 1, y: 3, width: 1, height: 1},
//                    {x: 2, y: 4, width: 1, height: 1},
                    {x: 2, y: 5, width: 1, height: 1}
                ];

                this.grid = $('.grid-stack').data('gridstack');

                this.addNewWidget = function () {
                    var node = this.items.pop() || {
                                x: 12 * Math.random(),
                                y: 5 * Math.random(),
                                width: 1 + 3 * Math.random(),
                                height: 1 + 3 * Math.random()
                            };
                    this.grid.addWidget($('<div><div class="grid-stack-item-content" /><div/>'),
                        node.x, node.y, node.width, node.height);
                    return false;
                }.bind(this);

                $('#add-new-widget').click(this.addNewWidget);
            };
        });
    </script>
    <script>$('.grid-stack').addTouch();</script>
@endsection