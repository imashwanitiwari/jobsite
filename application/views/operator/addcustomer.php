
<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<h5 class="txt-dark"><?php echo strtoupper($_SESSION['name'])." "."Welcome to Add Customer page";?></h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="index-2.html">Dashboard</a></li>
							<li><a href="#"><span>Cable TV Users</span></a></li>
							<li class="active"><span>Add Customer</span></li>
						</ol>
					</div>
					<!-- /Breadcrumb -->
					</div>
                  <!-- /Title -->
                    <div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Add Customer</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<form id="example-advanced-form" method="post" action="<?php echo site_url('operator/add_customer/add_cust');?>">
											
										 	<h3><span class="number"><i class="icon-bag txt-black"></i></span><span class="head-font capitalize-font">Basic Details</span></h3>
											<fieldset>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-wrap">
															<div class="form-group">
																<label class="control-label mb-10" for="exampleCountry">country:</label>
																<select id="exampleCountry" class="form-control required" name="country">
																	<option value="India">India</option>
																	<option value="Australia">Australia</option>
																	<option value="USA">USA</option>
																	<option value="Japan">Japan</option>
																</select>
															</div>
															<div class="form-group">
																<div class="row">
																	<div class="col-md-6 col-xs-12">
																		<label class="control-label mb-10" for="firstName">first name:</label>
																		<input id="firstName" type="text" name="first_name" class="form-control required" value="" />
																	</div>
																	<div class="span1"></div>
																	<div class="col-md-6 col-xs-12">
																		<label class="control-label mb-10" for="lastName">last name:</label>
																		<input id="lastName" type="text" name="last_name" class="form-control" value="" />
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label mb-10" for="houseno">House No:</label>
																<input id="houseno"  type="text" name="house" class="form-control " value="" />
															</div>
															<div class="form-group">
																<label class="control-label mb-10" for="addressDetail">Address:</label>
																<input id="addressDetail"  type="text" name="address" class="form-control required" value="" />
															</div>
															<div class="form-group">
																<label class="control-label mb-10" for="stateName">state:</label>
																<select id="stateName" class="form-control required" name="state">
																	<option value="Karnataka">Karnataka</option>
																	<option value="Maharashtra">Maharashtra</option>
																</select>
															</div>
															<div class="form-group">
																<label class="control-label mb-10" for="cityName">city:</label>
																<select id="cityName" class="form-control required" name="city">
																	<option value="Banglore">Banglore</option>
																	<option value="Pune">Pune</option>
																</select>
															</div>
															
															<div class="form-group">
																<label class="control-label mb-10" for="postalCode">zip/postal code:</label>
																<input id="postalCode" type="text" name="zip_code"  data-mask="99999-9999" class="form-control required" value="" />
															</div>
															<div class="form-group">
																<label class="control-label mb-10" for="Mobile">Mobile:</label>
																<input type="text" id="Mobile"  data-mask="+40 999 999 999" name="mobile_number" class="form-control required" maxlength="11" value="" onkeypress="return isNumber(event)" />
															</div>
															<div class="form-group">
																<label class="control-label mb-10" for="altPhoneNumber">Alternate number:</label>
																<input type="text" id="altPhoneNumber"  data-mask="+40 999 999 999" name="alt_number" class="form-control " value="" maxlength="11" value="" onkeypress="return isNumber(event)"/>
															</div>
															<div class="form-group">
																<label class="control-label mb-10" for="phoneNumber">Phone number:</label>
																<input type="text" id="phoneNumber"  data-mask="+40 999 999 999" name="phone_number" class="form-control" value="" maxlength="11" value="" onkeypress="return isNumber(event)"/>
															</div>
															<div class="form-group">
																<label class="control-label mb-10" for="emailAddress">email address:</label>
																<input id="emailAddress" type="email" name="email_address" class="form-control " value="" />
															</div>
															<div class="form-group">
																<label class="control-label mb-10" for="username">User Name:</label>
																<input id="username"  type="text" name="username" class="form-control " value="" />
															</div>
															<div class="form-group">
													           <label class="control-label mb-10 text-left">Password</label>
													           <input type="password" name="password" class="form-control" value="">
												            </div>
														</div>
													</div>
												</div>
											</fieldset>
										    
											<h3><span class="number"><i class="icon-credit-card txt-black"></i></span><span class="head-font capitalize-font">Other Details</span></h3>
												<fieldset>
												<!--CREDIT CART PAYMENT-->
												<div class="row">
													<div class="col-sm-12">
													    <div class="form-group">
															<label class="control-label mb-10" for="area">Area:</label>
															<select id="area" name="area" class="form-control required">
																<?php foreach ($area_names as $item):?>
																<option value="<?php echo $item['NAME'];?>"><?php echo $item['NAME'];?></option>
															  <?php endforeach;?> 
															
															</select>
														</div>
														
														<div class="form-group">
														
														
															<label class="control-label mb-10" for="mso">Select MSO:</label>
															<select id="mso" name="mso" class="form-control required">
															 
															 <?php foreach ($list_item as $item):?>
																<option value="<?php echo $item['FIRM_NAME'];?>"><?php echo $item['FIRM_NAME'];?></option>
															  <?php endforeach;?>  
															</select>
														</div>
														
														<div class="form-group">
															<label class="control-label mb-10" for="panNo">PAN Number:</label>
															<input type="text" id="panNo" data-mask="9999-9999-9999-9999" class="form-control required" name="pan_number" value="" />
														</div>
														<div class="form-group">
															<label class="control-label mb-10" for="AdhardNo">ADHAR Number:</label>
															<input type="text" id="AdhardNo" data-mask="9999-9999-9999-9999" class="form-control required" name="adhar_number" value="" onkeypress="return isNumber(event)" />
														</div>
														<div class="form-group">
															<label class="control-label mb-10" for="GSTNo">GST Number:</label>
															<input type="text" id="GSTNo" data-mask="9999-9999-9999-9999" class="form-control required" name="gst_number" value="" />
														</div>
														
														
														
													</div>
												</div>
												<!--CREDIT CART PAYMENT END-->
											</fieldset>
										     <h3><span class="number"><i class="icon-user-following txt-black"></i></span><span class="head-font capitalize-font">SetTop Box(es)</span></h3>
											<fieldset>
												<div class="row">
													<div class="col-sm-6">
														<div class="form-wrap">
														    <div class="form-group">
															<label class="control-label mb-10" for="vcNo">VC Number:</label>
															<input type="text" id="vcNo" data-mask="9999-9999-9999-9999" class="form-control required" name="vc_number" value="" />
														    </div>
														
															<div class="form-group">
															<label class="control-label mb-10" for="stbNo">STB Number:</label>
															<input type="text" id="stbNo" data-mask="9999-9999-9999-9999" class="form-control required" name="stb_number" value="" />
														    </div>
															
															<div class="form-group">
															<label class="control-label mb-10" for="discount">Discount:</label>
															<input type="text" id="discount" data-mask="9999-9999-9999-9999" class="form-control " name="discount" value="" />
														    </div>
															
															<div class="form-group">
															<label class="control-label mb-10" for="warrantyType">Warranty Type:</label>
															<select id="warrantyType" name="warrantyType" class="form-control required">
																<option value="1 year">1 year</option>
																<option value="2 yaer">2 yaer</option>
															
															</select>
														    </div>
														    <div class="form-group">
															<label class="control-label mb-10" for="boxType">Box Type:</label>
															<select id="boxType" name="boxType" class="form-control required">
																<option value="Normal">Normal</option>
																<option value="HD">HD</option>
															
															</select>
														    </div>
														    <div class="form-group">
															<label class="control-label mb-10" for="about">About:</label>
															<input type="text" id="about" data-mask="9999-9999-9999-9999" class="form-control" name="about" value="" />
														    </div>
														</div>
													</div>
												</div>
											</fieldset>
											<h3><span class="number"><i class="icon-basket-loaded txt-black"></i></span><span class="head-font capitalize-font">Package Details</span></h3>
											<fieldset>
											    <div class="row">
													<div class="col-sm-6">
													    
														<div class="form-wrap">
														   
														   <div class="form-group">
															  <label class="control-label mb-10" for="package">Package:</label>
															   <select id="package" name="package" class="form-control required">
																   <?php foreach ($pack_names as $item):?>
																<option value="<?php echo $item['NAME'];?>"><?php echo $item['NAME']."-".$item['MRP'];?></option>
															  <?php endforeach;?>
															
															    </select>
														    </div>
														    <div class="form-group">
															  <label class="control-label mb-10" for="ala_amount">ALA-Carte Amount:</label>
															  <input type="text" id="ala_amount" data-mask="9999-9999-9999-9999" class="form-control required" name="ala_amount" value="" />
														    </div>
														
														    <div class="form-group">
															  <label class="control-label mb-10" for="prim_amount">Primary Amount:</label>
															  <input type="text" id="prim_amount" data-mask="9999-9999-9999-9999" class="form-control required" name="prim_amount" value="" />
														    </div>
														    <div class="form-group">
															  <label class="control-label mb-10" for="ala_channels">Select ALA Channels:</label>
															   <select id="ala_channels" name="ala_channels" class="form-control required">
																   <option value="Normal">Normal</option>
																   <option value="HD">HD</option>
															
															    </select>
														    </div>
														
														    <div class="form-group">
															  <label class="control-label mb-10" for="CreditCardType">Billing Date:</label>
															   <select id="CreditCardType" name="billing_date" class="form-control required">
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
															
															<div class="form-group">
															   <label class="control-label mb-10 text-left">Joining Date:</label>
															   <div class='input-group date' id='datetimepicker1'>
																  <input type='text' class="form-control" name="joining_date"/>
																  <span class="input-group-addon">
																  <span class="fa fa-calendar"></span>
																  </span>
															    </div>
														    </div>
														
														
														
														</div>
														
														
													
													</div>
													
                                                </div>															
											</fieldset>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->
					
					
					
					
				