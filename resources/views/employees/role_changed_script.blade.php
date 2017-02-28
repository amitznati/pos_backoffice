<script>
    var roles =  {!!$roles!!} ;
    //Role selection changed
    $("input[name='role[]']").change(function(){
        $(':checkbox').each(function(i){
          $(this).attr("disabled", false);
          $(this).prop("checked", false);
        });
        var role_id = this.value;
        var values = [];
        roles.forEach(function(role){
            if(role_id == role.id)
                role.permissions.forEach(function(permission){
                    $("#permissions").find('[value=' + permission.id + ']').attr("disabled", true);
                    $("#permissions").find('[value=' + permission.id + ']').prop("checked", false);
                });
        });
    });//End Role Selection changed

    //Salery fields enable/disable
    var salery_disabled = $("input[name='add_salery']").prop('checked');
    $('#salery-div *').prop('disabled',!salery_disabled);
    $("input[name='add_salery']").change(function(){
        salery_disabled = $("input[name='add_salery']").prop('checked');
        $('#salery-div *').prop('disabled',!salery_disabled);
    });
    
</script>