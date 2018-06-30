<div class="wrapper theme-1-active pimary-color-red">
        <div class="page-wrapper">
			<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Broadcaster Channel List</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?= base_url('admin/dashboard')?>">Dashboard</a></li>
						<li><a href="#"><span>broadcaster</span></a></li>
						<li class="active"><span>Broadcaster Channel List</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->
				
				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Broadcaster Channel List</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="datable" class="table table-hover display  pb-30" >
												<thead>
													<tr>
														<th>Broadcaster Name</th>
														<th>Channels</th>
														<th>Tools</th>
													</tr>
												</thead>
                                                <tbody>
                                                    <?php $data=select_loop('broadcaster');
                                                    foreach((array) $data as $table):
                                                    ?>
                                                    <tr>
														<th><?= $table['FIRM_NAME'];?></th>
														<th><?= select_where_num('broadcaster_channel',"BROADCASTER_ID='".$table['ID']."'","CHANNEL_ID");?></th>
														<th align="center"><?=form_open('admin/broadcaster_channel/view',['data-toggle' =>'tooltip'],['ID' => $table['ID']])?><button><i class="fa fa-pencil text-inverse m-r-10"></i></button></form></th>
														
													</tr>
                                                    <?php endforeach;?>
                                                </tbody>
                                                <tfoot>
													<tr>
                                                        <th>Name</th>
														<th>Channels</th>
														<th>Tools</th>
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
				<!-- /Row -->
				
			
			</div>
			
		</div>
        
        </div>