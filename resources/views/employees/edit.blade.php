@extends('backpack::layout')

@section('content')
    <section class="content-header">
        <h1>
            Employee
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($employee, ['route' => ['employees.update', $employee->id], 'method' => 'patch']) !!}
                        <?php 
                          $person = $employee->person;
                          $address = $employee->person->address;
                        ?>
                        @include('employees.fields')
                        @include('people.fields')
                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('employees.index') !!}" class="btn btn-default">Cancel</a>
                        </div>

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
@section('after_scripts')
    @include('people.name_changed_script')
    @include('employees.role_changed_script')
    @include('people.address_check_script')
@endsection