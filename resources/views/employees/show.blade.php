@extends('backpack::layout')

@section('content')
    <section class="content-header">
        <h1>
            Employee
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-{{$left}}: 20px">
                    @include('employees.show_fields')
                    <a href="{!! route('employees.index') !!}" class="btn btn-default">Back</a>
                    <a href="{!! route('employees.edit', [$employee->id]) !!}" class='btn btn-default'>Edit<i class="glyphicon glyphicon-edit"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
