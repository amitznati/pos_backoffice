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
                this.widgets = ko.observableArray({!!$currentMenu->containsDisplayInfos!!});
                this.products = ko.observableArray({!!$products!!});
                this.menus = ko.observableArray({!!$menus!!});
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
                    this.serializedData = _.map($('.grid-stack > .grid-stack-item:visible'), function (el) {
                        el = $(el);
                        var node = el.data('_gridstack_node');
                        return {
                            x: node.x,
                            y: node.y,
                            width: node.width,
                            height: node.height,
                            displayable_type: el.attr('displayable_type'),
                            displayable_id: el.attr('displayable_id'),
                            display_name: el.attr('display_name'),
                        };
                    }, this);
                    var nodes = JSON.stringify(this.serializedData, null, '    ');
                    $.post("{{route('menu_design.saveMenu') }}",
                    {
                        nodes: nodes,
                        menu_id: {!!$currentMenu->id!!}
                    },
                    function(data, status){
                        alert("Data: " + data + "\nStatus: " + status);
                    })
                }

                this.addItem = function(item,type){
                    self.widgets.push({
                        x: 0,
                        y: 0,
                        width: 2,
                        height: 2,
                        auto_position: true,
                        displayable_type: type,
                        display_name: item.name,
                        displayable_id: item.id
                    });
                    self.showItemSelect();
                    return false;
                }
                this.productSelect = function(item){
                    return self.addItem(item,'App\\Models\\Product');
                }
                this.menuSelect = function(item){
                    return self.addItem(item,'App\\Models\\Menu');
                }
            };
            var widgets = [];
            var controller = new Controller(widgets);
            ko.applyBindings(controller);
        });
    </script>
    </script>
    <template id="gridstack-template">
        <div class="grid-stack" data-bind="foreach: {data: widgets, afterRender: afterAddWidget}">
           <div class="grid-stack-item" data-bind="attr: {'display_name': $data.display_name, 'displayable_type': $data.displayable_type, 'displayable_id': $data.displayable_id, 'data-gs-x': $data.x, 'data-gs-y': $data.y, 'data-gs-width': $data.width, 'data-gs-height': $data.height, 'data-gs-auto-position': $data.auto_position}">
               <div class="grid-stack-item-content"><p data-bind='text: $data.display_name'></p>
               <div  style="bottom: 1px;position: absolute;">
                   <button  class="btn btn-danger btn-xs" data-bind="click: $root.deleteWidget"><i class="glyphicon glyphicon-trash"></i></button>
                   <div style="float: right;" data-bind="visible: $data.displayable_type == 'App\\Models\\Menu'">
                       <button class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-eye-open"></i>
                   </div>
                    </button>
               </div>
               </div>
           </div></div><!-- <---- NO SPACE BETWEEN THESE CLOSING TAGS -->
    </template>

    <script>$('.grid-stack').addTouch();</script>
@endsection