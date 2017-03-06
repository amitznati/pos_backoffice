<table class="table table-responsive" id="menus-table">
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($menus as $menu)
        <tr>
            <td class="menu-id">{!! $menu->id !!}</td>
            <td class="menu-name">{!! $menu->name !!}</td>
            <td>
                <button class='btn btn-default btn-menu-select'> בחר </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>