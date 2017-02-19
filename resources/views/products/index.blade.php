@extends('products.create_edit_script')

@section('content')
    <section class="content-header">
        <h1 class="pull-{{$left}}">Products</h1>
        <h1 class="pull-{{$right}}">
           <a class="btn btn-primary pull-{{$right}}" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('products.create') !!}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix">
            <div class="box-body">
            <a id="btnSearch" class="btn btn-primary">Show Filter</a>
                <div class="row search-fields" style="display:none">
                    {!! Form::open(['route' => 'products.search']) !!}

                        @include('products.search_fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('products.table')
            </div>
        </div>
    </div>
@endsection
@section('after_scripts')
<script type="text/javascript">
    searchFields = $('.search-fields');
    $('#btnSearch').click(function(){
        searchFields.toggle();
        if($('#btnSearch').text() == 'Show Filter')
            $('#btnSearch').text('Hide Filter');
        else
            $('#btnSearch').text('Show Filter');
    });
    $('select[name="dept_id"]').prepend("<option value='0'>All</option>").val('0');
    $('select[name="vandor_id"]').prepend("<option value='0'>All</option>").val('0');
</script>
    @include('products.department_change_script')
@endsection

