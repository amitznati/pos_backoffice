<table class="table table-{{$left}} table-responsive" id="addresses-table">
    <thead>
        <th>Street Name</th>
        <th>Street Number</th>
        <th>Hous Number</th>
        <th>City</th>
        <th>Zip</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($addresses as $address)
        <tr>
            <td>{!! $address->street_name !!}</td>
            <td>{!! $address->street_number !!}</td>
            <td>{!! $address->hous_number !!}</td>
            <td>{!! $address->city !!}</td>
            <td>{!! $address->zip !!}</td>
            <td>
                {!! Form::open(['route' => ['addresses.destroy', $address->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('addresses.show', [$address->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('addresses.edit', [$address->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>