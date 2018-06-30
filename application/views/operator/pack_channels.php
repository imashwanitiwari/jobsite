<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Main Content -->
<div class="page-wrapper">
            <div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<h5 class="txt-dark">MSO Channel List</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="<?php echo site_url('dashboard')?>">Dashboard</a></li>
							
							<li class="active"><span>MSO Channel List</span></li>
						</ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
                <!-- /Title -->
                  <form>
                  
                  <input type="hidden" name="MSO_ID" id="MSO_ID" value="<?php echo $mso_id;?>">
                  <input type="hidden" name="PACK_ID" id="PACK_ID" value="<?php echo $pack_id;?>">
                  
                  </form>

				<div class="table-responsive">
              <table class="table table-bordered" id="mso_channnels">
					<thead>
						<tr>
							<th>Channels List</th>
							<th>Tools</th>
							
						</tr>
					</thead>
				
				</table>
				</div>

				<div class="table-responsive">
              <table class="table table-bordered" id="channels_in_pack">
					<thead>
						<tr>
							<th>Pack Name</th>
							<th>Channel Name</th>
							<th>Tools</th>
						</tr>
					</thead>
				
				</table>
				</div>
            </div>
            </div>
			
        

					
