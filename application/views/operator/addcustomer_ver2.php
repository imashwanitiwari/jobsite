<!-- Main Content -->
<div class="page-wrapper">
            <div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<h5 class="txt-dark"> Add Customer</h5>
						<h5><?php echo validation_errors(); ?></h5>
						
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="<?php echo site_url('dashboard')?>">Dashboard</a></li>
							<li><a href="#"><span>Cable TV Users</span></a></li>
							<li class="active"><span>Add Customer</span></li>
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
										<h6 class="panel-title txt-dark">ADD NEW CUSTOMER</h6>
										<?php if($this->session->flashdata('user_added')):?>
									<div class="alert alert-dismissible alert-success">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>Well done!</strong> Customer Has Been Added Successfully.
									</div>
									<?php endif;?>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<form action="<?php echo site_url('operator/add_customer/add_cust') ;?>" id="add_customer" method="post">
														<div class="form-body">
															<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Personal Info</h6>
															<hr class="light-grey-hr"/>
															
															<div class="row">
															    <div class="col-md-3">
																	<div class="form-group">
																		<label class="control-label mb-10">Subscription No</label>
																		<input type="text" id="subscribe" class="form-control" name="SUBSCRIPTION_NO" value="<?php echo $subs_no['subs_no'];?>">
																		 
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="form-group">
																		<label class="control-label mb-10">Secondary Subscription No(Optional)</label>
																		<input type="text" id="subscribe2" class="form-control" name="SEC_SUBS_NO" value="<?php echo set_value('SEC_SUBS_NO'); ?>">
																		 
																	</div>
																</div>
																<div class="col-md-2">
																	<div class="form-group">
																		<label class="control-label mb-10">Connection Type</label>
																		<select class="form-control" name="CONNECTION_TYPE" id="CONNECTION_TYPE">
																		      <option value="null">--Select--</option>
																			  <option value="0">Prepaid</option>
																			  <option value="1">Postpaid</option>
																			
																		</select>
																	</div>
																</div>
																<div class="col-md-2">
																	<div class="form-group">
																		<label class="control-label mb-10">Billing Day</label>
																		
																		<select class="form-control" name="BILLING_DAY" id="BILLING_DAY">
																		      <option value="null">--Select--</option>
																			  <option value="1">1</option>
																			  <option value="2">2</option>
																			  <option value="3">3</option>
																			  <option value="4">4</option>
																			  <option value="5">5</option>
																			  <option value="6">6</option>
																			  <option value="7">7</option>
																			  <option value="8">8</option>
																			  <option value="9">9</option>
																			  <option value="10">10</option>
																			  <option value="11">11</option>
																			  <option value="12">12</option>
																			  <option value="13">13</option>
                                                                              <option value="14">14</option>
																			  <option value="15">15</option>
																			  <option value="16">16</option>
																			  <option value="17">17</option>
																			  <option value="18">18</option>
																			  <option value="19">19</option>
																			  <option value="20">20</option>
																			  <option value="21">21</option>
																			  <option value="22">22</option>
																			  <option value="23">23</option>
																			  <option value="24">24</option>
																			  <option value="25">25</option>
																			  <option value="26">26</option>
																			  <option value="27">27</option>
																			  <option value="28">28</option>
																			  <option value="29">29</option>
																			  <option value="30">30</option>
																			  <option value="31">31</option>
																		</select>
																	</div>
																</div>
																<div class="col-md-2">
																	<div class="form-group">
																		<label class="control-label mb-10">Bill Dues Day Limit</label>
																		
																		<select class="form-control" name="BILL_DUES_LIMIT" id="BILL_DUES_LIMIT">
																		      <option value="null">--Select--</option>
																			  <option value="1">1</option>
																			  <option value="2">2</option>
																			  <option value="3">3</option>
																			  <option value="4">4</option>
																			  <option value="5">5</option>
																			  <option value="6">6</option>
																			  <option value="7">7</option>
																			  <option value="8">8</option>
																			  <option value="9">9</option>
																			  <option value="10">10</option>
																			  <option value="11">11</option>
																			  <option value="12">12</option>
																			  <option value="13">13</option>
                                                                              <option value="14">14</option>
																			  <option value="15">15</option>
																			  <option value="16">16</option>
																			  <option value="17">17</option>
																			  <option value="18">18</option>
																			  <option value="19">19</option>
																			  <option value="20">20</option>
																			  <option value="21">21</option>
																			  <option value="22">22</option>
																			  <option value="23">23</option>
																			  <option value="24">24</option>
																			  <option value="25">25</option>
																			  <option value="26">26</option>
																			  <option value="27">27</option>
																			  <option value="28">28</option>
																			  <option value="29">29</option>
																			  <option value="30">30</option>
																			  <option value="31">31</option>
																		</select>
																	</div>
																</div>
																<input type="hidden" name="OP_ID" value="<?php echo $_SESSION['dcn_id'];?>">
																<input type="hidden" name="NUM_PRODUCT" value="<?php echo sizeof($products)?>">
															</div>
															<div class="row">
																<div class="col-md-3">
																	<div class="form-group">
																		<label class="control-label mb-10">First Name<span style="color:red">*<span></label>
																		<input type="text" id="firstName" class="form-control" name="FIRST_NAME" value="<?php echo set_value('FIRST_NAME'); ?>" placeholder="First Name">
																		 
																	</div>
																</div>
																<!--/span-->
																<div class="col-md-3">
																	<div class="form-group">
																		<label class="control-label mb-10">Last Name</label>
																		<input type="text" id="lastName" class="form-control" name="LAST_NAME" value="<?php echo set_value('LAST_NAME'); ?>" placeholder="Last Name">
																		
																	</div>
																</div>
																<!--/span-->
																<div class="col-md-3">
																	<div class="form-group">
																		<label class="control-label mb-10">Gender</label>
																		<select class="form-control" name="GENDER" id="GENDER">
																		      <option value="null">--Select--</option>
																			  <option value="M">Male</option>
																			  <option value="F">Female</option>
																			
																		</select>
																	</div>
															    </div>
																<div class="col-md-3">
																	<div class="form-group">
																		<label class="control-label mb-10">Profession</label>
																		
																		<select class="form-control" name="PROFESSION" id="PROFESSION">
																		      <option value="null">--Select--</option>
																			  <option value="Architect">Architect</option>
																			  <option value="ArtisanF">Artisan</option>
																			  <option value="Baker">Baker</option>
																			  <option value="Dancer">Dancer</option>
																			  <option value="Doctor">Doctor</option>
																			  <option value="Engineer">Engineer</option>
																			  <option value="Fashion designer">Fashion designer</option>
																			  <option value="Graphic designer">Graphic designer</option>
																			  <option value="Government Job">Government Job</option>
																			  <option value="Hairstylist">Hairstylist</option>
																			  <option value="Make-up artist">Make-up artist</option>
																			  <option value="Private Job">Private Job</option>
																			  <option value="Private Job">Shop Keeper</option>

																			
																		</select>
																	</div>
																</div>
																
															</div>
															<!-- /Row -->
															<div class="row">
															<div class="col-md-3">
																	<div class="form-group">
																		<label class="control-label mb-10">House No</label>
																		<input type="text" id="houseno" class="form-control" name="HOUSE_NO" value="<?php echo set_value('HOUSE_NO'); ?>" placeholder="B-2">
																		
																	</div>
																</div>
															<div class="col-md-3">
																	<div class="form-group">
																		<label class="control-label mb-10">Area</label>
																		<select class="form-control" name="AREA_ID" id="aarea">
																		      <option value="null">--Select--</option>
																		<?php option_dif_where('areas','OP_ID='.$_SESSION['dcn_id'],'ID','NAME');?> 
																			
																		</select>
																	</div>
															</div>
																<div class="col-md-3">
																	<div class="form-group">
                                                                    <label class="control-label mb-10">Address<span style="color:red">*<span></label>
																		<input type="text" id="address" class="form-control" name="ADDRESS" value="<?php echo set_value('ADDRESS'); ?>" placeholder="">
																		 
																	</div>
																</div>
															<!--/span-->
																<div class="col-md-3">
																	<div class="form-group">
																		<label class="control-label mb-10">PIN</label>
																		<input type="text" class="form-control" name="PINCODE" value="<?php echo set_value('PINCODE'); ?>" placeholder="208021">
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
																		    <option value="">------------Select State------------</option>
																			<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
																			<option value="Andhra Pradesh">Andhra Pradesh</option>
																			<option value="Arunachal Pradesh">Arunachal Pradesh</option>
																			<option value="Assam">Assam</option>
																			<option value="Bihar">Bihar</option>
																			<option value="Chandigarh">Chandigarh</option>
																			<option value="Chhattisgarh">Chhattisgarh</option>
																			<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
																			<option value="Daman and Diu">Daman and Diu</option>
																			<option value="Delhi">Delhi</option>
																			<option value="Goa">Goa</option>
																			<option value="Gujarat">Gujarat</option>
																			<option value="Haryana">Haryana</option>
																			<option value="Himachal Pradesh">Himachal Pradesh</option>
																			<option value="Jammu and Kashmir">Jammu and Kashmir</option>
																			<option value="Jharkhand">Jharkhand</option>
																			<option value="Karnataka">Karnataka</option>
																			<option value="Kerala">Kerala</option>
																			<option value="Lakshadweep">Lakshadweep</option>
																			<option value="Madhya Pradesh">Madhya Pradesh</option>
																			<option value="Maharashtra">Maharashtra</option>
																			<option value="Manipur">Manipur</option>
																			<option value="Meghalaya">Meghalaya</option>
																			<option value="Mizoram">Mizoram</option>
																			<option value="Nagaland">Nagaland</option>
																			<option value="Orissa">Orissa</option>
																			<option value="Pondicherry">Pondicherry</option>
																			<option value="Punjab">Punjab</option>
																			<option value="Rajasthan">Rajasthan</option>
																			<option value="Sikkim">Sikkim</option>
																			<option value="Tamil Nadu">Tamil Nadu</option>
																			<option value="Tripura">Tripura</option>
																			<option value="Uttaranchal">Uttaranchal</option>
																			<option value="Uttar Pradesh">Uttar Pradesh</option>
																			<option value="West Bengal">West Bengal</option>
																		</select>
																	</div>
																</div>
																
																<div class="col-md-3">
																	<div class="form-group">
																		<label class="control-label mb-10">City</label>
																		<input type="text" class="form-control" name="CITY" value="<?php echo set_value('CITY'); ?>" placeholder="">
																	</div>
																</div>
															
															</div>
															<!-- /Row -->
                                                        
															
															
															<div class="row">
																<div class="col-md-4">
																	<div class="form-group">
																		<label class="control-label mb-10">Mobile<span style="color:red">*<span></label>
																		<input type="text" class="form-control" name="MOBILE" value="<?php echo set_value('MOBILE'); ?>" placeholder="" maxlength="10" onkeypress="return isNumber(event)">
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<label class="control-label mb-10">Alternate No</label>
																		<input type="text" class="form-control" name="ALT_MOBILE" value="<?php echo set_value('ALT_MOBILE'); ?>" placeholder="" maxlength="10" onkeypress="return isNumber(event)">
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<label class="control-label mb-10">Phone</label>
																		<input type="text" class="form-control" name="PHONE" value="<?php echo set_value('PHONE'); ?>" placeholder="" maxlength="10" onkeypress="return isNumber(event)">
																	</div>
																</div>
															</div>
															<div class="row">
															<div class="col-md-4">
																	<div class="form-group">
																		<label class="control-label mb-10">PAN NO</label>
																		<input type="text" class="form-control" name="PAN" value="<?php echo set_value('PAN'); ?>" placeholder="">
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<label class="control-label mb-10">ADHAR No</label>
																		<input type="text" class="form-control" name="ADHAR" value="<?php echo set_value('ADHAR'); ?>" placeholder="" maxlength="12" onkeypress="return isNumber(event)">
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<label class="control-label mb-10">GST No</label>
																		<input type="text" class="form-control" name="GST" value="<?php echo set_value('GST'); ?>" placeholder="">
																	</div>
																</div>
															</div>
															<!-- /Row -->
															<div class="row">
															<div class="col-md-4">
																	<div class="form-group">
																		<label class="control-label mb-10">Email<span style="color:red">*<span></label>
																		<input type="email" class="form-control" name="EMAIL" value="<?php echo set_value('EMAIL'); ?>" placeholder="">
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<label class="control-label mb-10">User Name<span style="color:red">*<span></label>
																		<input type="text" class="form-control" name="USER_NAME" value="<?php echo set_value('USER_NAME'); ?>" placeholder="">
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<label class="control-label mb-10">Password<span style="color:red">*<span></label>
																		<input type="password" class="form-control" name="PASSWORD" placeholder="">
																	</div>
																</div>
															</div>
                                                            <div class="seprator-block"></div>
															
															
																	<input type="hidden" name="counter" id="p" value="0">
																	<input type="hidden" name="counter2" id="q" value="0">
																	<input type="hidden" name="counter3" id="current_company" value="0">
																	<input type="hidden" name="counter4" id="index" value="0">
																	<div id="box_pack_count">
																	
																	
																	
																	</div>
																</div>
															<!-- /Row -->
															
															
                                                            <div class="seprator-block"></div>
															
															
														  <div id="new_box"></div>
                                                         <div style="margin-top:20px;">
														 
														 <button type="button" id="add_boxx" class="btn btn-danger" style="position: fixed; bottom: 67px;right: 0;">Add Box</button>
														
														 </div>
														 <div class="seprator-block"></div>
														 <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Accessories</h6>
														 <hr class="light-grey-hr"/>
														 <div class="table-responsive">
                                                         <table class="table table-bordered" id="product">
																<thead>
																<tr>
																    <th><input type="checkbox" name="ALL" value=""></th>
																	<th>Product</th>
																	<th>Quantity</th>
																	<th>Unit</th>
																	<th>Cost per Unit</th>
																	<th>Price</th>
																</tr>
																</thead>
																<tbody>
																<?php 
																for($i=0;$i<sizeof($products);$i++){
																	?>
																	<tr>
																    <td><input type="checkbox" class="form-control choose_product" name="check<?php echo $i?>" value="1"></td>

																	<td><?php echo $products[$i]['NAME']?></td>
																	<td><input type="text" class="form-control quantity" name="quantity<?php echo $i?>"  id="quantity<?php echo $i?>" disabled>
																	<input type="hidden" name="PRODUCT_ID<?php echo $i?>" value="<?php echo $products[$i]['ID']?>">
																	
																	
																	 </td>
																	<td>
                                                                    <?php if($products[$i]['UNIT']==1){?>
																		PIECE
																		
																		<?php		}?>
																		<?php if($products[$i]['UNIT']==2){?>
																		METER
																		
																		<?php		}?>
																		<?php if($products[$i]['UNIT']==3){?>
																		LITER
																		
																		<?php		}?>
																		<?php if($products[$i]['UNIT']==4){?>
																		KILOGRAM
																		
																		<?php		}?>
																	
																	</td>
																	<td><?php echo $products[$i]['SELLING_PRICE']?></td>
																	<td><input type="text" class="from-control tot_price" style="border: 0;" name="tot_price<?php echo $i?>"  id="tot_price<?php echo $i?>" readonly="readonly"> </td>
																	
																</tr>



                                                              <?php 
																}
																
																
																?>
																
																
																</tbody>
															</table>
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
					
					<script>
					$(document).on("change","#select1",function(){

							var value=$(this).find('option:selected').text();
							var res = value.split("-");
								$("#mrpp").val(res[res.length-1]);
								
								});

                     $(document).on("click",".choose_product",function(){
                        if ($(this).is(":checked")) {
						$(this).closest("tr").find('.quantity').prop( "disabled", false ); 
						}      
					   else
					   $(this).closest("tr").find('.quantity').prop( "disabled", true ); 
                     
					 });


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
								/* $("#button1").on("click", function(e) {

									
									var displayResources = $('#fact1');
									    
										
										$.ajax({type: "POST",
											url: "http://localhost/newdcntv.in/operator/add_customer/show_ala",
											data: { ID: $("#compp").val() },
											success: function(result)
 {
										result=JSON.parse(result);
										
										output="<table><thead><tr><th>Name</th></tr></thead><tbody>";
										for (var i in result)
										{
										output+="<tr><td>" + result[i].NAME + "</td> <td><button type='button' data-toggle='modal' data-target='#myModal2' id="+"'"+result[i].ID+"'"+">Select</button></td></tr>";
										}
										output+="</tbody></table>";
										
										displayResources.append(output);
										
										$("table").addClass("table table-striped");
										
										
 },
										error:function(result) {
											alert('error');
											}
											
										});
										/* $("#button1").click(function(){
											displayResources.append("");
                                         }); 
									
										
									}); */

							$(".quantity").keyup(function(){

                                var row = $(this).closest("tr");       
								var tds = row.find("td");
							    tds.eq(5).find('.tot_price').val(Number(tds.eq(4).text())*Number($(this).val()));
                            
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
										
										
										displayResources.html(output);

										
                                     },
										error:function(result) {
											alert('error');
											}



									});

								});

							/* $(document).on("click","tr td", function(e){
								
								 $("#sortbar").append(e.target.innerHTML+"</br>"); 
								alert("hello");
								}); */
							
								


					</script>
					<script>
						var c;
						$(document).on("change",".company",function(){
							         c=$(this).attr('id');
									 $("#current_company").val(Number(c));
									 //$("#box_pack_count").append('<input type="text" id="b_'+$("#current_company").val()+'" value="0">');
									 $("#index").val(0);
									  $.ajax({
										  type: "POST",
											  url: "<?php echo base_url('operator/add_customer/show_mso_packs_ala')?>",
											  data: { ID: $(this).val() },
											  success: function(result)
									   {
										//   result=JSON.parse(result);
										//   var output="";
										//   for (var i in result)
										//   {
										//    output+="<li>"+result[i].NAME + "</li>";
										//   }
										  
										  
										//   displayResource2.html(output);
											$(".data_cont").html(result);
										  
									   },
										  error:function(result) {
											  alert('error');
											  }
  
  
  
									  });
  
								  });

					$(document).on("click","#add_boxx",function(){
						var q=$("#q").val();
                        $("#q").val(Number(q)+1);

                       $("#new_box").append('<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account-box mr-10"></i>Box('+$("#q").val()+') details</h6>'+
						                                           '<hr class="light-grey-hr"/>'+
																   '<div class="col-md-4">'+
																	'<div class="form-group">'+
																		'<label class="control-label mb-10">STB No<span style="color:red">*<span></label>'+
																		'<input type="text" class="form-control" name="BOX_NO'+$("#q").val()+'" value="<?php echo set_value('BOX_NO'); ?>" placeholder="">'+
																	'</div>'+
																'</div>'+
																'<div class="col-md-4">'+
																	'<div class="form-group">'+
																		'<label class="control-label mb-10">VC No<span style="color:red">*<span></label>'+
																		'<input type="text" class="form-control" name="VC_NO'+$("#q").val()+'" value="<?php echo set_value('VC_NO'); ?>" placeholder="">'+
																	'</div>'+
																'</div>'+
																'<div class="col-md-4">'+
																	'<div class="form-group">'+
																		'<label class="control-label mb-10">Company</label>'+
																		'<select class="company form-control required comp_selection" id="'+$("#q").val()+'" name="COMP_ID'+$("#q").val()+'"  required>'+
																		'<OPTION>--Select Company--</option>'+
																						'<?php option_dif_where('companies','ID IN (select COMP_ID from mso where ID IN(select MSO_ID from operators_mso where OP_ID='.$_SESSION['dcn_id'].'))','ID','NAME');?>'+
																			
																		'</select>'+
																	'</div>'+
																'</div>'+
																
															'</div>'+
															
															'<div class="row">'+
															 '<div class="col-md-3">'+
																	'<div class="form-group">'+
																		'<label class="control-label mb-10">Box Type</label>'+
																		'<select class="form-control" name="BOX_TYPE'+$("#q").val()+'" tabindex="1">'+
																		'<?php option_dif_no_where('box_type','ID','BOX_TYPE');?>'+
																			
																		'</select>'+
																	'</div>'+
																'</div>'+
																'<div class="col-md-3">'+
																	'<div class="form-group">'+
																		'<label class="control-label mb-10">Warranty Type</label>'+
																		'<select class="form-control" name="WARRANTY_TYPE'+$("#q").val()+'" tabindex="1">'+
																			'<?php option_dif_no_where('box_warranty','ID','WARRANTY_TYPE');?>'+
																			
																		'</select>'+
																	'</div>'+
																'</div>'+
																
																'<input type="hidden" id="b_'+$("#q").val()+'" name="b_'+$("#q").val()+'" value="0">'+
																'</div>'+'<hr class="light-grey-hr"/>'+
																'<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account-box mr-10"></i>Package Details</h6>'+
																'<hr class="light-grey-hr"/>'+
															
															'<div class="row" id="pack_append'+$("#q").val()+'">'+
															'</div>'+
															'<hr class="light-grey-hr"/>'+
															'<div class="row" id="ala_append'+$("#q").val()+'">'+
															'</div>'
																
															
																
																);

					});			  



					
					
					</script>