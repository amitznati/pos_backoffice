<table class="table table-{{$left}} table-responsive" id="contacts-table">
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
    @foreach($contacts as $contact)
        <tr>
            <td>{!! $contact->person->first_name !!}</td>
            <td>{!! $contact->person->last_name !!}</td>
            <td>{!! $contact->person->full_name !!}</td>
            <td>{!! $contact->person->birthday !!}</td>
            <td>{!! $contact->person->phone !!}</td>
            <td>{!! $contact->person->email !!}</td>
            <td>{!! $contact->person->identifier !!}</td>
            <td>
                {!! Form::open(['route' => ['contacts.destroy', $contact->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('contacts.show', [$contact->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('contacts.edit', [$contact->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>