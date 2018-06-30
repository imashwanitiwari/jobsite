<script>

    $(".setting-panel ul li:not(:first)").click(function(){
        $("#p").val(Number($("#p").val())+1);
        var p=$("#p").val();
        var value=$(this).text();
        var res = value.split("-");
        if($(this).hasClass("ala_show")){
            $("#pack_ala_append").append("<div style='border-bottom: 1px solid blue;width:17%;height:auto;float:left;border-radius: 25px;background:hsl(197, 44%, 50%);padding: 20px;'><ul><li>Channel Name:<input class='form-control' type='text' name='PACK"+p+"' value="+"'"+$(this).text()+"'"+"></li><li>Channel Amount:<input class='form-control' type='text' name='AMOUNT"+p+"' value="+"'"+res[res.length-1]+"'"+"></li><li>Discount:<input class='form-control' type='text' name='DISC_AMOUNT"+p+"'> </li><li>Discount Type:<select  class='form-control' name='DISCOUNT_TYPE"+p+"' id='disc'><option value='2'>--Select--</option><option value='0'>Flat</option><option value='1'>Percentage</option></select></li><li>Biling Cycle:<select class='form-control' name='BILLING_CYCLE"+p+"' ><option value='2'>--Select--</option><option value='0'>Monthly</option><option value='1'>Daily</option></select></li><li>Auto Renew:<select class='form-control' name='AUTO_RENEW"+p+"' ><option value='2'>--Select--</option><option value='0'>Yes</option><option value='1'>No</option></select></li><li>Activation Date:<div class='input-group date' id='ACTIVATION_DATE"+p+"'><input class='form-control' type='text' name='ACTIVATION_DATE"+p+"'><span class='input-group-addon'><span class='fa fa-calendar'></span></span></div></li><li>Expiry days:<select class='form-control' name='CLOSING_DATE"+p+"'><option value='1'>1 day</option><option value='2'>2 days</option><option value='3'>3 days</option><option value='4'>4 days</option><option value='5'>5 days</option><option value='6'>6 days</option><option value='7'>7 days</option><option value='8'>8 days</option><option value='9'>9 days</option><option value='10'>10 days</option><option value='11'>11 days</option><option value='12'>12 days</option><option value='13'>13 days</option><option value='14'>14 days</option><option value='15'>15 days</option><option value='16'>16 days</option><option value='17'>17 days</option><option value='18'>18 days</option><option value='19'>19 days</option><option value='20'>20 days</option><option value='21'>21 days</option><option value='22'>22 days</option><option value='23'>23 days</option><option value='24'>24 days</option><option value='25'>25 days</option><option value='26'>26 days</option><option value='27'>27 days</option><option value='28'>28 days</option><option value='29'>29 days</option><option value='30'>30 days</option><option value='31'>31 days</option></select></li><li><input type='hidden' name='TYPE"+p+"' value='1'></li><li><input type='hidden' name='PACK_OR_CHANNEL_ID"+p+"' value="+"'"+$(this).val()+"'"+"></li></ul></div>");
        }
        else{
		$("#pack_ala_append").append("<div style='border-bottom: 1px solid blue;width:17%;height:auto;float:left;border-radius: 25px;background:hsl(197, 44%, 50%);padding: 20px;'><ul><li>Pack Name:<input class='form-control' type='text' name='PACK"+p+"' value="+"'"+$(this).text()+"'"+"></li><li>Pack Amount:<input class='form-control' type='text' name='AMOUNT"+p+"' value="+"'"+res[res.length-1]+"'"+"></li><li>Discount:<input class='form-control' type='text' name='DISC_AMOUNT"+p+"'> </li><li>Discount Type:<select  class='form-control' name='DISCOUNT_TYPE"+p+"' id='disc'><option value='2'>--Select--</option><option value='0'>Flat</option><option value='1'>Percentage</option></select></li><li>Biling Cycle:<select class='form-control' name='BILLING_CYCLE"+p+"' ><option value='2'>--Select--</option><option value='0'>Monthly</option><option value='1'>Daily</option></select></li><li>Auto Renew:<select class='form-control' name='AUTO_RENEW"+p+"' ><option value='2'>--Select--</option><option value='0'>Yes</option><option value='1'>No</option></select></li><li>Activation Date:<div class='input-group date' id='ACTIVATION_DATE"+p+"'><input class='form-control' type='text' name='ACTIVATION_DATE"+p+"'><span class='input-group-addon'><span class='fa fa-calendar'></span></span></div></li><li>Expiry days:<select class='form-control'  name='CLOSING_DATE"+p+"'><option value='1'>1 day</option><option value='2'>2 days</option><option value='3'>3 days</option><option value='4'>4 days</option><option value='5'>5 days</option><option value='6'>6 days</option><option value='7'>7 days</option><option value='8'>8 days</option><option value='9'>9 days</option><option value='10'>10 days</option><option value='11'>11 days</option><option value='12'>12 days</option><option value='13'>13 days</option><option value='14'>14 days</option><option value='15'>15 days</option><option value='16'>16 days</option><option value='17'>17 days</option><option value='18'>18 days</option><option value='19'>19 days</option><option value='20'>20 days</option><option value='21'>21 days</option><option value='22'>22 days</option><option value='23'>23 days</option><option value='24'>24 days</option><option value='25'>25 days</option><option value='26'>26 days</option><option value='27'>27 days</option><option value='28'>28 days</option><option value='29'>29 days</option><option value='30'>30 days</option><option value='31'>31 days</option></select></li><li><input type='hidden' name='TYPE"+p+"' value='0'></li><li><input type='hidden' name='PACK_OR_CHANNEL_ID"+p+"' value="+"'"+$(this).val()+"'"+"></li></ul></div>");
        }

        $('#ACTIVATION_DATE'+p).datetimepicker({
									
									defaultDate: new Date(),
									format:'YYYY-MM-DD HH:mm:ss',
								});
        $(this).css('background-color', 'violet');
        $(this).off("click");
        
        
		
    });

  

</script>
<div class="setting-panel">
		    
		   	
            <ul class="right-sidebar nicescroll-bar pa-0">
            <ul>
            <li class="layout-switcher-wrap"><h4>Select Pack</h4></li>
            <?php
            foreach($data as $item):
            
            echo '<li style="padding: 8px 16px;border-bottom: 1px solid #ddd;" value='.'"'.$item['ID'].'"'.'>'.$item['NAME']."-".$item['MRP'].'</li>';
            endforeach;
            echo '</ul>';
           echo  '<h4>Select ALA Channels</h4>';
           echo '<ul>';
           foreach($ala as $item):
            
            echo '<li class ="ala_show" style="padding: 8px 16px;border-bottom: 1px solid #ddd;" value='.'"'.$item['ID'].'"'.'>'.$item['NAME']."-".$item['RATE'].'</li>';
            endforeach;
            echo '</ul>';
            echo '</ul>';
            ?>
            
            
 </div>