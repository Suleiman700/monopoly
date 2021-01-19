<?php

include_once 'inc/db.php';
include_once 'inc/playerInfo.php';



?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $p1Name; ?>'s Charts</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Plugins css -->
        <link href="assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
		
		
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
		<script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>

    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            

            <?php
			include_once 'inc/side_navbar.php';
			include_once 'inc/top_navbar.php';
			?>

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <form class="form-inline">
                                            <div class="form-group">
                                                <div class="input-group input-group-sm">
                                                    <input type="text" class="form-control border-white" id="dash-daterange">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text bg-blue border-blue text-white">
                                                            <i class="mdi mdi-calendar-range font-13"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="javascript: void(0);" class="btn btn-blue btn-sm ml-2">
                                                <i class="mdi mdi-autorenew"></i>
                                            </a>
                                            <a href="javascript: void(0);" class="btn btn-blue btn-sm ml-1">
                                                <i class="mdi mdi-filter-variant"></i>
                                            </a>
                                        </form>
                                    </div>
                                    <h4 class="page-title">Charts</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 



<div id="piechart"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['Bank', <?php echo $p1TotalFromBank_Stats; ?>],
  ['GO', <?php echo $p1PassGO_Stats; ?>],
  ['feeParking', <?php echo $p1FreeParking_Stats; ?>],
  ['Gym', 2],
  ['Sleep', 8]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'My Average Day', 'width':400, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>

							<div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="text-left">
                                                
                                                <h3 class="text-dark mt-1"><span data-plugin="counterup1" style="color:<?php echo $p1Color; ?>;">$<?php echo $p1Bal; ?></span></h3>
                                                <p class="text-muted mb-1 text-truncate"><?php echo $p1Name; ?></p>
												
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <h3 class="text-dark mt-1"><span data-plugin="counterup1" style="color:<?php echo $p2Color; ?>;">$<?php echo $p2Bal; ?></span></h3>
                                                <p class="text-muted mb-1 text-truncate"><?php echo $p2Name; ?></p>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->
							
							


                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="text-left">
                                                
                                                <h3 class="text-dark mt-1"><span data-plugin="counterup1" style="color:<?php echo $p1Color; ?>;">$<?php echo $p1Bal; ?></span></h3>
                                                <p class="text-muted mb-1 text-truncate"><?php echo $p1Name; ?></p>
												
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <h3 class="text-dark mt-1"><span data-plugin="counterup1" style="color:<?php echo $p2Color; ?>;">$<?php echo $p2Bal; ?></span></h3>
                                                <p class="text-muted mb-1 text-truncate"><?php echo $p2Name; ?></p>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->
							
							<div id="p1IncomeOutCome" style="height: 370px; width: 100%;"></div>
							<div id="chart_div" style="height: 300px; width: 100%;"></div>
							
						</div>
						<br>

						<div class="row">
                            <div class="col-xl-4">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-sm bg-warning rounded-circle">
                                                <i class="fe-aperture avatar-title font-22 text-white"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <h3 class="text-dark my-1">$<span data-plugin="counterup">8,145</span></h3>
                                                <p class="text-muted mb-1 text-truncate">Income Status</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4">
                                        <span data-plugin="peity-bar" data-colors="#f7b84b,#ebeff2" data-width="100%" data-height="45">5,3,9,6,5,9,7,3,5,2,9,7,2,1,3,5,2,9,7,2,5,3,9,6,5,9,7</span>
                                    </div>
                                </div> <!-- end card-box-->
                            </div> <!-- end col -->

                            <div class="col-xl-4">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-sm bg-blue rounded-circle">
                                                <i class="fe-shopping-bag avatar-title font-22 text-white"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <h3 class="text-dark my-1"><span data-plugin="counterup">367</span></h3>
                                                <p class="text-muted mb-1 text-truncate">Sales Status</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4 text-center">
                                        <span data-plugin="peity-line" data-fill="#fff" data-stroke="#4a81d4" data-width="100%" data-height="48">5,3,9,6,5,9,7,3,5,2</span>
                                    </div>
                                </div> <!-- end card-box-->
                            </div> <!-- end col -->

                            <div class="col-xl-4">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-sm bg-success rounded-circle">
                                                <i class="fe- fe-bar-chart-2 avatar-title font-22 text-white"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <h3 class="text-dark my-1"><span data-plugin="counterup"></span></h3>
                                                <p class="text-muted mb-1 text-truncate">Money Graph</p>
                                            </div>
                                        </div>
                                    </div>
                     
                                    <div class="mt-4">
                                        <span data-plugin="peity-line" data-fill="#1abc9c" data-stroke="#1abc9c" data-width="100%" data-height="48">
											<?php
											$conn=mysqli_connect("localhost", $username, $password, $db);
											if (mysqli_connect_errno())
											echo "Failed to connect to MySQL: " . mysqli_connect_error();

											$result = mysqli_query($conn,"SELECT p1Money FROM moneyhistory"); 
											while($row = mysqli_fetch_array($result))
											{
											// Array of external databases | ext = external
											$moneyHistory = $row['p1Money'];

											echo "$moneyHistory,";

											}
											echo "$moneyHistory";
											?> 
											</span>
                                    </div>
                                </div> <!-- end card-box 3,5,2,9,7,2,5,3,9,6,5,9,7-->
                            </div> <!-- end col -->

                        </div>
                        <!-- end row -->
						
						
						
						
						
						
						

                        <div class="row">
						
							<!-- Stats from P1 -->
                            <div class="col-xl-4">
                                <div class="card-box">
                                    <h4 class="header-title mb-3" style="color:<?php echo $p1Color; ?>;"><?php echo $p1Name;?>'s Income</h4>

                                    <div class="widget-chart text-center" dir="ltr">
                                        <!--<input data-plugin="knob" data-width="160" data-height="160" data-linecap=round data-fgColor="#f1556c" value="10" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".12"/>-->
                                        <h5 class="text-muted mt-3">Total from <label style="color:<?php echo $p2Color; ?>;"><?php echo $p2Name; ?><label></h5>
                                        <h2>$<?php echo $p1TotalFromP2_Stats; ?></h2>

                                        <!--<p class="text-muted w-75 mx-auto sp-line-2">Traditional heading elements are designed to work best in the meat of your page content.</p>-->

                                        <div class="row mt-3">
                                            <div class="col-4">
                                                <p class="text-muted font-15 mb-1 text-truncate">Pass GO</p>
                                                <h4>$<?php echo $p1PassGO_Stats . '<br>#' . $p1PassGO_Stats/$passGO; ?></h4>
                                            </div>
                                            <div class="col-4">
                                                <p class="text-muted font-15 mb-1 text-truncate">Free Parking</p>
                                                <h4>$<?php echo $p1FreeParking_Stats . '<br>#' . $p1FreeParking_Stats/$freeParking; ?></h4>
                                            </div>
                                            <div class="col-4">
                                                <p class="text-muted font-15 mb-1 text-truncate">From Bank</p>
                                                <h4>$<?php echo $p1TotalFromBank_Stats; ?></h4>
												<!--<h4><i class="fe-arrow-down text-danger mr-1"></i>$15k</h4>-->
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div> <!-- end card-box -->
                            </div> <!-- end col-->
							
							<!-- Stats from P2 -->
							<div class="col-xl-4">
                                <div class="card-box">
                                    <h4 class="header-title mb-3" style="color:<?php echo $p2Color; ?>;"><?php echo $p2Name;?>'s Income</h4>

                                    <div class="widget-chart text-center" dir="ltr">
                                        <!--<input data-plugin="knob" data-width="160" data-height="160" data-linecap=round data-fgColor="#f1556c" value="10" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".12"/>-->
                                        <h5 class="text-muted mt-3">Total from <label style="color:<?php echo $p1Color; ?>;"><?php echo $p1Name; ?><label></h5>
                                        <h2>$<?php echo $p2TotalFromP1_Stats; ?></h2>

                                        <!--<p class="text-muted w-75 mx-auto sp-line-2">Traditional heading elements are designed to work best in the meat of your page content.</p>-->

                                        <div class="row mt-3">
                                            <div class="col-4">
                                                <p class="text-muted font-15 mb-1 text-truncate">Pass GO</p>
                                                <h4>$<?php echo $p2PassGO_Stats . '<br>#' . $p2PassGO_Stats/$passGO; ?></h4>
                                            </div>
                                            <div class="col-4">
                                                <p class="text-muted font-15 mb-1 text-truncate">Free Parking</p>
                                                <h4>$<?php echo $p2FreeParking_Stats . '<br>#' . $p2FreeParking_Stats/$freeParking; ?></h4>
                                            </div>
                                            <div class="col-4">
                                                <p class="text-muted font-15 mb-1 text-truncate">From Bank</p>
                                                <h4>$<?php echo $p2TotalFromBank_Stats; ?></h4>
												<!--<h4><i class="fe-arrow-down text-danger mr-1"></i>$15k</h4>-->
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div> <!-- end card-box -->
                            </div> <!-- end col-->
							

							<!--
                            <div class="col-xl-8">
                                <div class="card-box">
                                    <h4 class="header-title mb-3">Sales Analytics</h4>

                                    <div id="sales-analytics" class="flot-chart mt-4 pt-1" style="height: 375px;"></div>
                                </div>
                            </div>
                        </div>-->
                        <!-- end row -->




                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                2015 - 2019 &copy; UBold theme by <a href="">Coderthemes</a> 
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right footer-links d-none d-sm-block">
                                    <a href="javascript:void(0);">About Us</a>
                                    <a href="javascript:void(0);">Help</a>
                                    <a href="javascript:void(0);">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

		<!-- Right Sidebar -->
        <?php
		include_once 'inc/right_navbar.php';
		?>

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- Plugins js-->
        <script src="assets/libs/flatpickr/flatpickr.min.js"></script>
        <script src="assets/libs/jquery-knob/jquery.knob.min.js"></script>
        <script src="assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="assets/libs/flot-charts/jquery.flot.js"></script>
        <script src="assets/libs/flot-charts/jquery.flot.time.js"></script>
        <script src="assets/libs/flot-charts/jquery.flot.tooltip.min.js"></script>
        <script src="assets/libs/flot-charts/jquery.flot.selection.js"></script>
        <script src="assets/libs/flot-charts/jquery.flot.crosshair.js"></script>

        <!-- Plugins js -->
        <script src="assets/libs/peity/jquery.peity.min.js"></script>

        <!-- App js-->
        <script src="assets/js/app.min.js"></script>
        
    </body>
</html>