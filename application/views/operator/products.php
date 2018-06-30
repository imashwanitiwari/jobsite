<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Main Content -->
<div class="page-wrapper">
            <div class="container-fluid">
			<?php if($this->session->flashdata('edit_product')):?>
									<div class="alert alert-dismissible alert-success">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>Well done!</strong> Product Edited Successfuly.
									</div>
									<?php endif;?>
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<h5 class="txt-dark">Add Product</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="<?php echo site_url('dashboard')?>">Dashboard</a></li>
							
							<li class="active"><span>Products</span></li>
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
										<h6 class="panel-title txt-dark">Add Product</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<?php if($this->session->flashdata('add_product')):?>
									<div class="alert alert-dismissible alert-success">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>Well done!</strong> This Product Has Been Added Successfully.
									</div>
									<?php endif;?>
					
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<form class="form-horizontal" method="post" action="<?php echo site_url('operator/products/add_product');?>">
														<div class="form-group">
															<label for="p_name" class="col-sm-3 control-label">Product Name*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" id="p_name" name="NAME" placeholder="Product Name" required>
																</div>
															</div>
														</div>
                                                        <div class="form-group">
																<label class="col-sm-3 control-label" for="unit">Unit:</label>
																<div class="col-sm-9">
																   <div class="input-group">
																         <div class="input-group-addon"><i class="icon-user"></i></div>
																          <select id="unit" class="form-control required" name="UNIT">
																	        
																            <option value="1">Piece</option>
                                                                            <option value="2">meter</option>
                                                                            <option value="3">liter</option>
                                                                            <option value="4">kilogram</option>
															                
																          </select>
																	</div>  
																</div>	
														</div>
														<div class="form-group">
															<label for="c_p" class="col-sm-3 control-label">Cost Price</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" id="c_p" name="COST_PRICE" placeholder="Cost Price" required>
																</div>
															</div>
														</div>
                                                        <div class="form-group">
															<label for="s_p" class="col-sm-3 control-label">Selling Price</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" id="s_p" name="SELLING_PRICE" placeholder="Selling Price" required>
																</div>
															</div>
														</div>
									
														<div class="form-group mb-0">
															<div class="col-sm-offset-3 col-sm-9">
																<button type="submit" class="button" name="add_product" class="btn btn-info" <?php if(is_array($_SESSION['dcn_id'])){echo 'disabled';}?>>Submit</button>
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