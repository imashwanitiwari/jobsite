<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<h5 class="txt-dark">All Complaints</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="<?php echo site_url('dashboard')?>">Dashboard</a></li>
							
							<li class="active"><span>Complaints</span></li>
						</ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
                <!-- /Title -->

                <div class="container">
  <div style="margin-bottom:20px">              
 
  Complain No:
  <input type="text" name="COMP_NO" value="" id="COMP_NO">
  <input type="hidden" name="OP_ID" value="<?php echo $_SESSION['dcn_id']?>" id="OP_ID">

  <button type="button" class="" id="status" value="Get Status" name="Get Status" data-toggle="modal" data-target="#allcomp">Get Status</button>
  <!-- Modal -->
  <div class="modal fade" id="allcomp" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Complain Status</h4>
        </div>
        <div class="modal-body">
        <table class="table table-bordered">
     <tbody>
      <tr class="info">
        <th>Complain No</th>
        <td id="c_no"></td>
        
      </tr>
    
   
      <tr class="warning">
        <th>Victim Name</th>
        <td id="v_name"> </td>
        
      </tr>      
      <tr class="success">
        <th>Issue</th>
        <td id="i_ssue"></td>
        
      </tr>
      <tr class="danger">
        <th>Sub Issue</th>
        <td id="s_issue"></td>
        
      </tr>
      <tr class="warning">
        <th>Problem</th>
        <td id="prob"></td>
        
      </tr>
      <tr class="info">
        <th>Reg Date</th>
        <td id="r_date"></td>
        
      </tr>
      <tr class="warning">
        <th>Resolve Date</th>
        <td id="res_date"></td>
        
      </tr>
      <tr class="active">
        <th>Resolve Status</th>
        <td id="res_status"></td>
        
      </tr>
      <tr class="info">
        <th>Complaint Status</th>
        <td id="c_status"></td>
        
      </tr>
    </tbody>
  </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

</div> 
<div class="table-responsive">
  <table class=" table table-striped table-bordered" id="complaints">
    <thead>
      <tr>
        <th>Complain No</th>
        <th>Subscriber Name</th>
        <th>Issue</th>
        <th>Sub Issue</th>
        <th>Title</th>
        <th>Problem</th>
        <th>Register Date</th>
        <th>Resolve Date</th>
        <th>Resolve Details</th>
        <th>Priority</th>
        <th><button type="button" class="btn btn-info btn-md"><span class="glyphicon glyphicon-edit"></span></button></th>
      </tr>
    </thead>
    <tbody id="getdata"></tbody>
    
  </table>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="complaint_model" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Area</h4>
        </div>
        <div class="modal-body">
		<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">
													<form class="form-horizontal" method="post" action="<?php echo site_url('');?>">
														<div class="form-group">
															<label for="edit_area" class="col-sm-3 control-label">Area Name*</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" id="edit_area" name="edit_area" placeholder="Area Name">
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="edit_houses" class="col-sm-3 control-label">Total Houses</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" id="edit_houses" name="edit_houses" placeholder="Number Of Houses">
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="edit_remark" class="col-sm-3 control-label">Remark</label>
															<div class="col-sm-9">
																<div class="input-group">
																	<div class="input-group-addon"><i class="icon-user"></i></div>
																	<input type="text" class="form-control" id="edit_remark" name="edit_remark" placeholder="Remark">
																</div>
															</div>
														</div>
														
														<div class="form-group mb-0">
															<div class="col-sm-offset-3 col-sm-9">
																<button type="submit" class="btn btn-info" name="edit_area_submit" <?php if(is_array($_SESSION['dcn_id'])){echo 'disabled';}?>>Submit</button>
															</div>
														</div>
														<input type="hidden" name="AREA_ID" id="AREA_ID" value="">
													</form>
												</div>
											</div>
										</div>
		  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>	


