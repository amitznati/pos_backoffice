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
                <div id="person_fields" class="row">
                    {!! Form::open(['route' => 'employees.store']) !!}
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
    <script>
        var roles =  {!!$roles!!} ;
        //Role selection changed
        $("input[name='role[]']").change(function(){
            $(':checkbox').each(function(i){
              $(this).attr("disabled", false);
              $(this).prop("checked", false);
            });
            var role_id = this.value;
            var values = [];
            roles.forEach(function(role){
                if(role_id == role.id)
                    role.permissions.forEach(function(permission){
                        $("#permissions").find('[value=' + permission.id + ']').attr("disabled", true);
                        $("#permissions").find('[value=' + permission.id + ']').prop("checked", false);
                    });
            });
        });//End Role Selection changed

        //Salery fields enable/disable
        var disabled = false;
        $("input[name='add_salery']").change(function(){
            $('#salery-div *').prop('disabled',disabled);
            disabled = !disabled;
        });
    </script>
@endsection
