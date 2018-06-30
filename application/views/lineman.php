<!-- Main Content -->
<div class="page-wrapper">
            <div class="container-fluid">
			
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<h5 class="txt-dark">LINEMAN COLLECTIONS</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="<?php echo site_url('dashboard')?>">Dashboard</a></li>
							
							<li class="active"><span>lineman</span></li>
						</ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->
				<div class="row">
						<div class="col-md-9">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">FILTER OPTIONS</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<form class="form-horizontal" method="post">

                                                      <div class="form-group">
															<label class="col-sm-3 control-label " for="">Time Period</label>
															<div class="col-sm-9">
															   <div class='input-group'>
																		<span class="input-group-addon">
																			<span class="fa fa-calendar"></span>
																		</span>
																		<input class="form-control input-daterange-datepicker" type="text" name="daterange" id="daterange" />
																
															    </div>
															</div>
														</div>

                                                       
													
                                                        <div class="form-group">
																<label class="col-sm-3 control-label" for="mso">Select Area:</label>
																<div class="col-sm-9">
																   <div class="input-group">
																         <div class="input-group-addon"><i class="icon-user"></i></div>
																          <select id="AREA_ID" class="form-control required chosen-select" name="AREA_ID[]" data-placeholder="Choose An Area..." value="<?php echo set_value('AREA_ID'); ?>" multiple>
                                                                            <?php 
                                                                            $array = array('OP_ID' => $this->session->userdata('dcn_id'));
                                                                            if(is_array($_SESSION['dcn_id']))
                                                                            option_dif_in_where('areas',$array,'ID','NAME');
                                                                            else
                                                                            option_dif_where('areas',$array,'ID','NAME');
                                                                            ?>
																          </select>
																	</div>  
																</div>	
														</div>
														<div class="form-group">
																<label class="col-sm-3 control-label" for="">Select Lineman:</label>
																<div class="col-sm-9">
																   <div class="input-group">
																         <div class="input-group-addon"><i class="icon-user"></i></div>
																          <select id="STAFF_ID" class="form-control required chosen-select" name="STAFF_ID[]" data-placeholder="Choose A Lineman..." value="<?php echo set_value('AREA_ID'); ?>" multiple>
                                                                            <?php 
                                                                            $array2 = array('OP_ID' => $this->session->userdata('dcn_id'),'TYPE'=>1 );
                                                                            $array3= 'OP_ID in ('.implode(',',$_SESSION['dcn_id']).') AND TYPE=1';
                                                                            if(is_array($_SESSION['dcn_id']))
                                                                            option_dif_where('staff',$array3,'ID','F_NAME');
                                                                            else
                                                                            option_dif_where('staff',$array2,'ID','F_NAME');
                                                                            ?>
																          </select>
																	</div>  
																</div>	
														</div>
													
														

                                                      


														<div class="form-group mb-0">
															<div class="col-sm-offset-3 col-sm-9">
																<button type="button" class="button" id="filter" name="filter" class="btn btn-info">Submit</button>
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
                        <table class="table table-bordered" id="lineman">
                            <thead>
                            <tr>
                                <th>Collection Date</th>
                                <th>Total Collection Amount</th>
                                <th>Total Customers</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            </tbody>
                        </table>

                    <script src="<?php echo base_url('js/chosen.jquery.min.js');?>"></script>
	                <script src="<?php echo base_url('js/chosen.proto.min.js');?>"></script>
                    
		            <script src="<?php echo base_url('vendors/bower_components/moment/min/moment-with-locales.min.js');?>"></script>
	                <script src="<?php echo base_url('vendors/bower_components/bootstrap-daterangepicker/daterangepicker.js');?>"></script>
					<script>
					$(document).ready(function(){
                        


                        $("#lineman").DataTable();
                        $(".chosen-select").chosen();
                        
                        $("#filter").click(function(){


                            $("#lineman").DataTable({
                              "destroy": true,
                              "ajax":{
                                "url":"../api/reports/lineman",
                                "type":"post",
                                "dataType":"json",
                                "data":{api_key:1234,START_DATE:$("#daterange").val().split("/")[0],END_DATE:$("#daterange").val().split("/")[1],SORT_BY:"AREA",STAFF_ID:$("#STAFF_ID").val(),AREA_ID:$("#AREA_ID").val()}
                              },

                              "columns": [
                
                                                { "data": "DATE" },
                                                { "data": "AMOUNT" },
                                                { "data": "CUST" }
                                
                                        ]



                            });

                       
                        });

					});
					
					
					
					</script>
                    <script>
			
			$(function () {
                $('.date').datetimepicker({
					
					defaultDate: new Date(),
					format:'YYYY-MM-DD',
					
					
					
				});
            });
			
			</script>


            <script>
                    $(function() {
                    $('input[name="daterange"]').daterangepicker({
                    
                       locale: {
                                 'format': "YYYY-MM-DD","separator":"/",
                               }

                    });
                    });
            </script>