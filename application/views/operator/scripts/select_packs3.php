<script>
$(".pack ul li:not(:first)").click(function(){
var value=$(this).text();
 var res = value.split("-");
 var id=$(this).val();
       $(this).css('background-color', 'violet');
       $(".pack_show").off("click"); 
        swal({
            title: "Are you sure?",
            text: "To Change this Pack",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#5cb85c",
            confirmButtonText: "Yes, Make it!",
            closeOnConfirm: false
          },

          function(){

         $("#pack_model_close").click();

      


        $("#pack_place<?php echo $id;?>").html('<div style="border-bottom: 1px solid blue;width:17%;height:auto;border-radius: 25px;background:hsl(197, 44%, 50%);padding: 20px;"><ul><li>Pack Name:<input class="form-control" type="text" name="PACK<?php echo $id;?>0" value='+'"'+value+'"'+'></li><li>Pack Amount:<input class="form-control" type="text" name="AMOUNT<?php echo $id;?>0" value='+'"'+res[res.length-1]+'"'+'></li><li>Discount:<input class="form-control" type="text" name="DISC_AMOUNT<?php echo $id;?>0" > </li><li>Discount Type:<select  class="form-control dtype" name="DISCOUNT_TYPE<?php echo $id;?>0" id="disc"><option value="0" >Flat</option><option value="1" >Percentage</option></select></li><li>Biling Cycle:<select class="form-control" name="BILLING_CYCLE<?php echo $id;?>0" ><option value="0">Monthly</option><option value="1">Daily</option></select></li><li>Auto Renew:<select class="form-control" name="AUTO_RENEW<?php echo $id;?>0" ><option value="0">Yes</option><option value="1">No</option></select></li><li>Activation Date:<div class="input-group date" id="ACTIVATION_DATE<?php echo $id;?>0"><input type="text" class="form-control" name="ACTIVATION_DATE<?php echo $id;?>0" id="" /><span class="input-group-addon"><span class="fa fa-calendar"></span></span></div></li><li>Expiry days:<select class="form-control" name="CLOSING_DATE<?php echo $id;?>0"><option value="1">1 day</option><option value="2">2 days</option><option value="3">3 days</option><option value="4">4 days</option><option value="5">5 days</option><option value="6">6 days</option><option value="7">7 days</option><option value="8">8 days</option><option value="9">9 days</option><option value="10">10 days</option><option value="11">11 days</option><option value="12">12 days</option><option value="13">13 days</option><option value="14">14 days</option><option value="15">15 days</option><option value="16">16 days</option><option value="17">17 days</option><option value="18">18 days</option><option value="19">19 days</option><option value="20">20 days</option><option value="21">21 days</option><option value="22">22 days</option><option value="23">23 days</option><option value="24">24 days</option><option value="25">25 days</option><option value="26">26 days</option><option value="27">27 days</option><option value="28">28 days</option><option value="29">29 days</option><option value="30">30 days</option><option value="31">31 days</option></select></li><li><input type="hidden" name="TYPE<?php echo $id;?>0" value="0"></li><li><input type="hidden" name="PACK_OR_CHANNEL_ID<?php echo $id;?>0" value='+'"'+id+'"'+'></li></ul></div>');
        $('#ACTIVATION_DATE<?php echo $id;?>0').datetimepicker({
									
									defaultDate: new Date(),
									format:'YYYY-MM-DD HH:mm:ss',
								});
        swal("Well Done", "Pack changed successfully ", "success");  
       
    });



});

</script>




<div class="pack">
	 
         <ul>
            <li><h4>Select Pack</h4></li>
            <?php
            foreach($data as $item):
            
           echo '<li class ="pack_show" style="padding: 8px 16px;border-bottom: 1px solid #ddd;" value='.'"'.$item['ID'].'"'.'>'.$item['NAME']."-".$item['MRP'].'</li>';
            endforeach;
           echo '</ul>';
           
          
            ?>
            
            
 </div>
 <?php
if(isset($ala) && $ala==1){?>
 <div class="ala">
       <h4> Select ALA </h4>';
           <ul>
           <?php
           foreach($ala as $item):
            
            echo '<li class ="ala_show" style="padding: 8px 16px;border-bottom: 1px solid #ddd;" value='.'"'.$item['ID'].'"'.'>'.$item['NAME']."-".$item['RATE'].'</li>';
            endforeach;
           echo '</ul>';
           ?>
 <?php } ?>
 
 
 </div>