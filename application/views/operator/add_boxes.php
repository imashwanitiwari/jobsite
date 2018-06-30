<!-- Main Content -->
<div class="page-wrapper">
            <div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<h5 class="txt-dark"><?php echo strtoupper($_SESSION['name'])." "."Welcome to Add Boxes";?></h5>
						
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="<?php echo site_url('dashboard')?>">Dashboard</a></li>
							<li><a href="#"><span>Cable TV Users</span></a></li>
							<li class="active"><span>Customers list</span></li>
                            <li class="active"><span>Add Boxes</span></li>
						</ol>
					</div>
					<!-- /Breadcrumb -->
					</div>
                  <!-- /Title -->

<div class="container">
       <div class="panel-group">
            <div class="panel panel-default">
                        <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse1"> Add Box</a>
                                </h4>
                        </div>
                <div id="collapse1" class="panel-collapse collapse in">


                   <div class="panel-body">            
                   <form action="<?php echo site_url('operator/customers/add_box')?>" method="post">
                      <div class="row">
                                <div class="col-md-3">
                                        <div class="form-group">
                                            
                                            <label for="subs">Subscription No:</label>
                                            <input type="text" class="form-control" name="SUBSCRIPTION_NO" id="subs" value="<?php echo $_GET['SUBS_NO']?>" disabled>
                                        </div>
                                </div>
                                <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="pwd">Name:</label>
                                            <input type="text" class="form-control" name="FIRST_NAME" id="pwd" value="<?php echo $_GET['NAME']?>" disabled>
                                        </div>
                                </div>
                                <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="join">Joining Date:</label>
                                            <input type="date" name="" class="form-control" id="join">
                                        </div>
                                </div>
                                <div class="col-md-3">
                                        <div class="form-group">
                                            
                                            <label for="pac">Company:</label>
                                           
                                            
                                            <select class="form-control required comp_selection" name="COMP_ID"  id="compp" required>

                                                <OPTION>--Select Company--</option>
                                                <?php option_dif_where('companies','ID IN (select COMP_ID from mso where ID IN(select MSO_ID from operators_mso where OP_ID='.$_SESSION['dcn_id'].'))','ID','NAME');?>
																				
																			
                                            </select>
                                        </div>
                                </div>
                        </div>

                        <div class="row">
                               <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="vc">VC No:</label>
                                            <input type="text" name="VC_NO" class="form-control" id="vc">
                                        </div>
                                </div>
                                <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="stb">STB NO:</label>
                                            <input type="text" name="BOX_NO" class="form-control" id="stb">
                                        </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label mb-10">Box Type</label>
                                        <select class="form-control" name="BOX_TYPE" tabindex="1">
                                        <?php option_dif_no_where('box_type','ID','BOX_TYPE');?>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label mb-10">Warranty Type</label>
                                        <select class="form-control" name="WARRANTY_TYPE" tabindex="1">
                                            <?php option_dif_no_where('box_warranty','ID','WARRANTY_TYPE');?>
                                            
                                        </select>
                                    </div>
                                </div>
                                </div>   
                                <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label mb-10">Connection Type</label>
                                        <select class="form-control" name="CONNECTION_TYPE" tabindex="1">
                                        <option value="-1">-Select-</option>
                                        <option value="0">Prepaid</option>
                                        <option value="1">Postpaid</option>  
                                        </select>
                                    </div>
                                </div>
                                </div>
                                <input type="hidden" name="counter" id="p" value="0">
                                <input type="hidden" name="SUBSCRIBER_ID"  value="<?php echo $_GET['SUBSCRIBER_ID'] ?>">
                             
                        <div id="pack_ala_append" class="row">
                                        <div class="form-group">

                                            <label>Please select packs from right sidebar after choosing company</label>
                                            
                                        </div>


                        </div>
                        <div class="form-actions mt-10">
               
                            <button type="submit" class="btn btn-success  mr-10"> Submit</button>
															
                        </div>
                        
                    </form>


                    </div>

                       
                 </div>
           </div>
       </div>
       </div>
       

        <script>
            
            $(document).on("change","#compp",function(){
                            
                            
                            $.ajax({
                                type: "POST",
                                    url: "../add_customer/show_mso_packs_ala2",
                                    data: { ID: $(this).val() },
                                    success: function(result)
                            {
                            
                                $(".data_cont").html(result);
                                $("#pack_ala_append").html('');
                            },
                                error:function(result) {
                                    alert('error');
                                    }



                            });

                        });
                        

        </script>