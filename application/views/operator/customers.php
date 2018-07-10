<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<h5 class="txt-dark">Customers List</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="<?php echo site_url('dashboard')?>">Dashboard</a></li>
							
							<li class="active"><span>Customers</span></li>
						</ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
                <!-- /Title -->
				<div class="table-responsive">
					<table class="table table-bordered display" id="customer" style="width:100%">
						<thead>
							<tr>
								<th>Subs No</th>
								<th>Name</th>
								<th>Area</th>
								<th>Primary VC</th>
								<th>Boxes</th>
								<th>Due Date</th>
								<th>Status</th>
								<th>Rent</th>
								<th>Tools</th>
							</tr>
						</thead>
						<tbody></tbody>
						<tfoot>
						<tr>
								<th>Subs No</th>
								<th>Name</th>
								<th>Area</th>
								<th>Primary VC</th>
								<th>Boxes</th>
								<th>Due Date</th>
								<th>Status</th>
								<th>Rent</th>
								<th>Tools</th>
							</tr>
						</tfoot>
				
					</table>
				</div>
            
			<!-- <style>
	div.reder {
	position:absolute;
	height:auto;
	max-height:100px;
	width:100px;
	background:rgba(250,250,250,1)
}
li.reder {
	text-decoration:none;
	list-style:none;
	display:none;
	width:100px;
	padding:5px;
}
li.reder :hover {
	color:white;
	background:black;
	width:50px;
}
</style> -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
											<div class="modal-dialog" role="document">
												
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															<h5 class="modal-title" id="exampleModalLabel1">Pay</h5>
														</div>


														<div class="modal-body">
														<div class="row">
																	<div class="col-md-4">
																		<div class="form-group">
																			<label class="control-label mb-10"></label>
																			<input type="text" placeholder="SUBSCRIPTION NO." id="SUBSCRIBER_INP" class="form-control" name="FIRST_NAME">
																			<input type="hidden" id="SUBSCRIBER_ID">
																		</div>
																	</div>
																	<div class="col-md-4">
																		<div class="form-group">
																			<label class="control-label mb-10"></label>
																			<!-- calling row select helper -->
																			
																			<button id="SUBSCRIBER_BTN" class="btn btn-success">Change Subscriber</button>
																			
																		</div>
																		<input type="hidden" id="OP_ID" value="<?php echo $_SESSION['dcn_id']?>">
																		<input type="hidden" id="ACCOUNT_ID" value="">
																		<input type="hidden" id="AREA_ID" value="">
																	</div>
																	</DIV>
																
														<div class="row">
														
														<!-- <input type="text" id="SUBSCRIBER_INP" placehoder="Subscriber No.">  -->

														<!--/span-->
																
																</div>
														<div class="row">
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Customer Name<span style="color:red">*<span></label>
																		<input type="text" id="CURTOMER_NAME" class="form-control" disabled name="FIRST_NAME" value="<?php echo set_value('FIRST_NAME'); ?>" placeholder="First Name">
																		 
																	</div>
																</div>
																<!--/span-->
																
															
															<div class="col-md-6">
															<div class="form-group">
															<label class="control-label mb-10">Date</label>
															<div class='input-group date' id='datetime1'>
															   
																<input type='text' class="form-control" name="ACTIVATION_DATE" id="ACTIVATION_DATE"/>
																<span class="input-group-addon">
																	<span class="fa fa-calendar"></span>
																</span>
															</div>
															</div>
														</div>
																
																</div>
																<?php 
																/**
																 * $data=select_where_row("payments","SUBSCRIBER_ID=1","sum(AMOUNT) as TOPAY");
																	
																			
																	*		if($data[0]['TOPAY']<0)
																	*		{
																	*			$pre='(BAL)'.$data[0]['TOPAY']*-1;
																	*			$topay=$data[0]['TOPAY']*-1;
																	*		}
																	*		else
																	*		{
																	*			$pre='(ADV)'.$data[0]['TOPAY'];
																	*			$topay=0;
																	*		}
																	*/	?>
																<!--/span-->
																<div class="row">
																	<div class="col-md-4">
																		<div class="form-group">
																			<label class="control-label mb-10"><b>To Pay</b><span style="color:red">*<span></label>
																			<input type="text" id="TO_PAY" disabled class="form-control" name="FIRST_NAME">
																			<input type="hidden" id="SUBSCRIBER_ID">
																		</div>
																	</div>
																	<div class="col-md-4">
																		<div class="form-group">
																			<label class="control-label mb-10"></b>Pre Balance</b><span style="color:red">*<span></label>
																			<!-- calling row select helper -->
																			
																			<th><input type="text" id="PRE_BALANCE" disabled class="form-control" name="FIRST_NAME"></th>
																			
																		</div>
																	</div>
																	<div class="col-md-4">
																		<div class="form-group">
																			<label class="control-label mb-10"><b>Paying</b><span style="color:red">*<span></label>
																			<input type="text" style="color:red" id="PAYING" class="form-control" name="FIRST_NAME">
																			
																		</div>
																</div>
																
																<!--/span-->
															</div>
															<!--/span-->
															<div class="row">
																<!--/span-->
																<div class="col-md-4">
																	<div class="form-group">
																		<label class="control-label mb-10">Post Balance<span style="color:red">*<span></label>
																		<input type="text" id="POST_BALANCE" disabled class="form-control" name="FIRST_NAME">
																		 
																	</div>
																</div>

																<div class="col-md-4">
																	<div class="form-group">
																		<label class="control-label mb-10">Select Lineman<span style="color:red">*<span></label>
																		<select type="text" id="STAFF_ID" class="form-control" name="STAFF_ID">
																		<?php 
                                                                            $array = array('OP_ID' => $this->session->userdata('dcn_id'),'TYPE'=>1 );
                                                                            option_dif_where('staff',$array,'ID','F_NAME');
                                                                            ?>
																		 </SELECT>
																	</div>
																</div>

																<div class="col-md-4">
																	<div class="form-group">
																		<label class="control-label mb-10">Pay Mode<span style="color:red">*<span></label>
																		<select type="text" id="PAY_MODE" class="form-control" name="">
																		 	<?= option_dif('payment_mode','ID','NAME')?>
																		 </SELECT>
																	</div>
																</div>
																
															</div>
															
															
															<div class="row">
																<!--/span-->
																<div class="col-md-9">
																	<div class="form-group">
																		<label class="control-label mb-10">Remark</label>
																		<input type="text" id="REMARK" class="form-control" name="FIRST_NAME">
																		 
																	</div>
																</div>
															</div>
															


													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														<button type="submit" class="btn btn-primary" ID="PAY">Pay</button>
													</div>
                                                   
												</div>
											</div>
										</div>
                        </form>
				
			</div>
			
		
		
			
			<script>
			
			$(function () {
                $('#datetime1').datetimepicker({
					
					defaultDate: new Date(),
					format:'YYYY-MM-DD HH:mm:ss',
					
					
					
				});
            });
			
			</script>
