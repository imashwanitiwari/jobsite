<!-- Main Content -->
<div class="page-wrapper">
            <div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<h5 class="txt-dark"><?php echo strtoupper($_SESSION['name'])." "."Welcome to Edit Customer page";?></h5>
						<?php //print_r($data) ;?>
						<h5><?php echo validation_errors(); ?></h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="<?php echo site_url('dashboard')?>">Dashboard</a></li>
							<li><a href="#"><span>Cable TV Users</span></a></li>
							<li class="active"><span>Edit Customer</span></li>
						</ol>
					</div>
					<!-- /Breadcrumb -->
					</div>
                  <!-- /Title -->
                  <div class="row">
						<div class="col-md-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">EDIT CUSTOMER</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<form action="<?php echo site_url('operator/customers/edit_submit') ;?>" id="edit_customer" method="post">
														<div class="form-body">
															<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Personal Info</h6>
															<input type="hidden" id="SUBSCRIBER_ID" name="SUBSCRIBER_ID" value="<?php echo $_GET['SUBSCRIBER_ID']?>">
															<hr class="light-grey-hr"/>
															
															<div class="row">
															    <div class="col-md-3">
																	<div class="form-group">
																		<label class="control-label mb-10">Subscription No</label>
																		<input type="text" id="subscribe" class="form-control" name="SUBSCRIPTION_NO" value="<?php echo $data[0]['SUBSCRIPTION_NO'];?>">
																		 
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group">
																		<label class="control-label mb-10">Secondary Subscription No(Optional)</label>
																		<input type="text" id="subscribe2" class="form-control" name="SEC_SUBS_NO" value="<?php echo $data[0]['SEC_SUBS_NO']; ?>">
																		 
																	</div>
																</div>
																<input type="hidden" name="OP_ID" value="<?php echo $_SESSION['dcn_id'];?>">
															</div>
															<div class="row">
																<div class="col-md-3">
																	<div class="form-group">
																		<label class="control-label mb-10">First Name<span style="color:red">*<span></label>
																		<input type="text" id="firstName" class="form-control" name="FIRST_NAME" value="<?php echo $data[0]['FIRST_NAME']; ?>" placeholder="First Name">
																		 
																	</div>
																</div>
																<!--/span-->
																<div class="col-md-3">
																	<div class="form-group">
																		<label class="control-label mb-10">Last Name</label>
																		<input type="text" id="lastName" class="form-control" name="LAST_NAME" value="<?php echo $data[0]['LAST_NAME']; ?>" placeholder="Last Name">
																		
																	</div>
																</div>
																<!--/span-->
																
																<div class="col-md-3">
																	<div class="form-group">
																	<label class="control-label mb-10">Gender</label>
																		<select class="form-control" name="GENDER" id="GENDER">
																			  <?php 
																			switch($data[0]['GENDER'])
																			{
																				case 'M':
																				
																				echo "<option selected='selected' value='M'>Male</option>";
																				echo "<option  value='F'>Female</option>";
																				break;	
																				
																				case 'F':
																				
																				echo "<option value='M'>Male</option>";
																				echo "<option  selected='selected' value='F'>Female</option>";
																				break;
                                                                            
																			  }

																			 
																			 ?>
																			  
										
																		</select>
																	</div>
															    </div>
																<div class="col-md-3">
																	<div class="form-group">
																		<label class="control-label mb-10">Profession</label>
																		
																		<select class="form-control" name="PROFESSION" id="PROFESSION">
																		      
																			  <option value="Architect" <?php if ($data[0]['PROFESSION'] == 'Architect') { echo 'selected="selected"';}?>>Architect</option>
																			  <option value="Artisan" <?php if ($data[0]['PROFESSION'] == 'Artisan') { echo 'selected="selected"';}?>>Artisan</option>
																			  <option value="Baker" <?php if ($data[0]['PROFESSION'] == 'Baker') { echo 'selected="selected"';}?>>Baker</option>
																			  <option value="Dancer" <?php if ($data[0]['PROFESSION'] == 'Dancer') { echo 'selected="selected"';}?>>Dancer</option>
																			  <option value="Doctor" <?php if ($data[0]['PROFESSION'] == 'Doctor') { echo 'selected="selected"';}?>>Doctor</option>
																			  <option value="Engineer" <?php if ($data[0]['PROFESSION'] == 'Engineer') { echo 'selected="selected"';}?>>Engineer</option>
																			  <option value="Fashion designer" <?php if ($data[0]['PROFESSION'] == 'Fashion designer') { echo 'selected="selected"';}?>>Fashion designer</option>
																			  <option value="Graphic designer" <?php if ($data[0]['PROFESSION']== 'Graphic designer') { echo 'selected="selected"';}?>>Graphic designer</option>
																			  <option value="Government Job" <?php if ($data[0]['PROFESSION'] == 'Government Job') { echo 'selected="selected"';}?>>Government Job</option>
																			  <option value="Hairstylist" <?php if ($data[0]['PROFESSION'] == 'Hairstylist') { echo 'selected="selected"';}?>>Hairstylist</option>
																			  <option value="Make-up artist" <?php if ($data[0]['PROFESSION'] == 'Make-up artist') { echo 'selected="selected"';}?>>Make-up artist</option>
																			  <option value="Private Job" <?php if ($data[0]['PROFESSION'] == 'Private Job') { echo 'selected="selected"';}?>>Private Job</option>
																			  <option value="Shop Keeper" <?php if ($data[0]['PROFESSION'] == 'Shop Keeper') { echo 'selected="selected"';}?>>Shop Keeper</option>

																			
																		</select>
																	</div>
																</div>
																
															</div>
															<!-- /Row -->
															<div class="row">
															<div class="col-md-3">
																	<div class="form-group">
																		<label class="control-label mb-10">House No</label>
																		<input type="text" id="houseno" class="form-control" name="HOUSE_NO" value="<?php echo $data[0]['HOUSE_NO']; ?>" placeholder="B-2">
																		
																	</div>
																</div>
															<div class="col-md-3">
																	<div class="form-group">
																		<label class="control-label mb-10">Area</label>
																		<select class="form-control" name="AREA_ID" id="aarea">
																		<option selected='selected' value="<?php echo $data[0]['AREA_ID']?>"><?php echo $data[0]['AREA_NAME']?></option>

																		<?php option_dif_where('areas','OP_ID='.$_SESSION['dcn_id'],'ID','NAME');?> 
																			
																		</select>
																	</div>
															</div>
																<div class="col-md-3">
																	<div class="form-group">
                                                                    <label class="control-label mb-10">Address<span style="color:red">*<span></label>
																		<input type="text" id="address" class="form-control" name="ADDRESS" value="<?php echo $data[0]['ADDRESS']; ?>" placeholder="">
																		 
																	</div>
																</div>
															<!--/span-->
																<div class="col-md-3">
																	<div class="form-group">
																		<label class="control-label mb-10">PIN</label>
																		<input type="text" class="form-control" name="PINCODE" value="<?php echo $data[0]['PINCODE']; ?>" placeholder="208021">
																	</div>
																</div>
																
																
															</div>
															<!-- /Row -->
															<div class="row">
															<div class="col-md-3">
																  	<div class="form-group">
																		<label class="control-label mb-10">Walking order</label>
																		
																		<select class="form-control" name="WALKING_ORDER" id="wo_order">

																		<option value="1">First Subscriber</option>
																		<option value="<?php echo $data[0]['WALKING_ORDER']; ?>" selected="selected"><?php echo $data[0]['WALKING_ORDER']; ?></option>
																			
																		</select>
																	</div>
															    </div>
                                                                <div class="col-md-3">
																	<div class="form-group">
																		<label class="control-label mb-10">Country</label>
																		<select class="form-control" name="COUNTRY" tabindex="1">
																		    
																			<option value="India">India</option>
																	
																		</select>
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group">
																		<label class="control-label mb-10">State</label>
																		<select class="form-control" name="STATE" tabindex="1">
																		    
																			<option value="Andaman and Nicobar Islands" <?php if ($data[0]['STATE'] == 'Andaman and Nicobar Islands') { echo 'selected="selected"';}?>>Andaman and Nicobar Islands</option>
																			<option value="Andhra Pradesh" <?php if ($data[0]['STATE'] == 'Andhra Pradesh') { echo 'selected="selected"';}?>>Andhra Pradesh</option>
																			<option value="Arunachal Pradesh" <?php if ($data[0]['STATE'] == 'Arunachal Pradesh') { echo 'selected="selected"';}?>>Arunachal Pradesh</option>
																			<option value="Assam" <?php if ($data[0]['STATE'] == 'Assam') { echo 'selected="selected"';}?>>Assam</option>
																			<option value="Bihar" <?php if ($data[0]['STATE'] == 'Bihar') { echo 'selected="selected"';}?>>Bihar</option>
																			<option value="Chandigarh" <?php if ($data[0]['STATE'] == 'Chandigarh') { echo 'selected="selected"';}?>>Chandigarh</option>
																			<option value="Chhattisgarh" <?php if ($data[0]['STATE'] == 'Chhattisgarh') { echo 'selected="selected"';}?>>Chhattisgarh</option>
																			<option value="Dadra and Nagar Haveli" <?php if ($data[0]['STATE'] == 'Dadra and Nagar Haveli') { echo 'selected="selected"';}?>>Dadra and Nagar Haveli</option>
																			<option value="Daman and Diu" <?php if ($data[0]['STATE'] == 'Daman and Diu') { echo 'selected="selected"';}?>>Daman and Diu</option>
																			<option value="Delhi" <?php if ($data[0]['STATE'] == 'Delhi') { echo 'selected="selected"';}?>>Delhi</option>
																			<option value="Goa" <?php if ($data[0]['STATE'] == 'Goa') { echo 'selected="selected"';}?>>Goa</option>
																			<option value="Gujarat" <?php if ($data[0]['STATE'] == 'Gujarat') { echo 'selected="selected"';}?>>Gujarat</option>
																			<option value="Haryana" <?php if ($data[0]['STATE'] == 'Haryana') { echo 'selected="selected"';}?>> Haryana</option>
																			<option value="Himachal Pradesh" <?php if ($data[0]['STATE'] == 'Himachal Pradesh') { echo 'selected="selected"';}?>>Himachal Pradesh</option>
																			<option value="Jammu and Kashmir" <?php if ($data[0]['STATE'] == 'Jammu and Kashmir') { echo 'selected="selected"';}?>>Jammu and Kashmir</option>
																			<option value="Jharkhand" <?php if ($data[0]['STATE'] == 'Jharkhand') { echo 'selected="selected"';}?>>Jharkhand</option>
																			<option value="Karnataka" <?php if ($data[0]['STATE'] == 'Karnataka') { echo 'selected="selected"';}?>>Karnataka</option>
																			<option value="Kerala" <?php if ($data[0]['STATE'] == 'Kerala') { echo 'selected="selected"';}?>>Kerala</option>
																			<option value="Lakshadweep" <?php if ($data[0]['STATE'] == 'Lakshadweep') { echo 'selected="selected"';}?>>Lakshadweep</option>
																			<option value="Madhya Pradesh" <?php if ($data[0]['STATE'] == 'Madhya Pradesh') { echo 'selected="selected"';}?>>Madhya Pradesh</option>
																			<option value="Maharashtra" <?php if ($data[0]['STATE'] == 'Maharashtra') { echo 'selected="selected"';}?>>Maharashtra</option>
																			<option value="Manipur" <?php if ($data[0]['STATE'] == 'Manipur') { echo 'selected="selected"';}?>>Manipur</option>
																			<option value="Meghalaya" <?php if ($data[0]['STATE'] == 'Meghalaya') { echo 'selected="selected"';}?>>Meghalaya</option>
																			<option value="Mizoram" <?php if ($data[0]['STATE'] == 'Mizoram') { echo 'selected="selected"';}?>>Mizoram</option>
																			<option value="Nagaland" <?php if ($data[0]['STATE'] == 'Nagaland') { echo 'selected="selected"';}?>>Nagaland</option>
																			<option value="Orissa" <?php if ($data[0]['STATE'] == 'Orissa') { echo 'selected="selected"';}?>>Orissa</option>
																			<option value="Pondicherry" <?php if ($data[0]['STATE'] == 'Pondicherry') { echo 'selected="selected"';}?>>Pondicherry</option>
																			<option value="Punjab" <?php if ($data[0]['STATE'] == 'Punjab') { echo 'selected="selected"';}?>>Punjab</option>
																			<option value="Rajasthan" <?php if ($data[0]['STATE'] == 'Rajasthan') { echo 'selected="selected"';}?>>Rajasthan</option>
																			<option value="Sikkim" <?php if ($data[0]['STATE'] == 'Sikkim') { echo 'selected="selected"';}?>>Sikkim</option>
																			<option value="Tamil Nadu" <?php if ($data[0]['STATE'] == 'Tamil Nadu') { echo 'selected="selected"';}?>>Tamil Nadu</option>
																			<option value="Tripura" <?php if ($data[0]['STATE'] == 'Tripura') { echo 'selected="selected"';}?>>Tripura</option>
																			<option value="Uttaranchal" <?php if ($data[0]['STATE'] == 'Uttaranchal') { echo 'selected="selected"';}?>>Uttaranchal</option>
																			<option value="Uttar Pradesh" <?php if ($data[0]['STATE'] == 'Uttar Pradesh') { echo 'selected="selected"';}?>>Uttar Pradesh</option>
																			<option value="West Bengal" <?php if ($data[0]['STATE'] == 'West Bengal') { echo 'selected="selected"';}?>>West Bengal</option>
																		</select>
																	</div>
																</div>
																
																<div class="col-md-3">
																	<div class="form-group">
																		<label class="control-label mb-10">City</label>
																		<input type="text" class="form-control" name="CITY" value="<?php echo $data[0]['CITY']; ?>" placeholder="">
																	</div>
																</div>
															
															</div>
															<!-- /Row -->
                                                        
															
															
															<div class="row">
																<div class="col-md-4">
																	<div class="form-group">
																		<label class="control-label mb-10">Mobile<span style="color:red">*<span></label>
																		<input type="text" class="form-control" name="MOBILE" value="<?php echo $data[0]['MOBILE']; ?>" placeholder="" maxlength="10" onkeypress="return isNumber(event)">
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<label class="control-label mb-10">Alternate No</label>
																		<input type="text" class="form-control" name="ALT_MOBILE" value="<?php echo $data[0]['ALT_MOBILE']; ?>" placeholder="" maxlength="10" onkeypress="return isNumber(event)">
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<label class="control-label mb-10">Phone</label>
																		<input type="text" class="form-control" name="PHONE" value="<?php echo $data[0]['PHONE']; ?>" placeholder="" maxlength="10" onkeypress="return isNumber(event)">
																	</div>
																</div>
															</div>
															<div class="row">
															<div class="col-md-4">
																	<div class="form-group">
																		<label class="control-label mb-10">PAN NO</label>
																		<input type="text" class="form-control" name="PAN" value="<?php echo $data[0]['PAN']; ?>" placeholder="">
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<label class="control-label mb-10">ADHAR No</label>
																		<input type="text" class="form-control" name="ADHAR" value="<?php echo $data[0]['ADHAR']; ?>" placeholder="" maxlength="12" onkeypress="return isNumber(event)">
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<label class="control-label mb-10">GST No</label>
																		<input type="text" class="form-control" name="GST" value="<?php echo $data[0]['GST']; ?>" placeholder="">
																	</div>
																</div>
															</div>
															<!-- /Row -->
															<div class="row">
															<div class="col-md-4">
																	<div class="form-group">
																		<label class="control-label mb-10">Email<span style="color:red">*<span></label>
																		<input type="email" class="form-control" name="EMAIL" value="<?php echo $data[0]['EMAIL']; ?>" placeholder="">
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<label class="control-label mb-10">User Name<span style="color:red">*<span></label>
																		<input type="text" class="form-control" name="USER_NAME" value="<?php echo $data[0]['USER_NAME']; ?>" placeholder="">
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<label class="control-label mb-10">Password<span style="color:red">*<span></label>
																		<input type="password" class="form-control" name="PASSWORD" value="<?php echo $data[0]['PASSWORD'];?>" placeholder="">
																	</div>
																</div>
															</div>
                                                            <div class="seprator-block"></div>
															
															
																	<?php 
																	/* for($x=1;$x<=sizeof($no_of_packs);$x++)
																	{
																	//echo $no_of_packs[$x-1]["NUM_PACK"];
																	echo '<input type="text" name="" id="p'.$x.'" value="'.$no_of_packs[$x-1]["NUM_PACK"].'">';
																	
																	} */
																	?>
																	<div id="box_pack_count">
																	
																	
																	
																	</div>
																	<input type="hidden" name="counterr" value="0" id="counterr">
																</div>
															<!-- /Row -->
															
															
                                                            <div class="seprator-block"></div>
															
															
														  <div id="new_box">
	
														  </div>
                                                         
														 <div class="form-actions mt-10 edit">
															
														</div>
														<div class="form-actions mt-10">
															<button type="submit" class="btn btn-success  mr-10"> Submit</button>
															<button type="button" class="btn btn-danger">Cancel</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>		
						</div>
					</div>
					<!-- /Row -->
					<div class="container">
					<!-- Modal -->
							<div class="modal fade" id="myModal" role="dialog">
								<div class="modal-dialog">
								
								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Select Packs & ALA</h4>
									</div>
									<div class="modal-body" id="get_packs">
									
									</div>
									<div class="modal-footer">
									<button type="button" id="pack_model_close" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>
								
								</div>
							</div>
							
					</div>
					<script>
					$(document).on("change","#select1",function(){

							var value=$(this).find('option:selected').text();
							var res = value.split("-");
								$("#mrpp").val(res[res.length-1]);
								
								})

					</script>
					<script>
                     $(document).on("change","#disc",function(){

							var value=$(this).val();
							if(value==0){
                            var discount=$("#discamt").val();
							   console.log(discount);
							}
                               
							else{

								discount=($("#mrpp").val()*$("#discamt").val())/100;
								console.log(discount);
							} 


								});
								

									

                             $(document).on("change","#aarea",function(){
                                      
								    var displayResources = $('#wo_order');
									
									$.ajax({type: "POST",
											url: "http://localhost/newdcntv.in/operator/add_customer/show_walk_order",
											data: { ID: $("#aarea").val() },
											success: function(result)
                                     {
	                                    result=JSON.parse(result);
										var output="";
										for (var i in result)
										{
										 output+="<option>"+"After"+" " + result[i].HOUSE_NO + "</option>";
										}
										
										
										displayResources.append(output);

										
                                     },
										error:function(result) {
											alert('error');
											}



									});

								});

							
							
								


					</script>
					
					<script>
					var ind=0;
					var counterr=0;
					var result_pc;
					    $(document).ready(function(){
                            <?php
                            for($k=1;$k<=$no_of_boxes['NUM_BOX'];$k++)
							{
								?>
							    
				               $(".edit").append('<button type="button" id="<?php echo $k ?>" class="btn btn-sm btn-success mr-10 EEdit" style="border-radius: 50%;margin: 4px 2px;padding: 20px;"> Edit Box'+'<br>'+'<span style="font-size:10px"><?php  echo "VC NO:".$vc_no[$k-1]['VC_NO']?></span>'+'</button>');
							   <?php	
							}
							
                       ?>
                    
					   $(document).on("click",".EEdit",function(){

                         counterr= Number($(this).attr('id'));
						 ind++;
						 $.ajax({
							type: "POST",
							dataType: "json",
							url: "http://localhost/dcntv-app/operator/customers/packs_and_ala",
							data: {
								"box_num":counterr,
								"SUBSCRIBER_ID":$("#SUBSCRIBER_ID").val()
								
							},
							success: function(result) {
							//	alert(result);		
							result_pc=result;	
							//alert(result.length);	
							$("#BOX_NO"+ind).val(result_pc[0]['BOX_NO']);
							$("#VC_NO"+ind).val(result_pc[0]['VC_NO']);
							$("#COMP_ID"+ind).val(result_pc[0]['COMP_NAME']);
							$("#COMP_VAL"+ind).val(result_pc[0]['COMP_ID']);
							if(result_pc[0]['STATUS']==1){

                            $("#STATUS"+ind).html('<option value="1" selected>Activated</option><option value="0">Deactivated</option>');
																			

							}
							else{

							$("#STATUS"+ind).html('<option value="1">Activated</option><option value="0" selected>Deactivated</option>');	
							}
							for(var b=0;b<=result.length-1;b++){
								if(result[b]['TYPE']==0)  {

								$("#pack_place"+ind).append('<button type="button" id="" class="btn btn-sm btn-info mr-10 pc" style="border-radius: 50%;margin: 4px 2px;padding: 20px;" data-toggle="collapse" data-target="#'+ind+b+'"> Edit Pack'+'<br>'+result[b]['PA_NAME']+'-'+result[b]['AMOUNT']+'</button><div id="'+ind+b+'" class="collapse"><div style="border-bottom: 1px solid blue;width:17%;height:auto;border-radius: 25px;background:hsl(197, 44%, 50%);padding: 20px;"><ul><li>Pack Name:<input class="form-control" type="text" name="PACK'+ind+b+'" value='+'"'+result[b]['PA_NAME']+'-'+result[b]['AMOUNT']+'"'+'></li><li>Pack Amount:<input class="form-control" type="text" name="AMOUNT'+ind+b+'" value='+'"'+result[b]['AMOUNT']+'"'+'></li><li>Discount:<input class="form-control" type="text" name="DISC_AMOUNT'+ind+b+'" value='+'"'+result[b]['DISC_AMOUNT']+'"'+'> </li><li>Discount Type:<select  class="form-control dtype" name="DISCOUNT_TYPE'+ind+b+'" id="disc"><option value="0" >Flat</option><option value="1" >Percentage</option></select></li><li>Biling Cycle:<select class="form-control" name="BILLING_CYCLE'+ind+b+'" ><option value="0">Monthly</option><option value="1">Daily</option></select></li><li>Auto Renew:<select class="form-control" name="AUTO_RENEW'+ind+b+'" ><option value="0">Yes</option><option value="1">No</option></select></li><li>Activation Date:<div class="input-group date" id="ACTIVATION_DATE'+ind+b+'"><input type="text" class="form-control" name="ACTIVATION_DATE'+ind+b+'" id="" value='+'"'+result[b]['ACTIVATION_DATE']+'"'+'/><span class="input-group-addon"><span class="fa fa-calendar"></span></span></div></li><li>Expiry days:<input  type="text" class="form-control"  name="CLOSING_DATE'+ind+b+'" value='+'"'+result[b]['CLOSING_DATE']+'"'+'></li><li><input type="hidden" name="" value="0"></li><li><input type="hidden" name="" value=""></li></ul></div></div>');
								$("#pack_ids"+ind).append('<input type="hidden" name="PAC_ACT_ID'+ind+b+'" id="PACK_ACT_ID'+ind+b+'" value='+'"'+result[b]['PACK_ACT_ID']+'"'+'>'); 
								
								}  
							
								else{

								$("#ala_place"+ind).append('<button type="button" id="" class="btn btn-sm btn-info mr-10 pc" style="border-radius: 50%;margin: 4px 2px;padding: 20px;" data-toggle="collapse" data-target="#'+ind+b+'" > Edit ALA'+'<br>'+result[b]['CHA_NAME']+'-'+result[b]['AMOUNT']+'</button><div id="'+ind+b+'" class="collapse"><div style="border-bottom: 1px solid blue;width:17%;height:auto;border-radius: 25px;background:hsl(197, 44%, 50%);padding: 20px;"><ul><li><input type="hidden" name="PAC_ACT_ID'+ind+b+'" id="PACK_ACT_ID'+ind+b+'" value='+'"'+result[b]['PACK_ACT_ID']+'"'+'>Channel Name:<input class="form-control" type="text" name="PACK'+ind+b+'" value='+'"'+result[b]['CHA_NAME']+'-'+result[b]['AMOUNT']+'"'+'></li><li>Channel Amount:<input class="form-control" type="text" name="AMOUNT'+ind+b+'" value='+'"'+result[b]['AMOUNT']+'"'+'></li><li>Discount:<input class="form-control" type="text" name="DISC_AMOUNT'+ind+b+'" value='+'"'+result[b]['DISC_AMOUNT']+'"'+'> </li><li>Discount Type:<select  class="form-control" name="DISCOUNT_TYPE'+ind+b+'" id="disc"><option value="0">Flat</option><option value="1">Percentage</option></select></li><li>Biling Cycle:<select class="form-control" name="BILLING_CYCLE'+ind+b+'" ><option value="0">Monthly</option><option value="1">Daily</option></select></li><li>Auto Renew:<select class="form-control" name="AUTO_RENEW'+ind+b+'" ><option value="0">Yes</option><option value="1">No</option></select></li><li>Activation Date:<div class="input-group date" id="ACTIVATION_DATE'+ind+b+'"><input type="text" class="form-control" name="ACTIVATION_DATE'+ind+b+'" id="" value='+'"'+result[b]['ACTIVATION_DATE']+'"'+'/><span class="input-group-addon"><span class="fa fa-calendar"></span></span></div></li><li>Expiry days:<input  type="text" class="form-control"  name="CLOSING_DATE'+ind+b+'" value='+'"'+result[b]['CLOSING_DATE']+'"'+'></li><li><input type="hidden" name="" value="0"></li><li><input type="hidden" name="" value=""></li></ul></div></div>');
                                        

								}     
								if(result[b]['DISCOUNT_TYPE']==1)

												$('select[name="DISCOUNT_TYPE'+ind+b+'"]').find('option[value="1"]').attr("selected",true);

												else

												$('select[name="DISCOUNT_TYPE'+ind+b+'"]').find('option[value="0"]').attr("selected",true);

								if(result[b]['BILLING_CYCLE']==1)

												$('select[name="BILLING_CYCLE'+ind+b+'"]').find('option[value="1"]').attr("selected",true);

												else

												$('select[name="BILLING_CYCLE'+ind+b+'"]').find('option[value="0"]').attr("selected",true);

								if(result[b]['AUTO_RENEW']==1)

												$('select[name="AUTO_RENEW'+ind+b+'"]').find('option[value="1"]').attr("selected",true);

												else

												$('select[name="AUTO_RENEW'+ind+b+'"]').find('option[value="0"]').attr("selected",true);



								
								$('#ACTIVATION_DATE'+ind+b).datetimepicker({
									
									defaultDate: new Date(),
									format:'YYYY-MM-DD HH:mm:ss',
									
									
									
								});

								
																
            
							}

							$("#pack_place"+ind).append('<button type="button" class="change_pack" id="change_pack-'+ind+'" data-toggle="modal" data-target="#myModal" >Change Pack</button>');
							$("#box_pack_count").append('<input type="hidden" name="box'+ind+'" value="'+result.length+'">');
							$("#STB_VC_PAIRING").append('<input type="hidden" name="STB_VC_PAIR'+ind+'" value="'+result[0]['STB_ID']+'-'+result[0]['VC_ID']+'-'+result[0]['PAIRING_ID']+'">');
							$("#counterr").val(ind);
                            $("#change_pack-"+ind).on("click",function(){
                                
								var attr=$(this).attr('id').split("-")[1];
								var COMP_ID=$("#COMP_VAL"+attr).val();

								$.ajax({
											"type":"post",
											"url":"<?php echo base_url('operator/add_customer/show_mso_packs_ala3')?>",
											"data":{"COMP_ID":COMP_ID,"CURRENT_COMP":attr},

											success:function(result){
												$("#get_packs").html(result);
											},

											error:function(){
												alert('error');
											}


								});

							})  

							},
							error: function(result) {
								alert('error');
							}
																					

						});			              

                         $("#new_box").append('<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account-box mr-10"></i>Box('+ind+') details</h6>'+
						                                           '<hr class="light-grey-hr"/>'+
																   '<div class="col-md-4">'+
																	'<div class="form-group">'+
																		'<label class="control-label mb-10">STB No<span style="color:red">*<span></label>'+
																		'<input type="text" class="form-control" id ="BOX_NO'+ind+'" name="BOX_NO'+ind+'" value="" placeholder="">'+
																	'</div>'+
																'</div>'+
																'<div class="col-md-4">'+
																	'<div class="form-group">'+
																		'<label class="control-label mb-10">VC No<span style="color:red">*<span></label>'+
																		'<input type="text" class="form-control" id ="VC_NO'+ind+'" name="VC_NO'+ind+'" value="" placeholder="">'+
																	'</div>'+
																'</div>'+
																'<div class="col-md-4">'+
																	'<div class="form-group">'+
																		'<label class="control-label mb-10">Company</label>'+
																		
																		'<input type="text" class="form-control" id ="COMP_ID'+ind+'" name="COMP_ID'+ind+'" value="" placeholder="" disabled>'+
																		'<input type="hidden" class="form-control" id ="COMP_VAL'+ind+'" name="COMP_VAL'+ind+'" value="" placeholder="" >'+
																	'</div>'+
																'</div>'+
																
															'</div>'+
															
															'<div class="row">'+
															 '<div class="col-md-3">'+
																	'<div class="form-group">'+
																		'<label class="control-label mb-10">Box Type</label>'+
																		'<select class="form-control" name="BOX_TYPE'+ind+'" tabindex="1">'+
																		'<?php option_dif_no_where('box_type','ID','BOX_TYPE');?>'+
																			
																		'</select>'+
																	'</div>'+
																'</div>'+
																'<div class="col-md-3">'+
																	'<div class="form-group">'+
																		'<label class="control-label mb-10">Warranty Type</label>'+
																		'<select class="form-control" name="WARRANTY_TYPE'+ind+'" tabindex="1">'+
																			'<?php option_dif_no_where('box_warranty','ID','WARRANTY_TYPE');?>'+
																			
																		'</select>'+
																	'</div>'+
																'</div>'+
																'<div class="col-md-3">'+
																	'<div class="form-group">'+
																		'<label class="control-label mb-10">Status</label>'+
																		'<select class="form-control" name="STATUS'+ind+'" id="STATUS'+ind+'" tabindex="1">'+
																			
																		'</select>'+
																	'</div>'+
																'</div>'+
																'<div id="STB_VC_PAIRING"></div>'+
																''+
																'</div>'+'<hr class="light-grey-hr"/>'+
																'<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account-box mr-10"></i>Package Details</h6>'+
																'<div id="pack_place'+ind+'"></div>'+
																'<div id="pack_ids'+ind+'"></div>'+
																
																'<hr class="light-grey-hr"/>'+

																'<div id="ala_place'+ind+'"></div>'+
																
																'<hr class="light-grey-hr"/>'+
															
															'<div id="pack_ala_append'+ind+'" style="overflow: auto;">'+
															'</div>'
															
															);


															$(this).hide();
															/* for(var m=1;m<=$("#p"+ind).val();m++){

																$("#pack_place"+ind).append('<button type="button" id="" class="btn btn-sm btn-info mr-10 "> Edit Pack'+m+'</button>');

															} */
															
														
					                                       });
					  
														    $(document).on("click",".pc",function(){
																	//alert(result_pc[1]['AMOUNT']);
																	//$("#pack_ala_append"+ind).append('good');
																	$(this).hide();
																} );

												   
											 
												  


						});
						

					</script>