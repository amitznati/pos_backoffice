@extends('backpack::layout')

@section('content')
    <section class="content-header">
        <h1>
            Salery Type
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($saleryType, ['route' => ['saleryTypes.update', $saleryType->id], 'method' => 'patch']) !!}

                        @include('salery_types.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection