@extends('backpack::layout')

@section('after_styles')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}
@stop

@section('content')
    <section class="content-header">
        <h1>
            Vendor
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($vendor, ['route' => ['vendors.update', $vendor->id], 'method' => 'patch']) !!}
                        <?php 
                          $address = $vendor->address; 
                        ?>
                        @include('vendors.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

@section('after_scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}
    @if(isset($vendor))
    <script type="text/javascript">
        $(".select2-multi").select2();
        $(".select2-multi").select2().val({!! json_encode($vendor->contacts()->getRelatedIds()) !!}).trigger('change'); 
        
    </script>
    @else
        <script type="text/javascript">
        $(".select2-multi").select2(); 
    </script>
    @endif

@endsection