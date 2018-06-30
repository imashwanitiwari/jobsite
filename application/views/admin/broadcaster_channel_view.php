<div class="wrapper theme-1-active pimary-color-red">
        <div class="page-wrapper">
			<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Broadcaster</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?= base_url('admin/dashboard')?>">Dashboard</a></li>
						<li><a href="<?= base_url('admin/broadcaster_channel')?>"><span>Broadcaster Channel List</span></a></li>
						<li class="active"><span>Broadcaster Channels</span></li>
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
                                     <h6 class="panel-title txt-dark"><?php foreach($broadcaster as $value): echo $value['FIRM_NAME'];endforeach;?></h6>
								</div>
                                <div class="pull-right">
                                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add Channels</button>
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
														<th>Channel Name</th>
														<th>Price</th>
														<th>Tools</th>
													</tr>
												</thead>
                                                <tbody>
                                                    <?php
                                                    foreach((array)$channel as $data):
                                                    ?>
                                                    <tr>
                                                        <th>
                                                            <?php $channel_id=$data['ID'];
															  echo $data['NAME'];
													foreach((array)$broadcaster as $broadcasters):
																$broadcaster_id=$broadcasters['ID'];
															  $value=select_where_row("broadcaster_channel",['CHANNEL_ID'=>$channel_id, 'BROADCASTER_ID'=>$broadcaster_id],"RATE");
															  ?>
																
                                                        </th>
														<th><span calss="fa fa-pencil text-inverse m-r-10"></span><?php foreach((array) $value as $values): echo $values['RATE'];endforeach;
													endforeach;
                                                            ?></th>
														<th></th>
														
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
                <?php foreach($broadcaster as $id):
                    $brodcaster_id=$id['ID'];
                    echo form_open('admin/broadcaster_channel/add_channel',"",['BROADCASTER_ID' => $id['ID']]);
                    ?>
                   
             
             
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
														<h5 class="modal-title" id="exampleModalLabel1">Add Channel</h5>
													</div>
													<div class="modal-body">
														<form>
															<div class="form-group">
																<label for="recipient-name" class="control-label sm-5">Channel Name</label>
																<select name="CHANNEL_ID" class="form-control" required>
                                                                    
                                                                    <?php option_dif_where("channels","ID NOT IN(select CHANNEL_ID from broadcaster_channel where BROADCASTER_ID=".$brodcaster_id.")","ID","NAME")?>
                                                                </select>
															</div>
															<div class="form-group">
																<label for="message-text" class="control-label sm-5">Price <i class="fa fa-inr"></i></label>
																<input class="form-control" type="text" name="RATE" required>
															</div>
														</form>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														<button type="button" class="btn btn-primary">Add</button>
													</div>
												</div>
											</div>
										</div>
                        </form>
					<?php endforeach;?>
			</div>
			
		</div>
        
        </div>