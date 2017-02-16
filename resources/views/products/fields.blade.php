<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Dept Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dept_id', 'Department:') !!}
{{--     {!! Form::select('dept_id', $data['department'], null, ['class' => 'form-control']) !!} --}}
    <select  name="dept_id" class="form-control" >
    @foreach($data['departments'] as $department)
      <option value="{{$department->id}}">{{$department->name}}</option>
    @endforeach
  </select>
</div>

<!-- Group Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('group_id', 'Group:') !!}
    {!! Form::select('group_id', $data['groups'], null, ['class' => 'form-control']) !!}
</div>

<!-- Vandor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vandor_id', 'Vandor:') !!}
    {!! Form::select('vandor_id', $data['vendors'], null, ['class' => 'form-control']) !!}
</div>

<!-- Sale Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sale_price', 'Sale Price:') !!}
    {!! Form::number('sale_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Bay Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bay_price', 'Bay Price:') !!}
    {!! Form::number('bay_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Bacode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bacode', 'Bacode:') !!}
    {!! Form::text('bacode', null, ['class' => 'form-control']) !!}
</div>

<!-- Brand Field -->
<div class="form-group col-sm-6">
    {!! Form::label('brand', 'Brand:') !!}
    {!! Form::text('brand', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('products.index') !!}" class="btn btn-default">Cancel</a>
</div>
