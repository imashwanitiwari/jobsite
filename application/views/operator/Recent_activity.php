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
                <div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Row toggle</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="table-wrap">
											<table id="footable_3" class="table" data-filtering="true"  data-show-toggle="false">
												<thead>
													<tr>
														<th data-breakpoints="xs">ID</th>
														<th>First Name</th>
														<th>Last Name</th>
														<th data-breakpoints="xs">Job Title</th>
														<th data-breakpoints="xs sm">Started On</th>
														<th data-breakpoints="all" data-title="DOB">Date of Birth</th>
													</tr>
												</thead>
												<tbody>
													<tr data-expanded="true">
														<td>1</td>
														<td>Dennise</td>
														<td>Fuhrman</td>
														<td>High School History Teacher</td>
														<td>November 8th 2011</td>
														<td>July 25th 1960</td>
													</tr>
													<tr>
														<td>2</td>
														<td>Elodia</td>
														<td>Weisz</td>
														<td>Wallpaperer Helper</td>
														<td>October 15th 2010</td>
														<td>March 30th 1982</td>
													</tr>
													<tr>
														<td>3</td>
														<td>Raeann</td>
														<td>Haner</td>
														<td>Internal Medicine Nurse Practitioner</td>
														<td>November 28th 2013</td>
														<td>February 26th 1966</td>
													</tr>
													<tr>
														<td>4</td>
														<td>Junie</td>
														<td>Landa</td>
														<td>Offbearer</td>
														<td>October 31st 2010</td>
														<td>March 29th 1966</td>
													</tr>
													<tr>
														<td>5</td>
														<td>Solomon</td>
														<td>Bittinger</td>
														<td>Roller Skater</td>
														<td>December 29th 2011</td>
														<td>September 22nd 1964</td>
													</tr>
													<tr>
														<td>6</td>
														<td>Bar</td>
														<td>Lewis</td>
														<td>Clown</td>
														<td>November 12th 2012</td>
														<td>August 4th 1991</td>
													</tr>
													<tr>
														<td>7</td>
														<td>Usha</td>
														<td>Leak</td>
														<td>Ships Electronic Warfare Officer</td>
														<td>August 14th 2012</td>
														<td>November 20th 1979</td>
													</tr>
													<tr>
														<td>8</td>
														<td>Lorriane</td>
														<td>Cooke</td>
														<td>Technical Services Librarian</td>
														<td>September 21st 2010</td>
														<td>April 7th 1969</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>	