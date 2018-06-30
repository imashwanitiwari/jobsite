<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $_SESSION['firm']?> INVOICE</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<?php echo link_tag('css/bootstrap2.css');?>
	<style>
	@import url(http://fonts.googleapis.com/css?family=Bree+Serif);
	body, h1, h2, h3, h4, h5, h6{
		font-family: 'Bree Serif', serif;
	}
	</style>
</head>
<body>

	<div class="container">

		<div class="row">
			<div class="col-xs-6">
			  <h1>
			    <a href="http://dcntv.in/">
			    <!--   <img src="logo.png"> -->
					<?php echo $_SESSION['firm']?>
			    </a>
			  </h1>
			</div>
			<div class="col-xs-6 text-right">
			  <h1>INVOICE</h1>
			  <h1><small>Invoice #<?php echo $_POST['INVOICE_NO']?></small></h1>
			</div>
		</div>

		  <div class="row">
		    <div class="col-xs-5">
		      <div class="panel panel-default">
		              <div class="panel-heading">
		                <h4>From: <a href="#"><?php echo $_SESSION['firm']?></a></h4>
		              </div>
		              <div class="panel-body">
		                <p>
		                  <?php echo $data['ADDRESS']?>
		                </p>
		              </div>
		            </div>
		    </div>
		    <div class="col-xs-5 col-xs-offset-2 text-right">
		      <div class="panel panel-default">
		              <div class="panel-heading">
		                <h4>To : <a href="#"> <?php echo $data['NAME']?></a></h4>
		              </div>
		              <div class="panel-body">
		                <p>
										<?php echo $data['SUB_ADDRESS']?>
		                </p>
		              </div>
		            </div>
		    </div>
		  </div> <!-- / end client details section -->

		         <table class="table table-bordered">
        <thead>
          <tr>
            <th><h4>Service</h4></th>
            <th><h4>Description</h4></th>
            <th><h4>Hrs/Qty</h4></th>
            <th><h4>Rate/Price</h4></th>
            <th><h4>Sub Total</h4></th>
          </tr>
        </thead>
        <tbody id="invoice_data">

         <!--  <tr>
            <td>Article</td>
            <td>Brackets Review not published ( conflict of publication date)</td>
            <td class="text-right">-</td>
             <td class="text-right">$75.00</td>
              <td class="text-right">$75.00</td>
          </tr> -->
         
        </tbody>
      </table>

		<div class="row text-right">
			<div class="col-xs-2 col-xs-offset-8">
				<p>
					<strong>
						Sub Total : <br>
						TAX : <br>
						Total : <br>
					</strong>
				</p>
			</div>
			<div class="col-xs-2">
				<strong>
					<span id="sub_total"></span><br>
					<span id="tax"> </span><br>
					<span id="total"></span> <br>
				</strong>
			</div>
		</div>


		

	</div>

</body>
</html>

<script>
$(document).ready(function(){

var d = new Date();

$.ajax({
    
   "type":"post",
	 "url" :"<?=base_url('api/invoice/get_invoice_details')?>",
	 "data":{"OP_ID":<?php echo $_SESSION['dcn_id']?>, "api_key":1234,"INVOICE_NO":<?php echo $_POST['INVOICE_NO']?>},
    "dataType":"json",
    success:function(result){
    //alert(result['data'].length);
			var to_append='';
      var sub_total=0;
			for(var inn=0;inn<result['data'].length;inn++){
				//alert(result['data'][inn]['REF']);
				sub_total+=result['data'][inn]['QUANTITY']*result['data'][inn]['RATE'];
				if(result['data'][inn]['REF'].split("_")[0]=='packs')
					var desc='PACK ACTIVATION CHARGE';
			
				else if(result['data'][inn]['REF'].split("_")[0]=='ala')

            var desc='ALA ACTIVATION CHARGE';
		
				else 
				var desc='NO DESRIPTION';

				to_append+='<tr><td>'+result['data'][inn]['PRODUCT']+'</td><td>'+desc+'</td><td class="text-right">'+result['data'][inn]['QUANTITY']+'</td><td class="text-right">'+result['data'][inn]['RATE']+'</td><td class="text-right">'+result['data'][inn]['QUANTITY']*result['data'][inn]['RATE']+'</td>';
			}
		
     $("#invoice_data").append(to_append);
     $("#sub_total").html(sub_total);
		}

});



});




</script>