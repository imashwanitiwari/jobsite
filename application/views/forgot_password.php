<?php
defined('BASEPATH') OR exit('No direct script access allowed');
echo doctype('html5');
echo "<html lang='en'>";
echo "<head>";
	    
		$meta = array(
        array(
                'name' => 'Content-type',
                'content' => 'text/html; charset=utf-8', 'type' => 'equiv'
        ),
        array(
                'name' => 'viewport',
                'content' => 'width=device-width, initial-scale=1.0'
        ),
        array(
                'name' => 'description',
                'content' => 'Cable Billing Software with Billing Machine Support'
        ),
        array(
                'name' => 'keywords',
                'content' => 'Cable, Billing, Dish, TV, Technopits, DCN, Hand-Held, Billing Machine, Online Billing, Offline Billing'
        ),
        array(
                'name' => 'author',
                'content' => '.in'
        ),
        
);
        echo meta($meta);
        echo "<title>".$page_title."</title>";
        //Favicon 
      $link=array(
        'href'  => 'favicon.ico',
        'rel'   => 'shortcut icon',
        'type'  => 'image/png');
		echo link_tag($link);
     //<!-- Bootstrap Core CSS -->
        echo link_tag('vendors\bower_components\bootstrap\dist\css\bootstrap.min.css');
		

        // //Custom CSS 
        
		//  echo link_tag('css/style.css');
          echo link_tag('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
        // //owl carousel css
         
		//  echo link_tag('vendors\bower_components\owl.carousel\dist\assets\owl.carousel.min.css');
        //  echo link_tag('css/owl.theme.css');
	    //  echo link_tag('css/pricing_table.css');
		//  //echo link_tag('css/new.css');
         
        echo link_tag('vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css');
		
		
		
		// <!-- Custom CSS -->
		echo link_tag('dist/css/style.css');
	
		 ?>

	
</head>
<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body>
		<!--Preloader-->
		<div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>
		<!--/Preloader-->
		
		<div class="wrapper pa-0">
			<!-- Main Content -->
			<div class="page-wrapper pa-0 ma-0 auth-page">
				<div class="container-fluid">
					<!-- Row -->
					<div class="table-struct full-width full-height">
						<div class="table-cell vertical-align-middle auth-form-wrap">
							<div class="auth-form  ml-auto mr-auto no-float">
								<div class="row">
									<div class="col-sm-12 col-xs-12">
										<div class="sp-logo-wrap text-center pa-0 mb-30">
											<a href="index-2.html">
											<img class="brand-img mr-10" src="<?= base_url('images/dcn_logo.png');?>" alt="brand" style="height:150px;width:150px" />
												<span class="brand-text"></span>
											</a>
										</div>
										<div class="mb-30">
											<h4 class="text-center txt-dark mb-10">Need help with your password?</h4>
											
										<div class="form-wrap">
											<?php if($this->session->flashdata('mob'))
													{?>
														<h6 class="text-center txt-grey nonecase-font">Please check your mobile for a message with your code. Your code is 6 digits long.</h6>
										</div>	
											<!-- code here -->
											<?php if($error=$this->session->flashdata('otp_invalid')):?>
										
										<div class="alert alert-dismissible alert-danger">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<strong><?= $this->session->flashdata('otp_invalid') ?></strong>
										</div>
										<?php endif ;?>
											<?= form_open('forgot_password/verify_otp');?>
											<div class="form-group">
													<label class="control-label mb-10" for="exampleInputEmail_2">OTP <i class="fa fa-lock"></i></label>
													<input type="text" class="form-control" required="" id="exampleInputEmail_2" placeholder="Enter OTP" name="otp" maxlength="6">
													<a class="capitalize-font txt-primary block mb-10 pull-right font-12" href="<?= base_url('forgot_password/resend_otp')?>">Didn't get a OTP?</a>
													<div class="clearfix"></div>
												</div>
												<div class="form-group text-center">
													<button type="submit" class="btn btn-info btn-rounded">Verify OTP</button>
												</div>
													</form>
											<?php  $this->session->userdata('otp_for_password');}
												 else if($this->session->flashdata('otp'))
												 		{

											  ?>
											  <h6 class="text-center txt-grey nonecase-font"></h6>
										</div>	
											  <!-- code here -->
												 <?php }
											  else {?>
											  <h6 class="text-center txt-grey nonecase-font">Enter the Mobile no. you use for , and we’ll help you create a new password.</h6>
										</div>	
										<?php if($error=$this->session->flashdata('mob_invalid')):?>
										
										<div class="alert alert-dismissible alert-danger">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<strong><?= $this->session->flashdata('mob_invalid') ?></strong>
										</div>
										<?php endif ;?>
											<?= form_open('forgot_password/mob');?>
											<div class="form-group">
													<label class="control-label mb-10" for="exampleInputEmail_2">I am a  <span style="color:red">*</span></label>
													<select class="form-control" name="table">
                                                        <option value="operators">Oprator</option>
                                                        <option value="operators">Sub-Oprator</option>
                                                        <option value="subscribers">Customer</option>
													</select>
													
												</div>
												<div class="form-group">
													<label class="control-label mb-10" for="exampleInputEmail_2">Mobile No.  <span style="color:red">*</span></label>
													<input type="text" class="form-control" required="" id="exampleInputEmail_2" maxlength="10" placeholder="Enter Mobile" name="MOBILE">
												</div>
												
												<div class="form-group text-center">
													<button type="submit" class="btn btn-info btn-rounded">Reset</button>
												</div>
											</form>
											  <?php } ?>
										</div>
									</div>	
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->	
				</div>
				
			</div>
			<!-- /Main Content -->
		</div>
		<!-- /#wrapper -->
		
		<!-- /#wrapper -->
		
		<!-- JavaScript -->
		
		<!-- jQuery -->
		<script src="<?= base_url('vendors/bower_components/jquery/dist/jquery.min.js');?>"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="<?= base_url('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
		<script src="<?= base_url('vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js');?>"></script>
		
		<!-- Slimscroll JavaScript -->
		<script src="<?= base_url('dist/js/jquery.slimscroll.js');?>"></script>
		
		<!-- Init JavaScript -->
		<script src="<?= base_url('dist/js/init.js');?>"></script>
	</body>

</html>