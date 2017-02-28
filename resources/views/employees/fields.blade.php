<!-- Roles Field -->
<section class="content-header">
        <h2>
            תפקיד
        </h2>
    </section>
<div class="box-body">
   <div class="row">
		@foreach($roles as $role)
       	<div class="form-group col-sm-3">
       		{!! Form::radio('role[]', $role->id) !!}
		      {!! Form::label('role', $role->name ) !!}
		</div>
		@endforeach
   </div>
</div>

<!-- Permissions Field -->
<section class="content-header">
        <h2>
            הרשאות נוספות
        </h2>
    </section>
<div class="box-body">
   <div class="row" id="permissions" >
		@foreach($permissions as $permission)
       	<div class="form-group col-sm-3">
       		{!! Form::checkbox('permissions['.$permission->id .']', $permission->id) !!}
		    {!! Form::label('permission', $permission->name ) !!}
		</div>
		@endforeach
   </div>
</div>

<section class="content-header">
  <h2>
      שכר
  </h2>
  @if(isset($employee))
  <table class="table table-responsive table-hover table-condensed">
      <thead>
          <th>Salery Type</th>
          <th>Amount</th>
          <th>Start Date</th>
          <th>End Date</th>
      </thead>
      <tbody>
      @foreach($employee->employeeSaleries as $salery)
          <tr>
              <td>{!! $salery->saleryType->name !!}</td>
              <td>{!! $salery->amount !!}</td>
              <td>{!! $salery->created_at !!}</td>
              <td>{!! $salery->deleted_at !!}</td>
          </tr>
      @endforeach
      </tbody>
  </table>
  @endif
  <div class="form-group col-sm-12">
 		{!! Form::checkbox('add_salery', 'checked') !!}
    {!! Form::label('add_salery', isset($employee) ? 'Update Salery' : 'Add Salery' ) !!}
  </div>
</section>
<div class="box-body">
   <div class="row" id="salery-div" >
    <div class="form-group col-sm-4">
        {!! Form::label('salery_type_id', 'Salery Type:') !!}
        {!! Form::select('salery_type_id', $saleries, null, ['class' => 'form-control','disabled' => true]) !!}
    </div>
    <div class="form-group col-sm-4">
        {!! Form::label('amount', 'Amount:') !!}
        {!! Form::number('amount', 0, ['class' => 'form-control currency','min' => 0, 'step' => '0.01','disabled' => true]) !!}
    </div>
   </div>
</div>