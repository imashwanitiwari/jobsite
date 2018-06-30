<input type="text" class="live_input">
<input type="text" class="live_input_vc">
<div class="live_div"></div>
<!-- <script src="http://localhost/np/jquery.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $(".live_input").keyup(function(e){
        if(e.keyCode!=40)
        {
    var value=$(this).val();
    
    $.ajax({
    url: '<?= base_url("stbox/live")?>',
    type:'POST',
    data:'request='+value,
    success:function(data)
    {
        $(".live_div").show();
        $(".live_div").html(data);
    }
    
    });	
    }
    else
    {
        $("#b1").focus();
    }
    });
});

$(document).on('click','.live_button',function(){
var val=$(this).text();
$(".live_input").val(val);
$(".live_div").hide();
$.ajax({
    url: '<?= base_url("stbox/vc")?>',
    type:'POST',
    data:'vc='+val,
    success:function(data)
    {
        $(".live_input_vc").val(data);
    }
    
    });	
});
</script>