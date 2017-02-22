<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $address->id !!}</p>
</div>

<!-- Street Name Field -->
<div class="form-group">
    {!! Form::label('street_name', 'Street Name:') !!}
    <p>{!! $address->street_name !!}</p>
</div>

<!-- Street Number Field -->
<div class="form-group">
    {!! Form::label('street_number', 'Street Number:') !!}
    <p>{!! $address->street_number !!}</p>
</div>

<!-- Hous Number Field -->
<div class="form-group">
    {!! Form::label('hous_number', 'Hous Number:') !!}
    <p>{!! $address->hous_number !!}</p>
</div>

<!-- City Field -->
<div class="form-group">
    {!! Form::label('city', 'City:') !!}
    <p>{!! $address->city !!}</p>
</div>

<!-- Zip Field -->
<div class="form-group">
    {!! Form::label('zip', 'Zip:') !!}
    <p>{!! $address->zip !!}</p>
</div>

{{-- <!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $address->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $address->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $address->deleted_at !!}</p>
</div> --}}

