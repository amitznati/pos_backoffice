<script>
    departments = {!! $data['departments'] !!}
    ddDept = $('select[name="dept_id"]');
    ddgroup = $('select[name="group_id"]');
    product = {!! isset($product) ? $product : 'false' !!}      
    if(product)
    {
        ddDept.val(product.dept_id);
        setGroups(product.dept_id);
        ddgroup.val(product.group_id);
    }

    ddDept.on('change', function() { 
        setGroups(ddDept.val())
    });

    function setGroups(dept_id)
    {
        ddgroup.empty(); 
        ddgroup.prepend("<option value='0'>All</option>").val('0');
        departments.forEach(function(department){
            if(dept_id == department.id)
                department.groups.forEach(function(group){
                    var option = $('<option></option>').attr("value", group.id).text(group.name);
                ddgroup.append(option);

            });                                
        }); 
    }
</script>