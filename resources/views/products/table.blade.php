<table class="table-{{$left}} table table-responsive" id="products-table">
    <thead>
        <th>Name</th>
        <th>Department</th>
        <th>Group</th>
        <th>Vandor</th>
        <th>Sale Price</th>
        <th>Bay Price</th>
        <th>barcode</th>
        <th>Brand</th>
        <th>Description</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{!! $product->name !!}</td>
            <td>{!! $product->department ? $product->department->name : '' !!}</td>
            <td>{!! $product->group ? $product->group->name : '' !!}</td>
            <td>{!! $product->vandor ? $product->vandor->company_name : '' !!}</td>
            <td>{!! $product->sale_price !!}</td>
            <td>{!! $product->bay_price !!}</td>
            <td>{!! $product->barcode !!}</td>
            <td>{!! $product->brand !!}</td>
            <td>{!! $product->description !!}</td>
            <td>
                {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('products.show', [$product->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('products.edit', [$product->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>