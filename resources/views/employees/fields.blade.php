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
    </section>
<div class="box-body">
   <div class="row">
    <div class="form-group col-sm-4">
        {!! Form::label('salery_type_id', 'Salery Type:') !!}
        {!! Form::select('salery_type_id', $saleries, null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-4">
        {!! Form::label('amount', 'Amount:') !!}
        {!! Form::text('amount', null, ['class' => 'form-control']) !!}
    </div>
   </div>
</div>