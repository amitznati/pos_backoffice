<!-- Street Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('street_name', 'Street Name:') !!}
    {!! Form::text('street_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Street Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('street_number', 'Street Number:') !!}
    {!! Form::number('street_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Hous Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hous_number', 'Hous Number:') !!}
    {!! Form::number('hous_number', null, ['class' => 'form-control']) !!}
</div>

<!-- City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city', 'City:') !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
</div>

<!-- Zip Field -->
<div class="form-group col-sm-6">
    {!! Form::label('zip', 'Zip:') !!}
    {!! Form::number('zip', null, ['class' => 'form-control']) !!}
</div>

{{-- <!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('addresses.index') !!}" class="btn btn-default">Cancel</a>
</div> --}}
