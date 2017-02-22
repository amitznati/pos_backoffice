<!-- Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $employee->id !!}</p>
</div>

<!-- First Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('first_name', 'First Name:') !!}
    <p>{!! $employee->person->first_name !!}</p>
</div>

<!-- Last Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('last_name', 'Last Name:') !!}
    <p>{!! $employee->person->last_name !!}</p>
</div>

<!-- Full Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('full_name', 'Full Name:') !!}
    <p>{!! $employee->person->full_name !!}</p>
</div>

<!-- Birthday Field -->
<div class="form-group col-sm-4">
    {!! Form::label('birthday', 'Birthday:') !!}
    <p>{!! $employee->person->birthday !!}</p>
</div>

<!-- Phone Field -->
<div class="form-group col-sm-4">
    {!! Form::label('phone', 'Phone:') !!}
    <p>{!! $employee->person->phone !!}</p>
</div>

<!-- Email Field -->
<div class="form-group col-sm-4">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $employee->person->email !!}</p>
</div>

<!-- Password Field -->
<div class="form-group col-sm-4">
    {!! Form::label('password', 'Password:') !!}
    <p>{!! $employee->person->password !!}</p>
</div>

<!-- Street Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('street_name', 'Street Name:') !!}
    <p>{!! $employee->person->address->street_name !!}</p>
</div>

<!-- Street Number Field -->
<div class="form-group col-sm-4">
    {!! Form::label('street_number', 'Street Number:') !!}
    <p>{!! $employee->person->address->street_number !!}</p>
</div>

<!-- Hous Number Field -->
<div class="form-group col-sm-4">
    {!! Form::label('hous_number', 'Hous Number:') !!}
    <p>{!! $employee->person->address->hous_number !!}</p>
</div>

<!-- City Field -->
<div class="form-group col-sm-4">
    {!! Form::label('city', 'City:') !!}
    <p>{!! $employee->person->address->city !!}</p>
</div>

<!-- Zip Field -->
<div class="form-group col-sm-4">
    {!! Form::label('zip', 'Zip:') !!}
    <p>{!! $employee->person->address->zip !!}</p>
</div>


<!-- Created At Field -->
<div class="form-group col-sm-4">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $employee->person->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-4">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $employee->person->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group col-sm-4">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $employee->person->deleted_at !!}</p>
</div>

