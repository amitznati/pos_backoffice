<!-- Id Field -->
<div class="form-group col-sm-4">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $contact->id !!}</p>
</div>

<!-- First Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('first_name', 'First Name:') !!}
    <p>{!! $contact->person->first_name !!}</p>
</div>

<!-- Last Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('last_name', 'Last Name:') !!}
    <p>{!! $contact->person->last_name !!}</p>
</div>

<!-- Full Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('full_name', 'Full Name:') !!}
    <p>{!! $contact->person->full_name !!}</p>
</div>

<!-- Birthday Field -->
<div class="form-group col-sm-4">
    {!! Form::label('birthday', 'Birthday:') !!}
    <p>{!! $contact->person->birthday !!}</p>
</div>

<!-- Phone Field -->
<div class="form-group col-sm-4">
    {!! Form::label('phone', 'Phone:') !!}
    <p>{!! $contact->person->phone !!}</p>
</div>

<!-- Email Field -->
<div class="form-group col-sm-4">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $contact->person->email !!}</p>
</div>

<!-- Address Id Field -->
<div class="form-group col-sm-4">
    {!! Form::label('address_id', 'Address Id:') !!}
    <p>{!! $contact->person->address_id !!}</p>
</div>

<!-- Password Field -->
<div class="form-group col-sm-4">
    {!! Form::label('password', 'Password:') !!}
    <p>{!! $contact->person->password !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-4">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $contact->person->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-4">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $contact->person->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group col-sm-4">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $contact->person->deleted_at !!}</p>
</div>


