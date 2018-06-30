      <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<h5 style="text-align:center" class="txt-dark"><?php echo "Welcome"." ".$_SESSION['name']; ?></h5>
						<h6 style="text-align:center" class="txt-dark"><?php if(isset($_SESSION['is_lco'])&&$_SESSION['is_lco']==true){echo "You are loged in as admin"; ?></h6>
						<div class="row">
					<div class="form-group">
							<label class="col-sm-4 control-label" for="mso">Select FIRM:</label>
							<div class="col-sm-8">
								<div class="input-group">
										<div class="input-group-addon"><i class="icon-user"></i></div>
										<select id="firm" class="form-control firm" name="firm">
										<option value="-1">-Select Firm-</option>
										<option value="0">ALL</option>	
										</select>
								</div>  
							</div>	
					</div>
					</div>	
						
							
						
						<?php }?>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="#">Dashboard</a></li>
							<!--<li><a href="#"><span>speciality pages</span></a></li>
							<li class="active"><span>blank page</span></li>-->
						</ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->
                
              <!-- Row -->
				<div class="row">
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                       <div class="panel panel-default card-view panel-refresh">
							<div class="refresh-container">
								<div class="la-anim-1"></div>
							</div>
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Visit by Traffic Types</h6>
								</div>
								<div class="pull-right">
									<a href="#" class="pull-left inline-block refresh mr-15">
										<i class="zmdi zmdi-replay"></i>
									</a>
									<div class="pull-left inline-block dropdown">
										<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="zmdi zmdi-more-vert"></i></a>
										<ul class="dropdown-menu bullet dropdown-menu-right"  role="menu">
											<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-reply" aria-hidden="true"></i>Devices</a></li>
											<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-share" aria-hidden="true"></i>General</a></li>
											<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-trash" aria-hidden="true"></i>Referral</a></li>
										</ul>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div>
										<canvas id="chart_6" height="191"></canvas>
									</div>	
									<hr class="light-grey-hr row mt-10 mb-15"/>
									<div class="label-chatrs">
										<div class="">
											<span class="clabels clabels-lg inline-block bg-blue mr-10 pull-left"></span>
											<span class="clabels-text font-12 inline-block txt-dark capitalize-font pull-left"><span class="block font-15 weight-500 mb-5">44.46% organic</span><span class="block txt-grey">356 visits</span></span>
											<div id="sparkline_1" class="pull-right" style="width: 100px; overflow: hidden; margin: 0px auto;"></div>
											<div class="clearfix"></div>
										</div>
									</div>
									<hr class="light-grey-hr row mt-10 mb-15"/>
									<div class="label-chatrs">
										<div class="">
											<span class="clabels clabels-lg inline-block bg-green mr-10 pull-left"></span>
											<span class="clabels-text font-12 inline-block txt-dark capitalize-font pull-left"><span class="block font-15 weight-500 mb-5">5.54% Refrral</span><span class="block txt-grey">36 visits</span></span>
											<div id="sparkline_2" class="pull-right" style="width: 100px; overflow: hidden; margin: 0px auto;"></div>
											<div class="clearfix"></div>
										</div>
									</div>
									<hr class="light-grey-hr row mt-10 mb-15"/>
									<div class="label-chatrs">
										<div class="">
											<span class="clabels clabels-lg inline-block bg-yellow mr-10 pull-left"></span>
											<span class="clabels-text font-12 inline-block txt-dark capitalize-font pull-left"><span class="block font-15 weight-500 mb-5">50% Other</span><span class="block txt-grey">245 visits</span></span>
											<div id="sparkline_3" class="pull-right" style="width: 100px; overflow: hidden; margin: 0px auto;"></div>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>	
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view">
							<div class="panel-wrapper collapse in">
                                <div class="panel-body sm-data-box-1">
									<span class="uppercase-font weight-500 font-14 block text-center txt-dark">customer satisfaction</span>	
									<div class="cus-sat-stat weight-500 txt-success text-center mt-5">
										<span class="counter-anim">93.13</span><span>%</span>
									</div>
									<div class="progress-anim mt-20">
										<div class="progress">
											<div class="progress-bar progress-bar-success wow animated progress-animated" role="progressbar" aria-valuenow="93.12" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
									<ul class="flex-stat mt-5">
										<li>
											<span class="block">Previous</span>
											<span class="block txt-dark weight-500 font-15">79.82</span>
										</li>
										<li>
											<span class="block">% Change</span>
											<span class="block txt-dark weight-500 font-15">+14.29</span>
										</li>
										<li>
											<span class="block">Trend</span>
											<span class="block">
												<i class="zmdi zmdi-trending-up txt-success font-20"></i>
											</span>
										</li>
									</ul>
								</div>
                            </div>
                        </div>
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">browser stats</h6>
								</div>
								<div class="pull-right">
									<a href="#" class="pull-left inline-block mr-15">
										<i class="zmdi zmdi-download"></i>
									</a>
									<a href="#" class="pull-left inline-block close-panel" data-effect="fadeOut">
										<i class="zmdi zmdi-close"></i>
									</a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div>
										<span class="pull-left inline-block capitalize-font txt-dark">
											google chrome
										</span>
										<span class="label label-warning pull-right">50%</span>
										<div class="clearfix"></div>
										<hr class="light-grey-hr row mt-10 mb-10"/>
										<span class="pull-left inline-block capitalize-font txt-dark">
											mozila firefox
										</span>
										<span class="label label-danger pull-right">10%</span>
										<div class="clearfix"></div>
										<hr class="light-grey-hr row mt-10 mb-10"/>
										<span class="pull-left inline-block capitalize-font txt-dark">
											Internet explorer
										</span>
										<span class="label label-success pull-right">30%</span>
										<div class="clearfix"></div>
										<hr class="light-grey-hr row mt-10 mb-10"/>
										<span class="pull-left inline-block capitalize-font txt-dark">
											safari
										</span>
										<span class="label label-primary pull-right">10%</span>
										<div class="clearfix"></div>
									</div>
								</div>	
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">user statistics</h6>
								</div>
								<div class="pull-right">
									<span class="no-margin-switcher">
										<input type="checkbox" id="morris_switch"  class="js-switch" data-color="#ea6c41" data-secondary-color="#177ec1" data-size="small"/>	
									</span>	
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
                                <div class="panel-body">
									<div id="morris_extra_line_chart" class="morris-chart" style="height:293px;"></div>
									<ul class="flex-stat mt-40">
										<li>
											<span class="block">Weekly Users</span>
											<span class="block txt-dark weight-500 font-18"><span class="counter-anim">3,24,222</span></span>
										</li>
										<li>
											<span class="block">Monthly Users</span>
											<span class="block txt-dark weight-500 font-18"><span class="counter-anim">1,23,432</span></span>
										</li>
										<li>
											<span class="block">Trend</span>
											<span class="block">
												<i class="zmdi zmdi-trending-up txt-success font-24"></i>
											</span>
										</li>
									</ul>
								</div>
							</div>
                        </div>
                    </div>
				</div>
				<!-- /Row -->
				
				<!-- Row -->
				<div class="row">
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-red">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<span class="txt-light block counter"><span id="no_of_con"></span></span>
													<span class="weight-500 uppercase-font txt-light block font-13">Total Connections</span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
												<span class="txt-light block counter"><span id="active_con"></span></span>
												<span class="weight-500 uppercase-font txt-light block font-13">Active</span>
												<span class="txt-light block counter"><span id="inactive_con"></span></span>
												<span class="weight-500 uppercase-font txt-light block font-13">Inactive</span>
												</div>
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-yellow">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<span class="txt-light block counter"><span id="box_count"></span></span>
													<span class="weight-500 uppercase-font txt-light block">Boxes</span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
												<span class="txt-light block counter"><span id="active_box"></span></span>
												<span class="weight-500 uppercase-font txt-light block font-13">Active</span>
												<span class="txt-light block counter"><span id="inactive_box"></span></span>
												<span class="weight-500 uppercase-font txt-light block font-13">Inactive</span>	
												</div>
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-green">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<span class="txt-light block counter"><span id="complain_count"></span></span>
													<span class="weight-500 uppercase-font txt-light block">Complaints</span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
												<span class="txt-light block counter"><span id="resolved_comp"></span></span>
												<span class="weight-500 uppercase-font txt-light block font-13">Resolved</span>
												<span class="txt-light block counter"><span id="pending_comp"></span></span>
												<span class="weight-500 uppercase-font txt-light block font-13">Pending</span>
													
												</div>
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-blue">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<span class="txt-light block counter"><span id="dues"></span></span>
													<span class="weight-500 uppercase-font txt-light block">Dues</span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 pt-25  data-wrap-right">
												<span class="txt-light block counter"><span id="total"></span></span>
												<span class="weight-500 uppercase-font txt-light block font-13">Total</span>
												</div>
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Row -->
				
				<!-- Row -->
				<div class="row">
					<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12">
						<div class="panel panel-default card-view panel-refresh">
							<div class="refresh-container">
								<div class="la-anim-1"></div>
							</div>
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">social campaigns</h6>
								</div>
								<div class="pull-right">
									<a href="#" class="pull-left inline-block refresh mr-15">
										<i class="zmdi zmdi-replay"></i>
									</a>
									<a href="#" class="pull-left inline-block full-screen mr-15">
										<i class="zmdi zmdi-fullscreen"></i>
									</a>
									<div class="pull-left inline-block dropdown">
										<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="zmdi zmdi-more-vert"></i></a>
										<ul class="dropdown-menu bullet dropdown-menu-right"  role="menu">
											<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-reply" aria-hidden="true"></i>Edit</a></li>
											<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-share" aria-hidden="true"></i>Delete</a></li>
											<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-trash" aria-hidden="true"></i>New</a></li>
										</ul>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body row pa-0">
									<div class="table-wrap">
										<div class="table-responsive">
											<table class="table table-hover mb-0">
												<thead>
													<tr>
														<th>Campaign</th>
														<th>Client</th>
														<th>Changes</th>
														<th>Budget</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><span class="txt-dark weight-500">Facebook</span></td>
														<td>Beavis</td>
														<td><span class="txt-success"><i class="zmdi zmdi-caret-up mr-10 font-20"></i><span>2.43%</span></span></td>
														<td>
															<span class="txt-dark weight-500">$1478</span>
														</td>
														<td>
															<span class="label label-primary">Active</span>
														</td>
													</tr>
													<tr>
														<td><span class="txt-dark weight-500">Youtube</span></td>
														<td>Felix</td>
														<td><span class="txt-success"><i class="zmdi zmdi-caret-up mr-10 font-20"></i><span>1.43%</span></span></td>
														<td>
															<span class="txt-dark weight-500">$951</span>
														</td>
														<td>
															<span class="label label-danger">Closed</span>
														</td>
													</tr>
													<tr>
														<td><span class="txt-dark weight-500">Twitter</span></td>
														<td>Cannibus</td>
														<td><span class="txt-danger"><i class="zmdi zmdi-caret-down mr-10 font-20"></i><span>-8.43%</span></span></td>
														<td>
															<span class="txt-dark weight-500">$632</span>
														</td>
														<td>
															<span class="label label-default">Hold</span>
														</td>
													</tr>
													<tr>
														<td><span class="txt-dark weight-500">Spotify</span></td>
														<td>Neosoft</td>
														<td><span class="txt-success"><i class="zmdi zmdi-caret-up mr-10 font-20"></i><span>7.43%</span></span></td>
														<td>
															<span class="txt-dark weight-500">$325</span>
														</td>
														<td>
															<span class="label label-default">Hold</span>
														</td>
													</tr>
													<tr>
														<td><span class="txt-dark weight-500">Instagram</span></td>
														<td>Hencework</td>
														<td><span class="txt-success"><i class="zmdi zmdi-caret-up mr-10 font-20"></i><span>9.43%</span></span></td>
														<td>
															<span class="txt-dark weight-500">$258</span>
														</td>
														<td>
															<span class="label label-primary">Active</span>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>	
								</div>	
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-5 col-sm-12 col-xs-12">
						<div class="panel panel-default card-view panel-refresh">
							<div class="refresh-container">
								<div class="la-anim-1"></div>
							</div>
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Advertising & Promotions</h6>
								</div>
								<div class="pull-right">
									<a href="#" class="pull-left inline-block refresh mr-15">
										<i class="zmdi zmdi-replay"></i>
									</a>
									<div class="pull-left inline-block dropdown">
										<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="zmdi zmdi-more-vert"></i></a>
										<ul class="dropdown-menu bullet dropdown-menu-right"  role="menu">
											<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-reply" aria-hidden="true"></i>option 1</a></li>
											<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-share" aria-hidden="true"></i>option 2</a></li>
											<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-trash" aria-hidden="true"></i>option 3</a></li>
										</ul>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div>
										<canvas id="chart_2" height="253"></canvas>
									</div>	
									<div class="label-chatrs mt-30">
										<div class="inline-block mr-15">
											<span class="clabels inline-block bg-yellow mr-5"></span>
											<span class="clabels-text font-12 inline-block txt-dark capitalize-font">Active</span>
										</div>
										<div class="inline-block mr-15">
											<span class="clabels inline-block bg-red mr-5"></span>
											<span class="clabels-text font-12 inline-block txt-dark capitalize-font">Closed</span>
										</div>	
										<div class="inline-block">
											<span class="clabels inline-block bg-green mr-5"></span>
											<span class="clabels-text font-12 inline-block txt-dark capitalize-font">Hold</span>
										</div>											
									</div>
								</div>
							</div>	
						</div>	
					</div>	
				</div>	
				<!-- Row -->
				
			
					
				
				<script>
				
				$(document).ready(function(){

					$.ajax({

							"type":"post",
							"url":"./dashboard/get_dashboard",
							"dataType":"json",
							"success":function(result){
								
								$("#no_of_con").html(result[0]['TOTAL_CONNECTIONS']);
								$("#active_con").html(result[1]['TOTAL_ACTIVE']);
								$("#inactive_con").html(result[2]['TOTAL_INACTIVE']);
								$("#box_count").html(result[3]['BOX_COUNT']);
								$("#active_box").html(result[4]['ACTIVE_BOX']);
								$("#complain_count").html(result[5]['COMPLAINS']);
                                $("#resolved_comp").html(result[6]['RES_COMPLAINS']);
								$("#pending_comp").html(result[7]['PEND_COMPLAINS']);
                            },

							"error":function(result){
								alert('error');
							}

					});

					

                <?php if(isset($_SESSION['lco_id'])){?>
			 	$.ajax({
				"type":"post",
				"dataType":"json",
				"url":"./operator/firms/get_firms",
				"data":{"LCO_ID":<?php echo $_SESSION['lco_id'];?>},
				"success":function(result){

					//alert(result.length);

                 for(var x=0;x<result.length;x++){

                    $("#firm").append('<option value="'+result[x]['ID']+'">'+result[x]['FIRM_NAME']+'</option>');

				 }
                 


				 }


				}); 
			  
               
				
			   
                
				$(document).on("change",".firm",function(){


                $.ajax({

                     "type":"post",
					  "url":"http://localhost/dcntv-app/operator/firms/change_session",
					  "data":{"DCN_ID":$(this).val()},
					  "success":function(){

						location.reload();
                   
					  },
					  "error":function(result){

						alert('Some Error Occured');
						
					  }

				});
 

				});

             <?php }?>



				});
				
				
				</script>