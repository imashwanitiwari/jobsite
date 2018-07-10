<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<h5 class="txt-dark">Add Boxes</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="<?php echo site_url('dashboard')?>">Dashboard</a></li>
							
							<li class="active"><span>Boxes</span></li>
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
										<h6 class="panel-title txt-dark">Add Boxes</h6>
										
									</div>
									<div class="clearfix"></div>
								</div>
								<?php if($this->session->flashdata('add_box')):?>
									<div class="alert alert-dismissible alert-success">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>Well done!</strong> Box(es) Added Successfully.
									</div>
								<?php endif;?>
					
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
									<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account-box mr-10"></i>Box(1) details</h6>
									<hr class="light-grey-hr"/>
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<form class="form-horizontal" method="post" action="<?php echo site_url('operator/boxes/add_box_stock');?>">
													<input type="hidden" name="counter" id="counter" value="1">
														<div class="form-group">
															<label for="" class="col-sm-3 control-label">Box No</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" id="" name="BOX_NO1" placeholder="" required>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="" class="col-sm-3 control-label">VC No</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" id="" name="VC_NO1" placeholder="" required>
																</div>
															</div>
														</div>

														<div class="form-group">
															<label class="col-sm-3 control-label">Company</label>
															<div class="col-sm-9">
															<div class="input-group">
															<div class="input-group-addon"><i class="icon-user"></i></div>
															<select class=" form-control required " id=""  required>
															     <OPTION>--Select Company--</option>
															
																<?php option_dif_where('companies','ID IN (select COMP_ID from mso where ID IN(select MSO_ID from operators_mso where OP_ID='.$_SESSION['dcn_id'].'))','ID','NAME');?>
																
															</select>
															</div>
															</div>
														</div>
														<div class="form-group">
																<label class="col-sm-3 control-label" for="mso">Box Type:</label>
																<div class="col-sm-9">
																   <div class="input-group">
																         <div class="input-group-addon"><i class="icon-user"></i></div>
																          <select id="" class="form-control required" name="BOX_TYPE1">
																	        
																		  <?php option_dif_no_where('box_type','ID','BOX_TYPE');?><option value="1">Normal</option>
																		  
																          </select>
																	</div>  
																</div>	
														</div>
														<div class="form-group">
																<label class="col-sm-3 control-label" for="mso">Warranty Type:</label>
																<div class="col-sm-9">
																   <div class="input-group">
																         <div class="input-group-addon"><i class="icon-user"></i></div>
																          <select id="" class="form-control required" name="WARRANTY_TYPE1">
																	        
																		  <?php option_dif_no_where('box_warranty','ID','WARRANTY_TYPE');?> 
																          </select>
																	</div>  
																</div>	
														</div>
														<div id="append_box"></div>
														<div class="form-group mb-0">
															<div class="col-sm-offset-3 col-sm-9">
																<button type="submit" name="add_box" class="btn btn-info ">Submit</button>
																<button type="button" name="add_new_row" id="add_new_row" class="btn btn-info ">Add New Row</button>
															</div>
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

						<script>
						$("#add_new_row").on("click",function(){

						$("#counter").val(Number($("#counter").val())+1)	
                        var v=$("#counter").val();
                        $("#append_box").append( '<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account-box mr-10"></i>Box('+v+') details</h6>'+
							                           '<hr class="light-grey-hr"/>'+
							                             '<div class="form-group">'+
															'<label for="" class="col-sm-3 control-label">Box No</label>'+
															'<div class="col-sm-9">'+
																'<div class="input-group">'+
																	'<div class="input-group-addon"><i class="icon-user"></i></div>'+
																	'<input type="text" class="form-control" id="" name="BOX_NO'+v+'" placeholder="">'+
																'</div>'+
															'</div>'+
														'</div>'+
														'<div class="form-group">'+
															'<label for="" class="col-sm-3 control-label">VC No</label>'+
															'<div class="col-sm-9">'+
																'<div class="input-group">'+
																	'<div class="input-group-addon"><i class="icon-user"></i></div>'+
																	'<input type="text" class="form-control" id="" name="VC_NO'+v+'" placeholder="">'+
																'</div>'+
															'</div>'+
														'</div>'+

														'<div class="form-group">'+
															'<label class="col-sm-3 control-label">Company</label>'+
															'<div class="col-sm-9">'+
															'<div class="input-group">'+
															'<div class="input-group-addon"><i class="icon-user"></i></div>'+
															'<select class=" form-control required " id="" name="COMP_ID'+v+'" required>'+
															     '<OPTION>--Select Company--</option>'+
															
																'<?php option_dif_where('companies','ID IN (select COMP_ID from mso where ID IN(select MSO_ID from operators_mso where OP_ID='.$_SESSION['dcn_id'].'))','ID','NAME');?>'+
																
															'</select>'+
															'</div>'+
															'</div>'+
														'</div>'+
														'<div class="form-group">'+
																'<label class="col-sm-3 control-label" for="mso">Box Type:</label>'+
																'<div class="col-sm-9">'+
																   '<div class="input-group">'+
																         '<div class="input-group-addon"><i class="icon-user"></i></div>'+
																          '<select id="" class="form-control required" name="BOX_TYPE'+v+'">'+
																	        
																		  '<?php option_dif_no_where('box_type','ID','BOX_TYPE');?><option value="1">Normal</option>'+
																		  
																          '</select>'+
																	'</div>' + 
																'</div>'+
														'</div>'+
														'<div class="form-group">'+
																'<label class="col-sm-3 control-label" for="mso">Warranty Type:</label>'+
																'<div class="col-sm-9">'+
																  '<div class="input-group">'+
																         '<div class="input-group-addon"><i class="icon-user"></i></div>'+
																          '<select id="" class="form-control required" name="WARRANTY_TYPE'+v+'">'+
																	        
																		  '<?php option_dif_no_where('box_warranty','ID','WARRANTY_TYPE');?>' +
																          '</select>'+
																	'</div>' + 
																'</div>'	+
														'</div>');

						})
						
						
						</script>