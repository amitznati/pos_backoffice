@extends('backpack::layout')

@section('content')
    <section class="content-header">
        <h1>
            Customer
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($customer, ['route' => ['customers.update', $customer->id], 'method' => 'patch']) !!}
                        <?php 
                          $person = $customer->person;
                          $address = $customer->person->address; 
                        ?>
                        @include('people.fields')
                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('customers.index') !!}" class="btn btn-default">Cancel</a>
                        </div>

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection