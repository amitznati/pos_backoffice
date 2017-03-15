@extends('backpack::layout')

@section('after_styles')
    <link rel="stylesheet" href="{{asset('gridstack.js-master')}}/dist/gridstack.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.2.0/knockout-min.js"></script>


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
            <a data-bind="click: showItemSelect, text: showText" class="btn btn-primary"></a>
            <a data-bind="click: save" class='btn btn-primary'><i class="glyphicon glyphicon-eye-open"></i>שמור</a>
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
                            <div data-bind="visible: itemSelectVisible()==false, component: {name: 'dashboard-grid', params: $data}"></div>
                            <div data-bind="visible: itemSelectVisible">
                                @include('menu_design.select_item')
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
        ko.components.register('dashboard-grid', {
            viewModel: {
                createViewModel: function (controller, componentInfo) {
                    var ViewModel = function (controller, componentInfo) {
                        var grid = null;

                        this.widgets = controller.widgets;
                        

                        this.afterAddWidget = function (items) {
                            if (grid == null) {
                                grid = $(componentInfo.element).find('.grid-stack').gridstack({
                                    auto: false,
                                    float: true,
                                    height: 9
                                }).data('gridstack');
                            }

                            var item = _.find(items, function (i) { return i.nodeType == 1 });
                            grid.addWidget(item);
                            ko.utils.domNodeDisposal.addDisposeCallback(item, function () {
                                grid.removeWidget(item);
                            });
                        };
                    };

                    return new ViewModel(controller, componentInfo);
                }
            },
            template: { element: 'gridstack-template' }
        });

        $(function () {
            var Controller = function (widgets) {
                var self = this;
                
                this.itemSelectVisible = ko.observable(false);
                this.showText = ko.observable('הוסף פריט');
                this.widgets = ko.observableArray(widgets);
                this.products = ko.observableArray({!!$products!!});
                console.log(this.products())
                this.addNewWidget = function () {
                    this.widgets.push({
                        x: 0,
                        y: 0,
                        width: Math.floor(1 + 3 * Math.random()),
                        height: Math.floor(1 + 3 * Math.random()),
                        auto_position: true
                    });
                    return false;
                };

                this.deleteWidget = function (item) {
                    self.widgets.remove(item);
                    return false;
                };

                this.showItemSelect = function(){
                    self.itemSelectVisible(!self.itemSelectVisible());
                    self.showText('הוסף פריט');
                    if(self.itemSelectVisible())
                        self.showText('בטל הוספת פריט');
                }

                this.save = function(){

                }

                this.itemSelect = function(item){
                    console.log(item);
                }
            };

            var widgets = [
                {x: 0, y: 0, width: 2, height: 2},
                {x: 2, y: 0, width: 4, height: 2},
                {x: 6, y: 0, width: 2, height: 4},
                {x: 1, y: 2, width: 4, height: 2}
            ];

            var controller = new Controller(widgets);
            ko.applyBindings(controller);
        });
    </script>
    </script>
    <template id="gridstack-template">
        <div class="grid-stack" data-bind="foreach: {data: widgets, afterRender: afterAddWidget}">
           <div class="grid-stack-item" data-bind="attr: {'display_name': $data.display_name, 'item-type': $data.type, 'item-id': $data.itemID, 'data-gs-x': $data.x, 'data-gs-y': $data.y, 'data-gs-width': $data.width, 'data-gs-height': $data.height, 'data-gs-auto-position': $data.auto_position}">
               <div class="grid-stack-item-content"><button data-bind="click: $root.deleteWidget">Delete me</button></div>
           </div></div><!-- <---- NO SPACE BETWEEN THESE CLOSING TAGS -->
    </template>

    <script>$('.grid-stack').addTouch();</script>
@endsection