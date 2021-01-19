<?php
ob_start();
session_start();
include_once 'inc/db.php';

if(isset($_POST['clear_logs']))
{
	
	try
	{
	$sql = "DELETE FROM trans";

	  // Prepare statement
	  $stmt = $conn->prepare($sql);

	  // execute the query
	  $stmt->execute();

	  // echo a message to say the UPDATE succeeded
	  echo "<script>alert('All logs cleared');window.location.href='logs.php';</script>";

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
        <title>Logs</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Custom box css -->
        <link href="assets/libs/custombox/custombox.min.css" rel="stylesheet">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

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
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item active">Logs</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Logs</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 


                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-sm-4">
                                                
                                                


                                           

                                                    
                                                


                                                
                                                
                
                                                
                                            </div>
                                            <div class="col-sm-8">
                                                
                                                <div class="text-sm-right">
                                                    
                                                    
                                                    <br>
                                                    
                                                    
													<form method="POST">
														<button type="submit" class="btn btn-success mb-2 mr-1" id="clear_logs" name="clear_logs"><i class="mdi mdi-delete"></i> Clear Logs</button>													
													</form>



                                                    
                                                    
                                                </div>
                                            </div><!-- end col-->
                                        </div>





                                        
<div class="table-responsive" id="leads-list">
	<table id="dtBasicExample" class="table table-centered table-striped">
		<thead>
			<tr>
				<th>From</th>
				<th>To</th>
				<th>Amount</th>
				<th>Type</th>
				<th>Time</th>
			</tr>
		</thead>
		<tbody>
<?php

// Get all sites info	
$conn=mysqli_connect("localhost", $username, $password, $db);
if (mysqli_connect_errno())
echo "Failed to connect to MySQL: " . mysqli_connect_error();

$result = mysqli_query($conn,"SELECT * FROM trans ORDER BY tId DESC"); 
while($row = mysqli_fetch_array($result))
{
    // Array of external databases | ext = external
	$tranId = $row['tId'];
    $fromName = $row['fromName'];
    $toName = $row['toName'];
    $amount = $row['amount'];
    $type = $row['type'];
    $dateTime = $row['dateTime'];
	
	//Get player's color
	if ($fromName == $p1Name)
		$senderColor = $p1Color;
	else if ($fromName == $p2Name)
		$senderColor = $p2Color;
	else if ($fromName == "bank")
		$senderColor = 'black';
	
	if ($toName == $p1Name)
		$receiverColor = $p1Color;
	else if ($toName == $p2Name)
		$receiverColor = $p2Color;
	else if ($toName == "bank")
		$receiverColor = 'black';
?>
<tr>
	<td class="table-user"> 
		<a class="font-weight-semibold" style="color:<?php echo $senderColor; ?>;"><?php echo $fromName; ?></a>
	</td>
	<td>
		<a class="font-weight-semibold" style="color:<?php echo $receiverColor; ?>;"><?php echo $toName; ?></a>
	</td>
	<td>
		<a class="font-weight-semibold" style="color:green;"><?php echo '$ '.$amount; ?></a>
	</td>
	<td>
		<span class="badge bg-soft-success text-success"><?php echo $type; ?></span>
	</td>
	<td>
		<?php echo $dateTime; ?>
	</td>
	<td>
		<a class="nav-link dropdown-toggle  waves-effect waves-light" href="inc/deleteTrans.php?tId=<?php echo $tranId;?>" role="button" aria-haspopup="false" aria-expanded="false">
			<i class="fe-delete noti-icon"></i>
		</a>
	</td>



</tr>

<?php
}
?>
			
		</tbody>
	</table>
</div>
<!-- Logs End-->
                  
        




                                        

                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                        
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

        <!-- Modal -->
        <div id="custom-modal" class="modal-demo">
            <button type="button" class="close" onclick="Custombox.modal.close();">
                <span>&times;</span><span class="sr-only">Close</span>
            </button>
            <h4 class="custom-modal-title">Add New Customers</h4>
            <div class="custom-modal-text text-left">
                <form>
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter full name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="position">Phone</label>
                        <input type="text" class="form-control" id="position" placeholder="Enter phone number">
                    </div>
                    <div class="form-group">
                        <label for="category">Location</label>
                        <input type="text" class="form-control" id="category" placeholder="Enter Location">
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light m-l-10" onclick="Custombox.close();">Cancel</button>
                    </div>
                </form>
            </div>
        </div> 

        <!-- Right Sidebar -->
        <?php
		include_once 'inc/right_navbar.php';
		?>

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- Modal-Effect -->
        <script src="assets/libs/custombox/custombox.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
        
    </body>
</html>

<script>
    
    // search for a specific lead in table, uses url parameters
    /*document.querySelector("button#lead_search_btn").onclick = function(){
        var search_name = $("#lead_search_text").val(); //search field
        var baseurl = window.location.origin+window.location.pathname; //base url
        window.location.replace(baseurl+'?filter_name='+search_name);

    }; */


 
</script>