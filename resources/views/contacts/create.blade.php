@extends('backpack::layout')

@section('before_scripts')

@endsection
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
                <div id="person_fields" class="row">
                    {!! Form::open(['route' => 'contacts.store']) !!}

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
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyC_GzE5UvLbPXBJN6QKwNL4hRiAdqAOkbY&amp;libraries=places"></script>
    <script type="text/javascript" src="{{asset('js') }}/jquery.geocomplete.js"></script>
    <script type="text/javascript">
        $("#geocomplete").geocomplete().bind("geocode:result", function(event, result){
            console.log(result);
          })
    </script>
    
    @include('people.name_changed_script')
@endsection
