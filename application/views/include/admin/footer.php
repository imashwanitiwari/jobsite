<!-- Footer -->
				<footer class="footer container-fluid pl-30 pr-30">
					<div class="row">
						<div class="col-sm-12">
							<p>2018 &copy; DCNTV. Cable Billing Software</p>
						</div>
					</div>
				</footer>
				<!-- /Footer -->
			</div>
		</div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->
	
	<!-- JavaScript -->
	
	<?php 
	if (isset($cust))
    {
		?>
		
		 <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker({
					
					format: 'yyyy-mm-dd hh:ii:ss'
					
				});
            });
			
			function isNumber(evt) {
            evt = (evt) ? evt : window.event;
           var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode > 31 && (charCode < 48 || charCode > 57)) {
          return false;
    }
    return true;
}
        </script>
		
		
		
		
		<?php
	}
	
	?>
	
    <!-- jQuery -->
    <script src="<?php echo base_url('vendors/bower_components/jquery/dist/jquery.min.js'); ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
	
    <!-- Moment JavaScript -->
	<script src="<?php echo base_url('vendors/bower_components/moment/min/moment-with-locales.min.js'); ?>"></script>
	
	<!-- Bootstrap Colorpicker JavaScript -->
		<script src="<?php echo base_url('vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js'); ?>"></script>
	
	<!-- Bootstrap Datetimepicker JavaScript -->
	<script src="<?php echo base_url('vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js'); ?>"></script>
	
	
	<!-- Data table JavaScript -->
	<script src="<?php echo base_url('vendors/bower_components/datatables/media/js/jquery.dataTables.min.js'); ?>"></script>
	<script src="<?php echo base_url('dist/js/dataTables-data.js')?>"></script>
	
	<!-- Slimscroll JavaScript -->
	<script src="<?php echo base_url('dist/js/jquery.slimscroll.js'); ?>"></script>
	
	<!-- Owl JavaScript -->
	<script src="<?php echo base_url('vendors/bower_components/owl.carousel/dist/owl.carousel.min.js'); ?>"></script>
	
	<!-- Switchery JavaScript -->
	<script src="<?php echo base_url('vendors/bower_components/switchery/dist/switchery.min.js'); ?>"></script>
	
	<!-- Fancy Dropdown JS -->
	<script src="<?php echo base_url('dist/js/dropdown-bootstrap-extended.js'); ?>"></script>
	
	<!-- Init JavaScript -->
	<script src="<?php echo base_url('dist/js/init.js'); ?>"></script>
	
	
	<!-- Form Wizard JavaScript -->
	<script src="<?php echo base_url('vendors/bower_components/jquery.steps/build/jquery.steps.min.js'); ?>"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
		
	<!-- Form Wizard Data JavaScript -->
	<script src="<?php echo base_url('dist/js/form-wizard-data.js'); ?>"></script>
	
	<!-- Bootstrap Touchspin JavaScript -->
	<script src="<?php echo base_url('vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js');?>"></script>
	
    <!-- Fancy Dropdown JS -->
		<script src="<?php echo base_url('dist/js/dropdown-bootstrap-extended.js');?>"></script>
			
	<!-- Form Picker Init JavaScript -->
	<script src="<?php echo base_url('dist/js/form-picker-data.js'); ?>"></script>
	
</body>



</html>


