<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<h5 class="txt-dark">Complaints</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="<?php echo site_url('dashboard')?>">Dashboard</a></li>
							
							<li class="active"><span>Complaints</span></li>
						</ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
                <!-- /Title -->
                <div class="row">
						<div class="col-md-6">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Add Complaint</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<?php if($this->session->flashdata('add_complain')):?>
									<div class="alert alert-dismissible alert-success">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>Well done!</strong> This complaint Has Been Registered Successfully.
									</div>
									<?php endif;?>
					
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													
														<div class="form-group">
															<label for="ISSUE_ID" class="col-sm-3 control-label">Select Issue*</label>
															   <div class="col-sm-9">
																   <div class="input-group">
																         <div class="input-group-addon"><i class="icon-user"></i></div>
																          <select id="ISSUE_ID" class="form-control required" name="ISSUE_ID">
																		   <option value="null">--select--</option>
																	        <?php option_dif('issue','ID','NAME');?>
																          </select>
																	</div>  
																</div>
														</div>
														<div class="form-group">
															<label for="SUB_ISSUE_ID" class="col-sm-3 control-label">Select Sub Issue</label>
															<div class="col-sm-9">
																   <div class="input-group">
																         <div class="input-group-addon"><i class="icon-user"></i></div>
																          <select id="SUB_ISSUE_ID" class="form-control required" name="SUB_ISSUE_ID">
																	       
																          </select>
																	</div>  
																</div>
														</div>
														<div class="form-group">
																<label class="col-sm-3 control-label" for="PROBLEM">Problem:</label>
																<div class="col-sm-9">
																	<div class="input-group">
																		<div class="input-group-addon"><i class="icon-user"></i></div>
																		<input type="text" class="form-control" id="PROBLEM" name="PROBLEM" placeholder="">
																	</div>
															   </div>	
														</div>
														<div class="form-group">
																<label class="col-sm-3 control-label" for="mso">Title:</label>
																<div class="col-sm-9">
																	<div class="input-group">
																		<div class="input-group-addon"><i class="icon-user"></i></div>
																		<input type="text" class="form-control" id="TITLE" name="TITLE" placeholder="">
																	</div>
															   </div>	
														</div>
														<div class="form-group">
															<label class="col-sm-3 control-label mb-10 text-left">Registration Date</label>
															<div class="col-sm-9">
															   <div class='input-group date' id='datetime'>
																		<span class="input-group-addon">
																			<span class="fa fa-calendar"></span>
																		</span>
																		<input type='text' class="form-control" name="REG_DATE" id="REG_DATE"/>
																
															    </div>
															</div>
														</div>
														<div class="form-group">
																<label class="col-sm-3 control-label" for="PRIORITY">Select Priority:</label>
																<div class="col-sm-9">
																	<div class="input-group">
																		<div class="input-group-addon"><i class="icon-user"></i></div>
																		<input type="range" name="PRIORITY" id="PRIORITY" min="0" max="100">
																		
																	</div>
															   </div>
														</div>
														<input type='hidden' class="form-control" name="api_key" id="api_key" value="1234"/>
														<input type='hidden' class="form-control" name="VICTIM_ID" id="VICTIM_ID" value="<?php echo $_GET['SUBSCRIBER_ID']?>"/>
														<input type='hidden' class="form-control" name="OP_ID" id="OP_ID" value="<?php echo $_SESSION['dcn_id']?>"/>
														<div class="form-group mb-0">
															<div class="col-sm-offset-3 col-sm-9">
																<button type="submit" name="add_complaint" id="add_complaint" class="btn btn-info ">Submit</button>
															</div>
														</div>
													
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>	
						</div>
            </div>
           
			
			<script>
			
			$(function () {
                $('#datetime').datetimepicker({
					
					defaultDate: new Date(),
					format:'YYYY-MM-DD HH:mm:ss',
					
					
					
				});
            });
			
			</script>
   <script>
			$(document).on("change","#ISSUE_ID",function(){
				//alert();
                                      
									  var displayResources = $('#SUB_ISSUE_ID');
									  
									  $.ajax({type: "POST",
											  url: "./complaints/show_sub_issue",
											  data: { ID: $("#ISSUE_ID").val() },
											  success: function(result)
									   {
									
										  displayResources.html(result);
  
										  
									   },
										  error:function(result) {
											  alert('error');
											  }
  
  
  
									  });
  
								  });
								  </script>
<script>


           $( document ).ready(function() {
                     $(document).on("click","#add_complaint",function(){
				      //alert();
					 
									  $.ajax({
										  
										type: "POST",
										     dataType:"JSON",
											  url: "../api/complaint/register_complaint",
											  data: { ISSUE_ID: $("#ISSUE_ID").val(),SUB_ISSUE_ID:$("#SUB_ISSUE_ID").val(),PROBLEM:$("#PROBLEM").val(),REG_DATE:$("#REG_DATE").val(),VICTIM_ID:$("#VICTIM_ID").val(),PRIORITY:$("#PRIORITY").val(),TITLE:$("#TITLE").val(),api_key:$("#api_key").val(),OP_ID:$("#OP_ID").val() },
								 success: function(result)
									   {
										  if (result['status']==1)
										  {
											swal("wel done","Complaint Added Successfully!","success");
											
										  }
										 
                                          else{

												if(result['errors'][0]==100){

                                               	 swal("Authentication Failed!");
													
												}
												if(result['errors'][0]==101){

                                                  swal("Some Mandatory Field Not Recieved!");

												}
                                                if(result['errors'][0]==103){

													swal("Some Extra Field Has Been Sent!");

												}


										    }
										  
									   },
										  error:function(result) {
											  alert('error');
											  }
  
 
  
									  });
  
								 

							  }); 
							
							}); 
</script>
									  
