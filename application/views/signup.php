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
                'content' => 'dcntv.in'
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
			<header class="sp-header">
				<div class="sp-logo-wrap pull-left">
					<a href="index-2.html">
                    <img class="brand-img mr-10" src="<?= base_url('images/dcn_logo.png');?>" alt="brand" style="height:70px;width:70px" />
						<span class="brand-text">DCNTV</span>
					</a>
				</div>
				<div class="form-group mb-0 pull-right">
					<span class="inline-block pr-10">Already have an account?</span>
					<a class="inline-block btn btn-info btn-rounded btn-outline" href="<?= base_url('home');?>">Sign In</a>
				</div>
				<div class="clearfix"></div>
			</header>
			
			<!-- Main Content -->
			<div class="page-wrapper pa-0 ma-0 auth-page">
				<div class="container-fluid">
					<!-- Row -->
					<div class="table-struct full-width full-height">
						<div class="table-cell vertical-align-middle auth-form-wrap">
							<div class="auth-form  ml-auto mr-auto no-float">
								<div class="row">
									<div class="col-sm-12 col-xs-12">
										<div class="mb-30">
											<h3 class="text-center txt-dark mb-10">Sign up to DCNTV</h3>
											<h6 class="text-center nonecase-font txt-grey">Enter your details below</h6>
                                        </div>	
                                        <?php if($success=$this->session->flashdata('signup_success')):?>
										
										<div class="alert alert-dismissible alert-success">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong><?= $success;?>
                                        </div>
                                        <?php endif ;?>
                                        <?php if($error=$this->session->flashdata('error')):?>
										
										<div class="alert alert-dismissible alert-danger">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<strong><?= $error; ?></strong>
										</div>
										<?php endif ;?>
										<div class="form-wrap">
											<?= form_open('login/signup')?>

											<div class="form-group">
													<label class="control-label mb-10" for="exampleInputName_1">Profile Type <span style="color:red">*</span></label>
													<select class="form-control" name="PROFILE_TYPE">
                                                            <option value="OPERATOR">Operator</option>
                                                            <option value="SUBSCRIBER">Subscriber</option>
                                                    </select>
												</div>
                                                    
                                            <div class="form-group">
													<label class="control-label mb-10" for="exampleInputName_1">First Name <span style="color:red">*</span></label>
                                                    <input type="text" class="form-control" maxlength="25" required="" id="exampleInputName_1" placeholder="First Name" name="FIRST_NAME" value="<?= set_value('FIRST_NAME')?>">
                                                    <?php echo form_error('FIRST_NAME', '<p style="color:red;text-align:left">', '</p>'); ?>
												</div>
                                                <div class="form-group">
													<label class="control-label mb-10" for="exampleInputName_1">Last Name</label>
                                                    <input type="text" class="form-control" maxlength="25" id="exampleInputName_1" placeholder="Last Name" name="LAST_NAME" value="<?= set_value('LAST_NAME')?>">
                                                    <?php echo form_error('LAST_NAME', '<p style="color:red;text-align:left">', '</p>'); ?>
												</div>
												
                                                <div class="form-group">
													<label class="control-label mb-10" for="exampleInputEmail_2">Email address <span style="color:red">*</span></label>
                                                    <input type="email" class="form-control" maxlength="50" required="" id="exampleInputEmail_2" placeholder="Enter email" name="EMAIL" value="<?= set_value('EMAIL')?>">
                                                    <?php echo form_error('EMAIL', '<p style="color:red;text-align:left">', '</p>'); ?>
												</div>
												<div class="form-group">
													<label class="pull-left control-label mb-10" for="exampleInputpwd_2">Contact No.<span style="color:red">*</span></label>
                                                    <input type="mob" class="form-control" maxlength="10" required="" id="exampleInputpwd_2" placeholder="Enter Contact No." name="MOBILE" value="<?= set_value('MOBILE')?>">
                                                    <?php echo form_error('MOBILE', '<p style="color:red;text-align:left">', '</p>'); ?>
												</div>
												<div class="form-group">
													<label class="pull-left control-label mb-10" maxlength="250" for="exampleInputpwd_3">Drop Your Query</label>
													<textarea rows="4" cols="50" name="MESSAGE">
                                                    <?= set_value('MESSAGE')?>
                                                    </textarea>
												</div>
												<div class="form-group">
													
													<div class="clearfix"></div>
												</div>
												<div class="form-group text-center">
													<button type="submit" class="btn btn-info btn-rounded">sign Up</button>
												</div>
											</form>
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