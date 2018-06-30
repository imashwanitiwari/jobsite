<?php
/*
 * Copyright Â© Technopits. All rights Reserved.
 * Project Name: Digital Cable Networks CMS
 * Project Url: http://www.dcnonline.in
 * Project Developer: Rohit Hazra [rohithzr@live.com]
 * Project Theme: Dandelion Admin Template [Simple License]
 */
$title = 'Dashboard | DCN';
$sidebar = 'Dashboard';
$table_data = 0;
$simple_tables = 1;
$chart = 1;
include_once 'header.php';
include_once 'functions/dash.php';
include_once 'functions/line.php';
include_once 'functions/helper.php';
include_once 'functions/cust.php';
//include_once 'log_func/status.php';
?>
<style>
    .sorting:after, .sorting_asc:after, .sorting_desc:after,.sorting:before, .sorting_asc:before, .sorting_desc:before {
        display : none !important;
    }
</style>
<?php // echo tot_adv() ?>
<!-- Breadcrumbs -->
<div id="da-breadcrumb">
    <div style="  float: right; padding: 10px;"><a href="sms_price_popup.php" target="_BLANK"> SMS Packs are now available. Send Requests to support@settopbox.in</a></div>
    <ul>
        <li class="active"><a href="dashboard.php"><i class="icon-office"></i> Dashboard</a></li>
    </ul>

</div>

