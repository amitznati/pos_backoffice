<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyC_GzE5UvLbPXBJN6QKwNL4hRiAdqAOkbY&amp;libraries=places"></script>
<script type="text/javascript" src="{{asset('js') }}/jquery.geocomplete.js"></script>
<script type="text/javascript">
    $("#geocomplete").geocomplete().bind("geocode:result", function(event, result){
        console.log(result);
        result.address_components.forEach(function(comp){
            console.log(comp);
        });
      })
</script>