<script>
$(document).ready(function(){

/* $.ajax({

       type:"post",
       dataType:"json",
       url: "../../api/complaint/get_all_complaint",
       data:{OP_ID:$("#OP_ID").val(),api_key:"1234",START_LIMIT:"0",END_LIMIT:"50"},

       success:function(result){
         
         //alert(res.length); 
         for(var i=0;i<50;i++){

          $("#getdata").append('<tr><td>'+result['response'][i]['COMP_NO']+'</td>'+
                               '<td>'+result['response'][i]['VICTIM_ID']+'</td>'+
                               '<td>'+result['response'][i]['ISSUE_ID']+'</td>'+
                               '<td>'+result['response'][i]['SUB_ISSUE_ID']+'</td>'+
                               '<td>'+result['response'][i]['TITLE']+'</td>'+
                               '<td>'+result['response'][i]['PROBLEM']+'</td>'+
                               '<td>'+result['response'][i]['REG_DATE']+'</td>'+
                               '<td>'+result['response'][i]['RESOLVE_DATE']+'</td>'+
                               '<td>'+result['response'][i]['RESOLVE_DETAILS']+'</td>'+
                               '<td>'+result['response'][i]['PRIORITY']+'</td>'+
                               '<td><button type="button" class="btn btn-info edit_comp">EDIT</button></td></tr><br>'
                               
          );  


        
         
}

       },

       error:function(result){
          alert();

       }

}); */

$("#complaints").DataTable({

"ajax":
{
  "url":"http://localhost/dcntv-app/api/complaint/get_all_complaint",
  "type":"post",
  "data":{OP_ID:$("#OP_ID").val(),api_key:"1234",START_LIMIT:"0",END_LIMIT:"50"}
},

"columns":[{"data":"COMP_NO"},
{"data":"VICTIM_ID"},
{"data":"ISSUE_ID"},
{"data":"SUB_ISSUE_ID"},
{"data":"TITLE"},
{"data":"PROBLEM"},
{"data":"REG_DATE"},
{"data":"RESOLVE_DATE"},
{"data":"RESOLVE_DETAILS"},
{"data":"PRIORITY"},
{"data":null}

],

"columnDefs": [  
    
    {
    
    "render": function ( data, type, row ) {
        return '<button type="button" class="btn btn-info edit_area" data-toggle="modal" data-target="#complaint_model"><span class="glyphicon glyphicon-edit"></span></button>';
    },
    "targets": 10
}
]   
});

$(document).on("click",".edit_comp",function(){

  var row = $(this).closest("tr");       // Finds the closest row <tr> 
  var tds = row.find("td");             // Finds all children <td> elements
  alert(tds.eq(1).text());

 /*   $.each(tds, function()
  {                                     // Visits every single <td> element
    console.log($(this).text());        // Prints out the text within the <td>
  });  */

//alert();

})


$(document).on("click","#status",function(){
  
            $("#v_name").text('');
            $("#i_ssue").text('');
            $("#s_issue").text('');
            $("#r_date").text('');
            $("#prob").text('');
            $("#res_date").text('');
            $("#res_status").text('');
            $("#c_status").text('');
  
   $.ajax({

            url:"../../api/complaint/get_complaint_status",
            type:"POST",
            cache:"false",
            dataType:"json",
            data:{"api_key":"1234","OP_ID":$("#OP_ID").val(),"COMPLAINT_NO":$("#COMP_NO").val()},
            success:function(result){
            if(result['errors'][0]==102){

            swal("Please Insert a Valid Complain Number");

            }
              //alert(result['response']['PROBLEM']);
            $("#c_no").text($("#COMP_NO").val());
            $("#v_name").text(result['response']['VICTIM_ID']);
            $("#i_ssue").text(result['response']['ISSUE_ID']);
            $("#s_issue").text(result['response']['SUB_ISSUE_ID']);
            $("#r_date").text(result['response']['REG_DATE']);
            $("#prob").text(result['response']['PROBLEM']);
            $("#res_date").text(result['response']['RESOLVE_DATE']);
            $("#res_status").text(result['response']['RESOLVE_DETAILS']);
            $("#c_status").text(result['response']['COMPLAINT_STATUS']);

            
          },

            error:function(result){

              alert('error');
            }




   });
 

});


});


</script>
