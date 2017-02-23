<!-- Id Field -->
<div class="form-group  col-sm-4">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $vendor->id !!}</p>
</div>

<!-- Company Name Field -->
<div class="form-group  col-sm-4">
    {!! Form::label('company_name', 'Company Name:') !!}
    <p>{!! $vendor->company_name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group  col-sm-4">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $vendor->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group  col-sm-4">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $vendor->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group  col-sm-4">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $vendor->deleted_at !!}</p>
</div>

<div class="box-body">
    <div class="row" >
        <!-- Address Id Field -->
        <div class="form-group col-sm-12">
            <h1>Address</h1>
            <?php $address = $vendor->address ?>
            @include('addresses.show_fields')
        </div>
    </div>
</div>
