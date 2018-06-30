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
	
	
	
   
	<!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('vendors\bower_components\sweetalert\dist\sweetalert.min.js'); ?>"></script>
	<?php 
	if (isset($cust))
    {
		?>
		
		 <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker({
					
					defaultDate: new Date(),
                    format:'DD/MM/YYYY'
					
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

$(document).ready(function(){
    $(".setting-panel ul li:not(:first)").click(function(){
		var p=$("#p").val();
		$("#p").val(Number(p)+1);
		$("#pack_ala_append").append("<div style='border-bottom: 1px solid blue;width:25%;height:auto;float:left;border-radius: 25px;background:hsl(0, 100%, 25%);padding: 20px;'><ul><li>Pack Name:<input class='form-control' type='text' name='PACK_OR_CHANNEL_ID"+$("#p").val()+"' value="+"'"+$(this).text()+$("#p").val()+"'"+"></li><li>Pack Amount:<input class='form-control' type='text' name='AMOUNT"+$("#p").val()+"' value="+"'"+$(this).val()+"'"+"></li><li>Discount:<input class='form-control' type='text' name='DISC_AMOUNT"+$("#p").val()+"'> </li><li>Discount Type:<select  class='form-control' name='DISCOUNT_TYPE"+$("#p").val()+"' id='disc'><option value='2'>--Select--</option><option value='0'>Flat</option><option value='1'>Percentage</option></select></li><li>Biling Cycle:<select class='form-control' name='BILLING_CYCLE"+$("#p").val()+"' ><option value='2'>--Select--</option><option value='0'>Monthly</option><option value='1'>Daily</option></select></li><li>Auto Renew:<select class='form-control' name='AUTO_RENEW"+$("#p").val()+"' ><option value='2'>--Select--</option><option value='0'>Yes</option><option value='1'>No</option></select></li><li>Activation Date:<input class='form-control' type='date' name='ACTIVATION_DATE"+$("#p").val()+"'></li><li>Expiry date:<input class='form-control' type='date' name='CLOSING_DATE"+$("#p").val()+"'></li></ul></div>");
		$(this).css('background-color', 'violet');
		$(this).off("click");
		
    });
});

        </script>
		
		
		
		
		<?php
	}
	
	?>
	<script src="<?php echo base_url('vendors/bower_components/select2/dist/js/select2.full.min.js'); ?>"></script>

	<!-- datatables JS-->
	<script src="<?php echo base_url('js/tables.js'); ?>"></script> 

    
	
    <!-- Moment JavaScript -->
	<script src="<?php echo base_url('vendors/bower_components/moment/min/moment-with-locales.min.js'); ?>"></script>
	
	<!-- Bootstrap Colorpicker JavaScript -->
		<script src="<?php echo base_url('vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js'); ?>"></script>
	
	<!-- Bootstrap Datetimepicker JavaScript -->
	<script src="<?php echo base_url('vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js'); ?>"></script>
	
	
	<!-- Data table JavaScript -->
	<script src="<?php echo base_url('js/datatables.min.js'); ?>"></script>
	
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

	<!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url('vendors/bower_components/raphael/raphael.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/bower_components/morris.js/morris.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js'); ?>"></script>
		
	<!-- Form Wizard Data JavaScript -->
	<script src="<?php echo base_url('dist/js/form-wizard-data.js'); ?>"></script>
	
	<!-- Bootstrap Touchspin JavaScript -->
	<script src="<?php echo base_url('vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js');?>"></script>
	
    <!-- Fancy Dropdown JS -->
		<script src="<?php echo base_url('dist/js/dropdown-bootstrap-extended.js');?>"></script>
			
	<!-- Form Picker Init JavaScript -->
	<!-- <script src="<?php echo base_url('dist/js/form-picker-data.js'); ?>"></script> -->

	<!-- Progressbar Animation JavaScript -->
	<script src="<?php echo base_url('vendors/bower_components/waypoints/lib/jquery.waypoints.min.js');?>"></script>
	<script src="<?php echo base_url('vendors/bower_components/jquery.counterup/jquery.counterup.min.js');?>"></script>
	
	
</body>



</html>