</div>
</div>
</div>
<?php
include_once 'sidebar.php';
if ($_SESSION['dcn_id'] != 10) {
    $this_month = date('m');
    $this_year = date('Y');
    $_SESSION['pay_type'] = 1;
    if ($_SESSION['pay_type'] == 0) {
        if ($this_month == 1) {
            $this_month = 12;
            $this_year--;
        } else {
            $this_month--;
        }
    }
    if ($_SESSION['pay_type'] == 0) {
        $last_month = $this_month;
        $last_year = $this_year;
    } else {
        $last_month = date('m');
        $last_year = date('Y');
    }
    if ($last_month == 1) {
        $last_month = 12;
        $last_year--;
    } else {
        $last_month--;
    }

//echo $last_month;
//echo $last_year;
    include_once 'functions/cust_report.php';
//graph data
	/*
    $year = 2014;
    for ($i = 1; $i <= 12; $i++) {
        $active[] = get_active($i, $year);
        $inactive[] = get_inactive($i, $year);
        $months[] = num_to_month($i);
        $all[] = $active[$i - 1] + $inactive[$i - 1];
        $unpaid[] = check_payment_bal($i, $year);
        $paid[] = check_payment_paid($i, $year);
    }*/
    ?>
    <style>

    </style>

    <!-- Main Content Wrapper -->
    <div id="da-content-wrap" class="clearfix">

        <!-- Content Area -->
        <div id="da-content-area">
            <div class="row-fluid row_init left dash_top">
                <div class="widget">
                    <div class="stat_box">
                          <div class="widget-outer green span2">
                            <div class="row-fluid">
                                <div class="span2">
                                    <span class="icon-users widget-icon"></span>
                                </div>
                                <div class="span9">
                                    <span class="widget-title">Customers</span>
                                    <span class="widget-number"><center><h3><a href="state_cust.php"></a><?php echo total_cust() ?></h3></center></span>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span6 mar10">
                                    <div class="row-fluid">
                                        <span class="widget-text"><center>Active</center></span>
                                    </div>
                                    <div class="row-fluid">
                                        <span class="widget-text"><center><a href="state_cust.php?state=0"></a><?php echo act_cust() ?></center></span>
                                    </div>
                                </div>
                                <div class="span6 mar10">
                                    <div class="row-fluid">
                                        <span class="widget-text"><center>InActive</center></span>
                                    </div>
                                    <div class="row-fluid">
                                        <span class="widget-text"><center><a href="state_cust.php?state=1"></a><?php echo (total_cust() - act_cust()) ?></center></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget-outer orange span2">
                            <div class="row-fluid">
                                <div class="span2">
                                    <span class="icon-storage widget-icon"></span>
                                </div>
                                <div class="span9">
                                    <span class="widget-title">Boxes</span>
                                    <span class="widget-number"><center><h3><?php echo total_boxes() ?></h3></center></span>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span6 mar10">
                                    <div class="row-fluid">
                                        <span class="widget-text"><center>In Use</center></span>
                                    </div>
                                    <div class="row-fluid">
                                        <span class="widget-text"><center><?php echo act_boxes() ?></center></span>
                                    </div>
                                </div>
                                <div class="span6 mar10">
                                    <div class="row-fluid">
                                        <span class="widget-text"><center>Free</center></span>
                                    </div>
                                    <div class="row-fluid">
                                        <span class="widget-text"><center><?php echo (total_boxes() - act_boxes()) ?></center></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget-outer blue span2">
                            <div class="row-fluid">
                                <div class="span2">
                                    <span class="icon-flag widget-icon"></span>
                                </div>
                                <div class="span9">
                                    <span class="widget-title">Complaints</span>
                                    <span class="widget-number"><center><h3><a href="complaints_list.php"><?php echo all_cmpl() ?></a></h3></center></span>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span6 mar10">
                                    <div class="row-fluid">
                                        <span class="widget-text"><center>Pending</center></span>
                                    </div>
                                    <div class="row-fluid">
                                        <span class="widget-text"><center><?php echo (all_cmpl() - res_cmpl()) ?></center></span>
                                    </div>
                                </div>
                                <div class="span6 mar10">
                                    <div class="row-fluid">
                                        <span class="widget-text"><center>Resolved</center></span>
                                    </div>
                                    <div class="row-fluid">
                                        <span class="widget-text"><center><?php echo res_cmpl() ?></center></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget-outer red span2">
                            <div class="row-fluid">
                                <div class="span2">
                                    <span class="icon-connection widget-icon"></span>
                                </div>
                                <div class="span9">
                                    <span class="widget-title">Internet</span>
                                    <span class="widget-number"><center><h3>0</h3></center></span>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span6 mar10">
                                    <div class="row-fluid">
                                        <span class="widget-text"><center>Active</center></span>
                                    </div>
                                    <div class="row-fluid">
                                        <span class="widget-text"><center>0</center></span>
                                    </div>
                                </div>
                                <div class="span6 mar10">
                                    <div class="row-fluid">
                                        <span class="widget-text"><center>InActive</center></span>
                                    </div>
                                    <div class="row-fluid">
                                        <span class="widget-text"><center>0</center></span>
                                    </div>
                                </div>
                            </div>
							
							
                        </div>
						
						<div class="widget-outer black span2">
                            <div class="row-fluid">
                                <div class="span2">
                                    <span class="icon-connection widget-icon"></span>
                                </div>
                                <div class="span9">
                                    <span class="widget-title">Packs</span>
                                    <span class="widget-number"><center><h3><?php echo total_boxes() ?></h3></center></span>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span6 mar10">
                                    <div class="row-fluid">
                                        <span class="widget-text"><center>Active</center></span>
                                    </div>
                                    <div class="row-fluid">
                                        <span class="widget-text"><center><?php echo act_boxes() ?></center></span>
                                    </div>
                                </div>
                                <div class="span6 mar10">
                                    <div class="row-fluid">
                                        <span class="widget-text"><center>InActive</center></span>
                                    </div>
                                    <div class="row-fluid">
                                        <span class="widget-text"><center><?php echo (total_boxes() - act_boxes()) ?></center></span>
                                    </div>
                                </div>
                            </div>
							
							
                        </div>
						
						
						
                    </div>
                </div>
            </div>
            <div class="row-fluid right_widget">
             <!-- <div id="banner-fade">
                    <ul class="bjqs">
                        <li><img src="assets/images/ftth/1.jpg" title=" "></li>
						<li><img src="assets/images/ftth/2.jpg" title=""></li>
						<li><img src="assets/images/ftth/3.jpg" title=""></li>
						<li><img src="assets/images/ftth/4.jpg" title=" "></li>
						<li><img src="assets/images/ftth/5.jpg" title=""></li>
					    <li><img src="assets/images/ftth/0.png" title=" "></li>



                    </ul>
                </div> -->
                <div class="right_bar">

                    <div class="da-panel">

                        <div class="da-panel-content">

                            <h4>Today's Collection Summary</h4>

                            <ul class="da-summary-stat">
               <li>
                                    <a target="_blank" href="get_paid.php?rep_dur=1&rep_lineman=-1&area=&state=-1&status=5">
                                        <span class="da-summary-icon" style="background-color:#e15656;">
                                            <i class="icon-money"></i>
                                        </span>
                                        <span class="da-summary-text">
                                            <span class="value"><?php echo today_cash() ?></span>
                                            <span class="text">Total Cash Received</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="da-summary-icon" style="background-color:#e15656;">
                                            <i class="icon-money"></i>
                                        </span>
                                        <span class="da-summary-text">
                                            <span class="value"><?php echo (today_this($this_month, $this_year)) ?></span>
                                            <span class="text">For This Month</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="da-summary-icon" style="background-color:#e15656;">
                                            <i class="icon-money"></i>
                                        </span>
                                        <span class="da-summary-text">
                                            <span class="value"><?php echo today_other($this_month, $this_year) ?></span>
                                            <span class="text">For Other Months </span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="get_paid.php?rep_dur=1&rep_lineman=-1&area=&state=-1&status=6">
                                        <span class="da-summary-icon" style="background-color:#e15656;">
                                            <i class="icon-money"></i>
                                        </span>
                                        <span class="da-summary-text">
                                            <span class="value"><?php echo number_format((float) today_adv(), 2, '.', '') ?></span>
                                            <span class="text">Advance Deposited</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="get_paid.php?rep_dur=1&rep_lineman=-1&area=&state=-1&status=4">
                                        <span class="da-summary-icon" style="background-color:#e15656;">
                                            <i class="icon-money"></i>
                                        </span>
                                        <span class="da-summary-text">
                                            <span class="value"><?php echo number_format((float) today_disc(), 2, '.', '') ?></span>
                                            <span class="text">Discount Given</span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                            <hr>
                            <h4>This Month's Collection</h4>
                            <ul class="da-summary-stat">
                                <li>
                                    <a target="_blank" href="get_paid.php?rep_dur=3&rep_lineman=-1&area=&state=-1&status=5">
                                        <span class="da-summary-icon" style="background-color:#e15656;">
                                            <i class="icon-money"></i>
                                        </span>
                                        <span class="da-summary-text">
                                            <span class="value"><?php echo month_cash() ?></span>
                                            <span class="text">Total Cash Received</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="da-summary-icon" style="background-color:#e15656;">
                                            <i class="icon-money"></i>
                                        </span>
                                        <span class="da-summary-text">
                                            <span class="value"><?php echo (month_this($this_month, $this_year)) ?></span>
                                            <span class="text">For This Month</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="da-summary-icon" style="background-color:#e15656;">
                                            <i class="icon-money"></i>
                                        </span>
                                        <span class="da-summary-text">
                                            <span class="value"><?php echo month_other($this_month, $this_year) ?></span>
                                            <span class="text">For Other Months </span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="get_paid.php?rep_dur=3&rep_lineman=-1&area=&state=-1&status=6">
                                        <span class="da-summary-icon" style="background-color:#e15656;">
                                            <i class="icon-money"></i>
                                        </span>
                                        <span class="da-summary-text">
                                            <span class="value"><?php echo number_format((float) month_adv(), 2, '.', '') ?></span>
                                            <span class="text">Advance Deposited</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="get_paid.php?rep_dur=3&rep_lineman=-1&area=&state=-1&status=4">
                                        <span class="da-summary-icon" style="background-color:#e15656;">
                                            <i class="icon-money"></i>
                                        </span>
                                        <span class="da-summary-text">
                                            <span class="value"><?php echo number_format((float) month_disc(), 2, '.', '') ?></span>
                                            <span class="text">Discount Given</span>
                                        </span>
                                    </a>
                                </li>
                                <hr style="margin:0px;">
                                <hr>
                               <!--  <h4>This Month's Summary</h4>
                                <ul class="da-summary-stat">
                                    <li>
                                        <a href="#">
                                            <span class="da-summary-icon" style="background-color:#e15656;">
                                                <i class="icon-money"></i>
                                            </span>
                                            <span class="da-summary-text">
                                                <span class="value"><?php echo monthly_income($this_month, $this_year) ?></span>
                                                <span class="text">This Month's Income</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="da-summary-icon" style="background-color:#e15656;">
                                                <i class="icon-money"></i>
                                            </span>
                                            <span class="da-summary-text">
                                                <span class="value"><?php echo monthly_this($this_month, $this_year) ?></span>
                                                <span class="text">Received This Month</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="da-summary-icon" style="background-color:#e15656;">
                                                <i class="icon-money"></i>
                                            </span>
                                            <span class="da-summary-text">
                                                <span class="value"><?php echo $ptm = (monthly_income($this_month, $this_year) - monthly_this($this_month, $this_year)) ?></span>
                                                <span class="text">Pending This Month</span>
                                            </span>
                                        </a>
                                    </li>
                                    <hr>
                                </ul>
                                <h4>Last Month's Summary</h4>
                                <ul class="da-summary-stat"> 
                                    <li>
                                        <a href="#">
                                            <span class="da-summary-icon" style="background-color:#e15656;">
                                                <i class="icon-money"></i>
                                            </span>
                                            <span class="da-summary-text">
                                                <span class="value"><?php echo -(last_income($last_month, $last_year)) ?></span>
                                                <span class="text">Previous Monthly Income</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="da-summary-icon" style="background-color:#e15656;">
                                                <i class="icon-money"></i>
                                            </span>
                                            <span class="da-summary-text">
                                                <span class="value"><?php echo monthly_this($last_month, $last_year) ?></span>
                                                <span class="text">Received Last Month</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="da-summary-icon" style="background-color:#e15656;">
                                                <i class="icon-money"></i>
                                            </span>
                                            <span class="da-summary-text">
                                                <span class="value"><?php echo (-last_income($last_month, $last_year) - monthly_this($last_month, $last_year)) ?></span>
                                                <span class="text">Pending Last Month</span>
                                            </span>
                                        </a>
                                    </li>
                                    <hr>
                                    <li>
                                        <a target ="_blank" href="get_due.php?rep_dur=1&rep_type=1&area=&status=-1">
                                            <span class="da-summary-icon" style="background-color:#e15656;">
                                                <i class="icon-dollar"></i>
                                            </span>
                                            <span class="da-summary-text">
                                                <span class="value"><?php echo (-(prev_bal($this_month, $this_year))-((tot_adv() - tot_adv_used()))) ?></span>
                                                <span class="text">Total Previous Balance</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="da-summary-icon" style="background-color:#e15656;">
                                                <i class="icon-dollar2"></i>
                                            </span>
                                            <span class="da-summary-text">
                                                <span class="value"><?php echo tot_adv() - tot_adv_used() ?></span>

                                                <span class="text">Total Advance Deposit</span>
                                            </span>
                                        </a>
                                    </li>
                                </ul> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid  " >
                <div class="span8">
                    <div class="da-panel"  style="margin-bottom:0">
                        <div class="da-panel-content" style="padding: 0">
                            <div class="da-panel collapsible"  style="margin-bottom:0">
                                <div class="da-panel-header">
                                    <span class="da-panel-title">
                                        <i class="icon-user"></i>
                                        Linemen Summary
                                    </span>
                                    <div class="da-panel-toggler"><span></span></div></div>
                                <div class="da-panel-inner-wrap"><div class="da-panel-content da-table-container">
                                        <table class="">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2">Lineman Name</th>
                                                    <th rowspan="2">Last Known Location</th>
                                                    <th rowspan="2">Last Location Time</th>
                                                    <th colspan="2"><center>Collection</center></th>
                                            <th rowspan="2"></th>
                                            </tr>
                                            <tr>
                                                <th style="border-left:1px #cacaca solid; text-align: center">Today&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                <th style="text-align: center">Yesterday</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $all_lineman = all_lineman();
                                                if (mysql_num_rows($all_lineman) > 0) {
                                                    while ($row = mysql_fetch_assoc($all_lineman)) {
                                                        $l_pay_today = lineman_pay($row['lnId'], date('Y-m-d'));
                                                        $l_pay_ystday = lineman_pay($row['lnId'], "" . date('Y-m-') . "" . (date('d') - 1));
                                                        $l_last = lineman_last($row['lnId']);
                                                        $l_last_row = mysql_fetch_assoc($l_last);
                                                        if ($l_pay_today <= 0) {
                                                            $l_pay_today = 'NIL';
                                                        }
                                                        if ($l_pay_ystday <= 0) {
                                                            $l_pay_ystday = 'NIL';
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $row['lineName'] ?></td>
                                                            <td><?php echo $l_last_row['address'] ?></td>
                                                            <td><?php echo time_ago($l_last_row['time']); ?></td>
                                                            <td><?php echo $l_pay_today ?></td>
                                                            <td><?php echo $l_pay_ystday ?></td>
                                                            <td class="da-icon-column">
                                                                <a target="_blank" href="get_paid.php?rep_dur=1&rep_lineman=<?php echo $row['lnId'] ?>&area=&state=-1&status=5"><i class="icol-magnifier"></i></a>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
           <!-- <div class="row-fluid  span_cust4" style="float:right;margin-right: 15px;" >
                <div class="span12">
                    <div class="da-panel"  style="margin-bottom:0">
                        <div class="da-panel-content" style="padding: 0">
                            <div class="da-panel collapsible"  style="margin-bottom:0">
                                <div class="da-panel-header">
                                    <span class="da-panel-title">
                                        <i class="icon-newspaper"></i>
                                        Latest News and Information
                                    </span>
                                    <div class="da-panel-toggler"><span></span></div></div>
                                <div class="da-panel-inner-wrap">
                                    <div class="da-panel-content da-table-container" style="overflow:auto;height:auto;">
                                        <iframe src="https://blogs.timesofindia.indiatimes.com/" width=80% height=50%>
										</iframe> 
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>-->
              
            <div class="row-fluid no-mobile" style="margin-top: 20px;">
                <div class="span8 graph_int">
                    <div class="da-panel"  style="margin-bottom:0">
                        <div class="da-panel-content" style="padding: 0">
                            <div class="da-panel collapsible"  style="margin-bottom:0">
                                <div class="da-panel-header">
                                    <span class="da-panel-title">
                                        <i class="icon-user"></i>
                                        Report of 2014
                                    </span>
                                    <div class="da-panel-toggler"><span></span>
                                    </div>
                                </div>
                                <div class="da-panel-inner-wrap">
                                    <div class="da-panel-content" cellspacing="0">
                                        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    </div>
    <script>
    <?php
    /*
	$js_active = json_encode($active);
    $js_inactive = json_encode($inactive);
    $js_months = json_encode($months);
    $js_all = json_encode($all);
    $js_paid = json_encode($paid);
    $js_unpaid = json_encode($unpaid);
    */
	$js_active = 0;
    $js_inactive = 0;
    $js_months = 0;
    $js_all = 0;
    $js_paid = 0;
    $js_unpaid = 0;
	?>

        var active_arr = <?php echo $js_active ?>;
        var inactive_arr = <?php echo $js_inactive ?>;
        var months_arr = <?php echo $js_months ?>;
        var all_arr = <?php echo $js_all ?>;
        var paid_arr = <?php echo $js_paid ?>;
        var unpaid_arr = <?php echo $js_unpaid ?>;


        for (var i = 0; i < active_arr.length; i++) {
            active_arr[i] = parseInt(active_arr[i], 10);
        }
        for (var i = 0; i < inactive_arr.length; i++) {
            inactive_arr[i] = parseInt(inactive_arr[i], 10);
        }
        for (var i = 0; i < all_arr.length; i++) {
            all_arr[i] = parseInt(all_arr[i], 10);
        }
        for (var i = 0; i < paid_arr.length; i++) {
            paid_arr[i] = parseInt(paid_arr[i], 10);
        }
        for (var i = 0; i < unpaid_arr.length; i++) {
            unpaid_arr[i] = parseInt(unpaid_arr[i], 10);
        }

        //console.log(active_arr);


    </script>

    <?php
}
include_once 'footer.php';
