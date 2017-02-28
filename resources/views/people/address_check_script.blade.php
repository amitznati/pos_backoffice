<script>
	//Address fields enable/disable
    var address_disabled = $("input[name='add_address']").prop('checked');
    $('#address-div *').prop('disabled',!address_disabled);
    $("input[name='add_address']").change(function(){
        address_disabled = $("input[name='add_address']").prop('checked');
        $('#address-div *').prop('disabled',!address_disabled);
    });
</script>