<!-- Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $employee->id !!}</p>
</div>

<?php  $person = $employee->person ?>

@include('people.show_fields')

