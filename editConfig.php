<?php

include_once 'inc/db.php';






if(isset($_POST['save']))
{
	$set_startMoney = $_POST["startMoney"];
	$set_passGO = $_POST["passGO"];
	$set_freeParking = $_POST["freeParking"];
	$set_jail = $_POST["jail"];

	try
	{
	$sql = "UPDATE config SET startMoney='.$set_startMoney.', passGO='.$set_passGO.', freeParking='.$set_freeParking.', jail='.$set_jail.'";

	  // Prepare statement
	  $stmt = $conn->prepare($sql);

	  // execute the query
	  $stmt->execute();

	  // echo a message to say the UPDATE succeeded
	  echo "<script>
	alert('Config Updated');
	window.location.href='editConfig.php';
	</script>";

	} 
	catch(PDOException $e)
	{
	  echo $sql . "<br>" . $e->getMessage();
	}
}



else if(isset($_POST['showPieInHome']))
{
	editCharts('pie', 'yes');
}
else if(isset($_POST['hidePieInHome']))
{
	editCharts('pie', 'no');
}

else if(isset($_POST['showMoneyChartInHome']))
{
	editCharts('moneyChart', 'yes');
}
else if(isset($_POST['hideMoneyChartInHome']))
{
	editCharts('moneyChart', 'no');
}

function editCharts($chartName, $chartShowStat)
{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "monopoly";
	$conn = null;
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	   //echo "Connected successfully";
		}
	catch(PDOException $e)
		{
		echo "Connection failed: " . $e->getMessage();
		}

	try
	{
	$sql = "UPDATE stats SET showInHome='$chartShowStat' WHERE chartName='$chartName'";

	  // Prepare statement
	  $stmt = $conn->prepare($sql);

	  // execute the query
	  $stmt->execute();

	  // echo a message to say the UPDATE succeeded
	  echo "<script>
	alert('Config Updated');
	window.location.href='editConfig.php';
	</script>";

	} 
	catch(PDOException $e)
	{
	  echo $sql . "<br>" . $e->getMessage();
	}
}

?>

<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Edit Config</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">



            <?php
			include_once 'inc/top_navbar.php';
			include_once 'inc/side_navbar.php';
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
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item active">Edit Config</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Edit Config</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">


                            <div class="col-lg-8 col-xl-8">
                                <div class="card-box">
                                    <ul class="nav nav-pills navtab-bg nav-justified">
                                        <li class="nav-item">
                                        </li>
                                    </ul>
                                    <div class="tab-content">


                                        <div class="tab-pane show active" id="settings">
                                            <form method="POST">
                                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-settings mr-1"></i> Edit Game Config</h5>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="firstname">Start Money</label>
                                                            <input type="text" pattern="[0-9.]+" class="form-control" id="startMoney" name="startMoney" value="<?php echo $startMoney; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="lastname">Pass GO</label>
                                                            <input type="text" pattern="[0-9.]+" class="form-control" id="passGO" name="passGO" value="<?php echo $passGO; ?>">
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->

												<div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="firstname">Free Parking</label>
                                                            <input type="text" pattern="[0-9.]+" class="form-control" id="freeParking" name="freeParking" value="<?php echo $freeParking; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="lastname">Jail</label>
                                                            <input type="text" pattern="[0-9.]+" class="form-control" id="jail" name="jail" value="<?php echo $jail; ?>">
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->
												
                                                
                                                <div class="text-right">
                                                    <button type="submit" name="save" id="save" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- end settings content-->
                                    </div> <!-- end tab-content -->
									
									
									<!-- charts settings start -->
									<div class="tab-content">
									
                                        <div class="tab-pane show active" id="settings">
                                            <form method="POST">
                                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-settings mr-1"></i> Edit Game Charts</h5>
                                                <div class="row">
                                                    <div class="col-md-6">
													
                                                        <div class="custom-control">
															<label for="lastname">Pie In Home <code><?php echo $isShowPieInHome; ?></code></label>
															<br>
															<?php
																if ($isShowPieInHome == "yes")
																{?>
																	<button type="submit" id="hidePieInHome" name="hidePieInHome" class="btn btn-danger btn-rounded waves-effect waves-light">
																		<span class="btn-label"><i class="mdi mdi-close-circle-outline"></i></span>Hide
																	</button><?php
																}
																else
																{?>
																	<button type="submit" id="showPieInHome" name="showPieInHome" class="btn btn-success btn-rounded waves-effect waves-light">
																		<span class="btn-label"><i class="mdi mdi-check-all"></i></span>Show
																	</button><?php
																}
															
															?>
														</div>
														
														
														
                                                    </div>
													<br><br><br><br>
                                                    <div class="col-md-6">
                                                        
														<div class="custom-control">
															<label for="lastname">Money Chart In Home <code><?php echo $isShowMoneyChartinHome; ?></code></label>
															<br>
															<?php
																if ($isShowMoneyChartinHome == "yes")
																{?>
																	<button type="submit" id="hideMoneyChartInHome" name="hideMoneyChartInHome" class="btn btn-danger btn-rounded waves-effect waves-light">
																		<span class="btn-label"><i class="mdi mdi-close-circle-outline"></i></span>Hide
																	</button><?php
																}
																else
																{?>
																	<button type="submit" id="showMoneyChartInHome" name="showMoneyChartInHome" class="btn btn-success btn-rounded waves-effect waves-light">
																		<span class="btn-label"><i class="mdi mdi-check-all"></i></span>Show
																	</button><?php
																}
															
															?>
														</div>
														
														
                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->

												<div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="firstname">Free Parking</label>
                                                            <input type="text" pattern="[0-9.]+" class="form-control" id="freeParking" name="freeParking" value="<?php echo $freeParking; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="lastname">Jail</label>
                                                            <input type="text" pattern="[0-9.]+" class="form-control" id="jail" name="jail" value="<?php echo $jail; ?>">
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->
												
                                                
                                                <div class="text-right">
                                                    <button type="submit" name="saveCharts" id="saveCharts" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- end settings content-->
                                    </div> <!-- end tab-content -->
									<!-- charts settings end -->
									
									
									
                                </div> <!-- end card-box-->

                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->

                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                2021 &copy; Monopoly system by <a href="https://www.nicurb.com">Suleiman | NiCurb</a> 
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right footer-links d-none d-sm-block">
                                    <a href="mailto:soleman630@gmail.com">Contact Me</a>
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

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

    </body>

</html>