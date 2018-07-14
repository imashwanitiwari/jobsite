<script>

    $(".setting-panel ul li:not(:first)").click(function(){
        
        var p=$("#p").val();
        $("#p").val(Number(p)+1);
        var q=$("#current_company").val();
        var current_packs=$("#b_"+q).val();
        $("#b_"+q).val(Number(current_packs)+1);
        var i=$("#index").val();
        $("#index").val(Number(i)+1);
        var value=$(this).text();
        var res = value.split("-");
       // $("#mrpp").val(res[res.length-1]);
        var box = [];
        box[q]=$("#index").val();
        if($(this).hasClass("ala_show")){
            $("#ala_append"+$("#current_company").val()).append("<div class='col-md-2 col-sm-6 col-xs-12' style='border-bottom: 1px solid blue;height:auto;border-radius: 25px;background:hsl(197, 44%, 50%);padding: 20px;'><ul><li>Channel Name:<input class='form-control' type='text' name='PACK"+q+$("#b_"+q).val()+"' value="+"'"+$(this).text()+"'"+"></li><li>Channel Amount:<input class='form-control' type='text' name='AMOUNT"+q+$("#b_"+q).val()+"' value="+"'"+res[res.length-1]+"'"+"></li><li>Discount:<input class='form-control' type='text' name='DISC_AMOUNT"+q+$("#b_"+q).val()+"'> </li><li>Discount Type:<select  class='form-control' name='DISCOUNT_TYPE"+q+$("#b_"+q).val()+"' id='disc'><option value='2'>--Select--</option><option value='0'>Flat</option><option value='1'>Percentage</option></select></li><li>Biling Cycle:<select class='form-control' name='BILLING_CYCLE"+q+$("#b_"+q).val()+"' ><option value='2'>--Select--</option><option value='0'>Monthly</option><option value='1'>Daily</option></select></li><li>Auto Renew:<select class='form-control' name='AUTO_RENEW"+q+$("#b_"+q).val()+"' ><option value='2'>--Select--</option><option value='0'>Yes</option><option value='1'>No</option></select></li><li>Activation Date:<div class='input-group date' id='ACTIVATION_DATE"+q+$("#b_"+q).val()+"'><input class='form-control' type='text' name='ACTIVATION_DATE"+q+$("#b_"+q).val()+"'><span class='input-group-addon'><span class='fa fa-calendar'></span></span></div></li><li>Expiry days:<select class='form-control' name='CLOSING_DATE"+q+$("#b_"+q).val()+"'><option value='1'>1 day</option><option value='2'>2 days</option><option value='3'>3 days</option><option value='4'>4 days</option><option value='5'>5 days</option><option value='6'>6 days</option><option value='7'>7 days</option><option value='8'>8 days</option><option value='9'>9 days</option><option value='10'>10 days</option><option value='11'>11 days</option><option value='12'>12 days</option><option value='13'>13 days</option><option value='14'>14 days</option><option value='15'>15 days</option><option value='16'>16 days</option><option value='17'>17 days</option><option value='18'>18 days</option><option value='19'>19 days</option><option value='20'>20 days</option><option value='21'>21 days</option><option value='22'>22 days</option><option value='23'>23 days</option><option value='24'>24 days</option><option value='25'>25 days</option><option value='26'>26 days</option><option value='27'>27 days</option><option value='28'>28 days</option><option value='29'>29 days</option><option value='30'>30 days</option><option value='31'>31 days</option></select></li><li><input type='hidden' name='TYPE"+q+$("#b_"+q).val()+"' value='1'></li><li><input type='hidden' name='PACK_OR_CHANNEL_ID"+q+$("#b_"+q).val()+"' value="+"'"+$(this).val()+"'"+"></li></ul></div>");
        }
        else{
        $(".pack_show").off("click");    
		$("#pack_append"+$("#current_company").val()).append("<div class='col-md-2 col-sm-6 col-xs-12' style='border-bottom: 1px solid blue;height:auto;border-radius: 25px;background:hsl(197, 44%, 50%);padding: 20px;'><ul><li>Pack Name:<input class='form-control' type='text' name='PACK"+q+$("#b_"+q).val()+"' value="+"'"+$(this).text()+"'"+"></li><li>Pack Amount:<input class='form-control' type='text' name='AMOUNT"+q+$("#b_"+q).val()+"' value="+"'"+res[res.length-1]+"'"+"></li><li>Discount:<input class='form-control' type='text' name='DISC_AMOUNT"+q+$("#b_"+q).val()+"'> </li><li>Discount Type:<select  class='form-control' name='DISCOUNT_TYPE"+q+$("#b_"+q).val()+"' id='disc'><option value='2'>--Select--</option><option value='0'>Flat</option><option value='1'>Percentage</option></select></li><li>Biling Cycle:<select class='form-control' name='BILLING_CYCLE"+q+$("#b_"+q).val()+"' ><option value='2'>--Select--</option><option value='0'>Monthly</option><option value='1'>Daily</option></select></li><li>Auto Renew:<select class='form-control' name='AUTO_RENEW"+q+$("#b_"+q).val()+"' ><option value='2'>--Select--</option><option value='0'>Yes</option><option value='1'>No</option></select></li><li>Activation Date:<div class='input-group date' id='ACTIVATION_DATE"+q+$("#b_"+q).val()+"'><input class='form-control' type='text' name='ACTIVATION_DATE"+q+$("#b_"+q).val()+"'><span class='input-group-addon'><span class='fa fa-calendar'></span></span></div></li><li>Expiry days:<select class='form-control'  name='CLOSING_DATE"+q+$("#b_"+q).val()+"'><option value='1'>1 day</option><option value='2'>2 days</option><option value='3'>3 days</option><option value='4'>4 days</option><option value='5'>5 days</option><option value='6'>6 days</option><option value='7'>7 days</option><option value='8'>8 days</option><option value='9'>9 days</option><option value='10'>10 days</option><option value='11'>11 days</option><option value='12'>12 days</option><option value='13'>13 days</option><option value='14'>14 days</option><option value='15'>15 days</option><option value='16'>16 days</option><option value='17'>17 days</option><option value='18'>18 days</option><option value='19'>19 days</option><option value='20'>20 days</option><option value='21'>21 days</option><option value='22'>22 days</option><option value='23'>23 days</option><option value='24'>24 days</option><option value='25'>25 days</option><option value='26'>26 days</option><option value='27'>27 days</option><option value='28'>28 days</option><option value='29'>29 days</option><option value='30'>30 days</option><option value='31'>31 days</option></select></li><li><input type='hidden' name='TYPE"+q+$("#b_"+q).val()+"' value='0'></li><li><input type='hidden' name='PACK_OR_CHANNEL_ID"+q+$("#b_"+q).val()+"' value="+"'"+$(this).val()+"'"+"></li></ul></div>");
        
        }

        $('#ACTIVATION_DATE'+q+$("#b_"+q).val()).datetimepicker({
									
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
            
            echo '<li class="pack_show" style="padding: 8px 16px;border-bottom: 1px solid #ddd;" value='.'"'.$item['ID'].'"'.'>'.$item['NAME']."-".$item['MRP'].'</li>';
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