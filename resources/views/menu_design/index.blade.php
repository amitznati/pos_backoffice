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
                            <div data-bind="component: {name: 'dashboard-grid', params: $data}"></div>
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
            

            var currentMenu = {!! $currentMenu !!};

            var isSelectItemOpen = false;

            var showSelectItemClicked = function()
            {
                $('#select-item-fields').toggle();
                $('.grid-stack-div').toggle();
                if(isSelectItemOpen)
                    $('#select-item-show').text('הוסף פריט');
                else
                    $('#select-item-show').text('בטל הוספת פריט');
                isSelectItemOpen = !isSelectItemOpen;
            }

            $('#select-item-show').click(showSelectItemClicked);
            
            // var options = {
            //     height : 9,
            //     float: true,
            // };
            

            // $('.grid-stack').gridstack(options);
            // var grid = $('.grid-stack').data('gridstack');

            var addItemToGrid = function(node)
            {
                grid.addWidget($('<div display_name="'+node.display_name+'" item-type="'+ node.displayable_type +'" item-id="'+ node.displayable_id +'"><div class="grid-stack-item-content">' + node.display_name + '<div/><div/>'),
                        node.index_row, node.index_column, node.number_of_rows, node.number_of_columns);
            }

            // if(currentMenu)
            // {
            //     currentMenu.contains_display_infos.forEach(function(displayInfo){
            //         addItemToGrid(displayInfo);
            //     });
            // }

            var creatNewDisaplyableItem = function(td,type)
            {
                var row = $(td).closest("tr");    
                var id = row.find("."+type+"-id").text(); 
                var name = row.find("."+type+"-name").text();
                var node = {
                    display_name: name,
                    displayable_id: id,
                    displayable_type: 'App\\Models\\'+ toTitleCase(type),
                    x: 0,
                    y: 0,
                    width: 2,
                    height: 2 
                } 
                return node;
            }

            $(".btn-product-select").click(function(){
                var node = creatNewDisaplyableItem(this,'product'); 
                addItemToGrid(node)               
                itemClicked();
            });


            $('#btnSave').click(function() {
                this.serializedData = _.map($('.grid-stack > .grid-stack-item:visible'), function (el) {
                        el = $(el);
                        var node = el.data('_gridstack_node');
                        return {
                            x: node.x,
                            y: node.y,
                            width: node.width,
                            height: node.height,
                            displayable_type: el.attr('item-type'),
                            displayable_id: el.attr('item-id'),
                            display_name: el.attr('display_name'),

                        };
                    }, this);
                    var nodes = JSON.stringify(this.serializedData, null, '    ');
                    $.post('{{route('menu_design.saveMenu') }}',{nodes: nodes,menu_id: currentMenu.id},function(data){
                        console.log(data);
                        if(data == "success")
                            window.location.replace('{{route('menu_design.index') }}');
                        else
                            console.log("Error");

                    });
                });


        
    </script>
    
    <script>
        var mapDisplayInfosToWidgets = function(displayInfos)
        {
            var widgets = [];
            if(displayInfos)
            {
                displayInfos.forEach(function(displayInfo)
                {
                    widgets.push({
                        x:displayInfo.x,
                        y:displayInfo.y,
                        width: displayInfo.width,
                        height: displayInfo.height,
                        type: displayInfo.displayable_type,
                        itemID: displayInfos.displayable_id
                    });
                });
            }
            return widgets;
        }

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
                                    height : 9,
                                    float: true,
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

                this.widgets = ko.observableArray(widgets);

                this.addNewWidget = function () {
                    this.widgets.push({
                        x: 0,
                        y: 0,
                        width: 2,
                        height: 2,
                        auto_position: true
                    });
                    return false;
                };

                this.deleteWidget = function (item) {
                    self.widgets.remove(item);
                    return false;
                };
            };

            var widgets = mapDisplayInfosToWidgets(currentMenu.contains_display_infos);

            var controller = new Controller(widgets);
            ko.applyBindings(controller);
        });
    </script>
    <template id="gridstack-template">
        <div class="grid-stack" data-bind="foreach: {data: widgets, afterRender: afterAddWidget}">
           <div class="grid-stack-item" data-bind="attr: {'display_name': $data.display_name, 'item-type': $data.type, 'item-id': $data.item-id, 'data-gs-x': $data.x, 'data-gs-y': $data.y, 'data-gs-width': $data.width, 'data-gs-height': $data.height, 'data-gs-auto-position': $data.auto_position}">
               <div class="grid-stack-item-content"><button data-bind="click: $root.deleteWidget">Delete me</button></div>
           </div></div><!-- <---- NO SPACE BETWEEN THESE CLOSING TAGS -->
    </template>

    <script>$('.grid-stack').addTouch();</script>
@endsection