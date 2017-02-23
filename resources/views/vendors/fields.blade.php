<!-- Company Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_name', 'Company Name:') !!}
    {!! Form::text('company_name', null, ['class' => 'form-control']) !!}
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