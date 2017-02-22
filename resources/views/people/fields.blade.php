<!-- First Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('first_name', 'First Name:') !!}
    {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Last Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('last_name', 'Last Name:') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Full Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('full_name', 'Full Name:') !!}
    {!! Form::text('full_name', null, ['class' => 'form-control','readonly']) !!}
</div>

<!-- Birthday Field -->
<div class="form-group col-sm-4">
    {!! Form::label('birthday', 'Birthday:') !!}
    {!! Form::date('birthday', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-4">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-4">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>


<!-- Password Field -->
<div class="form-group col-sm-4">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

</div>
    </div>
    <section class="content-header">
        <h1>
            Address
        </h1>
    </section>
    <div class="box-body">
        <div class="row">            
            @include('addresses.fields')