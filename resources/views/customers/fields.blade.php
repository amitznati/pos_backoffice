<!-- Customerscol Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customerscol', 'Customerscol:') !!}
    {!! Form::text('customerscol', null, ['class' => 'form-control']) !!}
</div>

<!-- Customerscol1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customerscol1', 'Customerscol1:') !!}
    {!! Form::text('customerscol1', null, ['class' => 'form-control']) !!}
</div>

<!-- Customerscol2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customerscol2', 'Customerscol2:') !!}
    {!! Form::text('customerscol2', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('customers.index') !!}" class="btn btn-default">Cancel</a>
</div>
