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
    <tbody>
    @foreach($products as $product)
        <tr >
            <td class="product-id">{!! $product->id!!}</td>
            <td class="product-name">{!! $product->name !!}</td>
            <td>{!! $product->department ? $product->department->name : '' !!}</td>
            <td>{!! $product->group ? $product->group->name : '' !!}</td>
            <td>{!! $product->vandor ? $product->vandor->company_name : '' !!}</td>
            <td>{!! $product->sale_price !!}</td>
            <td>{!! $product->bay_price !!}</td>
            <td>{!! $product->barcode !!}</td>
            <td>{!! $product->brand !!}</td>
            <td>
                <button class='btn btn-default btn-product-select'> בחר </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>