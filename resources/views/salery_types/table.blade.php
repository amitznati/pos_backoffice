<table class="table table-responsive" id="saleryTypes-table">
    <thead>
        <th>Name</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($saleryTypes as $saleryType)
        <tr>
            <td>{!! $saleryType->name !!}</td>
            <td>
                {!! Form::open(['route' => ['saleryTypes.destroy', $saleryType->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('saleryTypes.show', [$saleryType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('saleryTypes.edit', [$saleryType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>