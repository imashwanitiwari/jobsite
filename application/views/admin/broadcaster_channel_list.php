<div class="wrapper theme-1-active pimary-color-red">
        <div class="page-wrapper">
			<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">MSO</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?= base_url('admin/dashboard')?>">Dashboard</a></li>
						<li><a href="#"><span>MSO</span></a></li>
						<li class="active"><span>MSO channles</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->
	<?php if($this->session->flashdata('box_validation_fail')):?>
	<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong><?= validation_errors()?></strong>
</div><?php endif;?>

<?php if($this->session->flashdata('add_box')):?>
	<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Well done!</strong> This Box has been added successfully.</a>.
</div>
<?php endif;?>
				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Broadcasters</h6>
								</div>
                               
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="broadcaster_channel_list_datatable" class="table table-hover display  pb-30" >
												<thead>
													<tr>
														<th>Broadcaster</th>
														<th>Total Channel(s)</th>
														<th></th>
													</tr>
												</thead>
                                               
                                                <tfoot>
												<tr>
														<th>Broadcaster</th>
														<th>Total Channel(s)</th>
														<th></th>
													</tr>
												</tfoot>
                                                
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</div>
				</div>
			