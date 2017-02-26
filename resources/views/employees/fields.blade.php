<!-- Roles Field -->
<section class="content-header">
        <h4>
            תפקיד
        </h4>
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
<hr>
<!-- Permissions Field -->
<section class="content-header">
        <h4>
            הרשאות נוספות
        </h4>
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
<hr>
