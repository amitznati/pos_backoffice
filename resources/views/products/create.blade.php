@extends('backpack::layout')

@section('content')
    <section class="content-header">
        <h1>
            Product
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'products.store']) !!}

                        @include('products.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('after_scripts')
<script>
    departments = <?php echo $data['departments']; ?>;
    $('select[name="dept_id"]').on('change', function() {  
        ddgroup = $('select[name="group_id"]');
        ddgroup.empty();  
        departments.forEach(function(department){
            if($('select[name="dept_id"]').val() == department.id)
                department.groups.forEach(function(group){
                    var option = $('<option></option>').attr("value", group.id).text(group.name);
                ddgroup.append(option);
            });                                
        });
    });
</script>
@endsection