@extends('backpack::layout')

@section('after_styles')
    <link rel="stylesheet" href="{{asset('gridstack.js-master')}}/dist/gridstack.css"/>


    <style type="text/css">
        .grid-stack {
            /*background: lightgoldenrodyellow;*/
        }

        .grid-stack-item-content {
            color: #2c3e50;
            text-align: center;
            background-color: #18bc9c;
        }

        .container-fixed { border: 1px solid red; }
        .col {
          border: 1px solid #ccc;
         /* text-align: center;*/
        }

        .container-fixed {
          bottom: 0;
          position: fixed;
          left: 0;
          right: 0;
          top: 0;
        }

        .container-fixed .col {
          height: 100%;
          overflow: auto;
        }

        .row-xs-12 { height: 100%; }
        .row-xs-11 { height: 91.66666666666666%; }
        .row-xs-10 { height: 83.33333333333334%; }
        .row-xs-9 { height: 75%; }
        .row-xs-8 { height: 66.66666666666666%; }
        .row-xs-7 { height: 58.333333333333336%; }
        .row-xs-6 { height: 50%; }
        .row-xs-5 { height: 41.66666666666667%;}
        .row-xs-4 { height: 33.33333333333333%;}
        .row-xs-3 { height: 25%; }
        .row-xs-2 { height: 16.666666666666664%; }
        .row-xs-1 { height: 8.333333333333332%; }
    </style>
@endsection
@section('content')
<section class="content-header">
    <h1 >Float grid demo</h1>
    <h1>
       <a id="add-new-widget" class="btn btn-default" style="margin-bottom: 5px" href="#">Add Widget</a>
    </h1>
</section>
<div class="content">
    <div class="clearfix"></div>

    @include('flash::message')

    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-body content">
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