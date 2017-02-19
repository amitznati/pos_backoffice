<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Dept Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dept_id', 'Department:') !!}
    {{-- {!! Form::select('dept_id', $data['departments'], null, ['class' => 'form-control']) !!} --}}
    <select  name="dept_id" class="form-control">
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


<!-- Sale Price From Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sale_price_from', 'Sale Price - From:') !!}
    {!! Form::number('sale_price_from', 0, ['class' => 'form-control currency','min' => 0, 'step' => '0.01']) !!}
</div>

<!-- Sale Price To Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sale_price_to', 'Sale Price - To:') !!}
    {!! Form::number('sale_price_to', 0, ['class' => 'form-control currency','min' => 0, 'step' => '0.01']) !!}
</div>

<!-- Bay Price From Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bay_price_from', 'Bay Price From:') !!}
    {!! Form::number('bay_price_from', 0, ['class' => 'form-control currency','min' => 0, 'step' => '0.01']) !!}
</div>

<!-- Bay Price To Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bay_price_to', 'Bay Price To:') !!}
    {!! Form::number('bay_price_to', 0, ['class' => 'form-control currency','min' => 0, 'step' => '0.01']) !!}
</div>

<!-- Vandor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vandor_id', 'Vandor:') !!}
    {!! Form::select('vandor_id', $data['vendors'], null, ['class' => 'form-control']) !!}
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

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Search', ['class' => 'btn btn-primary']) !!}
</div>
