<table class="table-{{$left}} table table-responsive" id="products-table">
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Department</th>
        <th>Group</th>
        <th>Vandor</th>
        <th>Sale Price</th>
        <th>Bay Price</th>
        <th>barcode</th>
        <th>Brand</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody data-bind="foreach: products">
        <tr >
            <td data-bind="text: id"></td>
            <td data-bind="text: name"></td>
            <td data-bind="text: group.name"></td>
{{--             <td>{!! $product->group ? $product->group->name : '' !!}</td>
            <td>{!! $product->vandor ? $product->vandor->company_name : '' !!}</td>
            <td>{!! $product->sale_price !!}</td>
            <td>{!! $product->bay_price !!}</td>
            <td>{!! $product->barcode !!}</td>
            <td>{!! $product->brand !!}</td> --}}
            <td>
                <button data-bind="click: $root.itemSelect" class='btn btn-default'> בחר </button>
            </td>
        </tr>
    </tbody>
</table>