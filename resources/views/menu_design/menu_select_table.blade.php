<table class="table table-responsive" id="menus-table">
    <thead>
        <th>Name</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($menus as $menu)
        <tr>
            <td>{!! $menu->name !!}</td>
            <td>
                <button id="select-menu-id-{{$menu->id}}" class='btn btn-default'> בחר </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>