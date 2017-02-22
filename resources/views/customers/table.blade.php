<table class="table table-{{$left}} table-responsive" id="customer-table">
    <thead>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Full Name</th>
        <th>Birthday</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Identifier</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($customers as $customer)
        <tr>
            <td>{!! $customer->person->first_name !!}</td>
            <td>{!! $customer->person->last_name !!}</td>
            <td>{!! $customer->person->full_name !!}</td>
            <td>{!! $customer->person->birthday !!}</td>
            <td>{!! $customer->person->phone !!}</td>
            <td>{!! $customer->person->email !!}</td>
            <td>{!! $customer->person->identifier !!}</td>
            <td>
                {!! Form::open(['route' => ['customers.destroy', $customer->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('customers.show', [$customer->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('customers.edit', [$customer->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>