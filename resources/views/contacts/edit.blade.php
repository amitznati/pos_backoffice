@extends('backpack::layout')

@section('content')
    <section class="content-header">
        <h1>
            Contact
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($contact, ['route' => ['contacts.update', $contact->id], 'method' => 'patch']) !!}
                          <?php 
                          $person = $contact->person;
                          $address = $contact->person->address; 
                          ?>
                        @include('people.fields')
                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('contacts.index') !!}" class="btn btn-default">Cancel</a>
                        </div>

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
@section('after_scripts')
    @include('people.name_changed_script')
@endsection