<?php

include_once 'inc/db.php';
include_once 'inc/playerInfo.php';



?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Banker | Dashboard</title>
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
                        
                        

                        <div class="row">
                            


						












<div class="col-xl-6">
	<div class="card-box">
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a href="#player1" data-toggle="tab" aria-expanded="true" class="nav-link active">
					<?php echo 'Ja [' . $p1Bal . ']'; ?>
				</a>
			</li>
			<li class="nav-item">
				<a href="#player2" data-toggle="tab" aria-expanded="false" class="nav-link">
					<?php echo 'A7 [' . $p2Bal . ']'; ?>
				</a>
			</li>
			<li class="nav-item">
				<a href="#bank" data-toggle="tab" aria-expanded="false" class="nav-link">
					Bank
				</a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane show active" id="player1">
			
<!-- Fast money input start P1 -->
<style>
div.scrollmenu {
  background-color: ;
  overflow: auto;
  white-space: nowrap;
}

div.scrollmenu a {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px;
  text-decoration: none;
}

div.scrollmenu a:hover {
  background-color: #777;
}
</style>
<script>
function p1_inputValue(value){
	document.getElementById("p1_valueToSend").value= value;
}
function p1_inputValueDecrease(value){
	document.getElementById("p1_valueToSend").value --;
}
function p1_inputValueIncrease(value){
	document.getElementById("p1_valueToSend").value ++;
}

function sendBtnBlueColor()
{
	document.getElementById("p1_sendTo").className = ('btn btn-info py-3');
}
</script>
<body>

<div class="scrollmenu">
  <button class="btn btn-danger" onclick="p1_inputValue(50)">50</button>
  <button class="btn btn-danger" onclick="p1_inputValue(100)">100</button>
  <button class="btn btn-danger" onclick="p1_inputValue(150)">150</button>
  <button class="btn btn-danger" onclick="p1_inputValue(200)">200</button>
  <!--<button class="btn btn-danger" onclick="p1_inputValueDecrease(20)">-1</button>
  <button class="btn btn-danger" onclick="p1_inputValueIncrease(20)">+1</button>-->
</div>
<!-- Fast money input end P1 -->

				<form method="POST" action="inc/p1Trans.php">
					<button type="submit" name="p1_passGO" id="p1_passGO" class="btn btn-danger waves-effect waves-light mt-2"><i class="mdi mdi-cash"></i> Pass Go</button>
					<button type="submit" name="p1_freeParking" id="p1_freeParking" class="btn btn-danger waves-effect waves-light mt-2"><i class="mdi mdi-cash"></i> Free Parking</button>
				</form>
				
			
<br>
<form method="POST" action="inc/p1Trans.php">
	
<div class="radio radio-info form-check-inline btn btn-info">
	<input type="radio" id="inlineRadio1" value="p2" name="p1_sendToPlayer" onClick="showAlert()" checked="">
	<label for="inlineRadio1"> <?php echo $p2Name; ?> </label>
</div>

<div class="radio form-check-inline btn btn-secondary">
<input type="radio" id="inlineRadio2" value="Bank" name="p1_sendToPlayer">
<label for="inlineRadio2"> Bank </label>
</div>


<div class="radio radio-primary form-check-inline">
<input type="radio" id="inlineRadio3" value="Rent" name="p1_sendType" checked="">
<label for="inlineRadio3"> Rent </label>
</div>
<div class="radio radio-primary form-check-inline">
<input type="radio" id="inlineRadio4" value="House" name="p1_sendType">
<label for="inlineRadio4"> House </label>
</div>

<br>

<div class="btn-group-vertical" role="group" aria-label="Basic example">
    <div class="btn-group">
        <input class="text-center form-control-lg mb-2" id="p1_valueToSend" name="p1_valueToSend">
    </div>
    <div class="btn-group">
        <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('p1_valueToSend').value=document.getElementById('p1_valueToSend').value + '1';">1</button>
        <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('p1_valueToSend').value=document.getElementById('p1_valueToSend').value + '2';">2</button>
        <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('p1_valueToSend').value=document.getElementById('p1_valueToSend').value + '3';">3</button>
    </div>
    <div class="btn-group">
        <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('p1_valueToSend').value=document.getElementById('p1_valueToSend').value + '4';">4</button>
        <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('p1_valueToSend').value=document.getElementById('p1_valueToSend').value + '5';">5</button>
        <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('p1_valueToSend').value=document.getElementById('p1_valueToSend').value + '6';">6</button>
    </div>
    <div class="btn-group">
        <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('p1_valueToSend').value=document.getElementById('p1_valueToSend').value + '7';">7</button>
        <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('p1_valueToSend').value=document.getElementById('p1_valueToSend').value + '8';">8</button>
        <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('p1_valueToSend').value=document.getElementById('p1_valueToSend').value + '9';">9</button>
    </div>
    <div class="btn-group">
        <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('p1_valueToSend').value=document.getElementById('p1_valueToSend').value.slice(0, -19);">&lt;</button>
        <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('p1_valueToSend').value=document.getElementById('p1_valueToSend').value + '0';">0</button>
        <button type="submit" class="btn btn-danger py-3" name="p1_sendTo" id="p1_sendTo">Go</button>
		

    </div>
</div>
</form>


				
			</div>
			<div class="tab-pane" id="player2">
			
<!-- Fast money input start P2 -->
<style>
div.scrollmenu {
  background-color: ;
  overflow: auto;
  white-space: nowrap;
}

div.scrollmenu a {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px;
  text-decoration: none;
}

div.scrollmenu a:hover {
  background-color: #777;
}
</style>
<script>
function p2_inputValue(value){
	document.getElementById("p2_valueToSend").value= value;
}

</script>
<body>

<div class="scrollmenu">
  <button class="btn btn-info" onclick="p2_inputValue(50)">50</button>
  <button class="btn btn-info" onclick="p2_inputValue(100)">100</button>
  <button class="btn btn-info" onclick="p2_inputValue(150)">150</button>
  <button class="btn btn-info" onclick="p2_inputValue(200)">200</button>
</div>
<!-- Fast money input end P2 -->

				<form method="POST" action="inc/p2Trans.php">
					<button type="submit" name="p2_passGO" id="p2_passGO" class="btn btn-info waves-effect waves-light mt-2"><i class="mdi mdi-cash"></i> Pass Go</button>
					<button type="submit" name="p2_freeParking" id="p2_freeParking" class="btn btn-info waves-effect waves-light mt-2"><i class="mdi mdi-cash"></i> Free Parking</button>
				</form>
				
<br>
<form method="POST" action="inc/p2Trans.php">
	
<div class="radio radio-info form-check-inline btn btn-danger">
	<input type="radio" id="inlineRadio5" value="p1" name="p2_sendToPlayer" checked="">
	<label for="inlineRadio5"> <?php echo $p1Name; ?> </label>
</div>
<div class="radio form-check-inline btn btn-secondary">
<input type="radio" id="inlineRadio6" value="Bank" name="p2_sendToPlayer">
<label for="inlineRadio6"> Bank </label>
</div>
<br>
<div class="radio radio-primary form-check-inline">
<input type="radio" id="inlineRadio7" value="Rent" name="p2_sendType" checked="">
<label for="inlineRadio7"> Rent </label>
</div>
<div class="radio radio-primary form-check-inline">
<input type="radio" id="inlineRadio8" value="House" name="p2_sendType">
<label for="inlineRadio8"> House </label>
</div>

<br>

<div class="btn-group-vertical" role="group" aria-label="Basic example">
    <div class="btn-group">
        <input class="text-center form-control-lg mb-2" id="p2_valueToSend" name="p2_valueToSend">
    </div>
    <div class="btn-group">
        <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('p2_valueToSend').value=document.getElementById('p2_valueToSend').value + '1';">1</button>
        <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('p2_valueToSend').value=document.getElementById('p2_valueToSend').value + '2';">2</button>
        <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('p2_valueToSend').value=document.getElementById('p2_valueToSend').value + '3';">3</button>
    </div>
    <div class="btn-group">
        <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('p2_valueToSend').value=document.getElementById('p2_valueToSend').value + '4';">4</button>
        <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('p2_valueToSend').value=document.getElementById('p2_valueToSend').value + '5';">5</button>
        <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('p2_valueToSend').value=document.getElementById('p2_valueToSend').value + '6';">6</button>
    </div>
    <div class="btn-group">
        <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('p2_valueToSend').value=document.getElementById('p2_valueToSend').value + '7';">7</button>
        <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('p2_valueToSend').value=document.getElementById('p2_valueToSend').value + '8';">8</button>
        <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('p2_valueToSend').value=document.getElementById('p2_valueToSend').value + '9';">9</button>
    </div>
    <div class="btn-group">
        <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('p2_valueToSend').value=document.getElementById('p2_valueToSend').value.slice(0, -19);">&lt;</button>
        <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('p2_valueToSend').value=document.getElementById('p2_valueToSend').value + '0';">0</button>
        <button type="submit" class="btn btn-info py-3" name="p2_sendTo" id="p2_sendTo">Go</button>
    </div>
</div>
</form>
			</div>
			<div class="tab-pane" id="bank">

<br>


<!-- Fast money input start Bank -->
<style>
div.scrollmenu {
  background-color: ;
  overflow: auto;
  white-space: nowrap;
}

div.scrollmenu a {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px;
  text-decoration: none;
}

div.scrollmenu a:hover {
  background-color: #777;
}
</style>
<script>
function bank_inputValue(value){
	document.getElementById("bank_valueToSend").value= value;
}

</script>
<body>

<div class="scrollmenu">
  <button class="btn btn-secondary" onclick="bank_inputValue(50)">50</button>
  <button class="btn btn-secondary" onclick="bank_inputValue(100)">100</button>
  <button class="btn btn-secondary" onclick="bank_inputValue(150)">150</button>
  <button class="btn btn-secondary" onclick="bank_inputValue(200)">200</button>
</div>
<!-- Fast money input end Bank -->
<br>
<form method="POST" action="inc/bankTrans.php">
	
<div class="radio radio-danger form-check-inline btn btn-danger">
<input type="radio" id="inlineRadio9" value="p1" name="bank_sendToPlayer" checked="">
<label for="inlineRadio9"> <?php echo $p1Name; ?> </label>
</div>
<div class="radio radio-info form-check-inline btn btn-info">
<input type="radio" id="inlineRadio10" value="p2" name="bank_sendToPlayer">
<label for="inlineRadio10"> <?php echo $p2Name; ?> </label>
</div>
<br>

<br>

<div class="btn-group-vertical" role="group" aria-label="Basic example">
    <div class="btn-group">
        <input class="text-center form-control-lg mb-2" id="bank_valueToSend" name="bank_valueToSend">
    </div>
    <div class="btn-group">
        <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('bank_valueToSend').value=document.getElementById('bank_valueToSend').value + '1';">1</button>
        <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('bank_valueToSend').value=document.getElementById('bank_valueToSend').value + '2';">2</button>
        <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('bank_valueToSend').value=document.getElementById('bank_valueToSend').value + '3';">3</button>
    </div>
    <div class="btn-group">
        <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('bank_valueToSend').value=document.getElementById('bank_valueToSend').value + '4';">4</button>
        <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('bank_valueToSend').value=document.getElementById('bank_valueToSend').value + '5';">5</button>
        <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('bank_valueToSend').value=document.getElementById('bank_valueToSend').value + '6';">6</button>
    </div>
    <div class="btn-group">
        <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('bank_valueToSend').value=document.getElementById('bank_valueToSend').value + '7';">7</button>
        <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('bank_valueToSend').value=document.getElementById('bank_valueToSend').value + '8';">8</button>
        <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('bank_valueToSend').value=document.getElementById('bank_valueToSend').value + '9';">9</button>
    </div>
    <div class="btn-group">
        <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('bank_valueToSend').value=document.getElementById('bank_valueToSend').value.slice(0, -19);">&lt;</button>
        <button type="button" class="btn btn-outline-secondary py-3" onclick="document.getElementById('bank_valueToSend').value=document.getElementById('bank_valueToSend').value + '0';">0</button>
        <button type="submit" class="btn btn-secondary py-3" name="bank_sendTo" id="bank_sendTo">Go</button>
    </div>
</div>
</form>


			</div>
		</div>
	</div> <!-- end card-box-->
</div>
							
							
						
					


							
<!-- Stats Start-->
<!--
<div class="col-xl-6">
<div class="card-box">
	<h4 class="header-title mb-4">Players Stats</h4>

	<ul class="nav nav-pills navtab-bg nav-justified">
		<li class="nav-item">
			<a href="#home1" data-toggle="tab" aria-expanded="false" class="nav-link btn-danger active">
				<?php echo $p1Name; ?>
			</a>
		</li>
		<li class="nav-item">
			<a href="#profile1" data-toggle="tab" aria-expanded="true" class="nav-link btn-info">
				<?php echo $p2Name; ?>
			</a>
		</li>
		<li class="nav-item">
			<a href="#messages1" data-toggle="tab" aria-expanded="false" class="nav-link">
				Bank
			</a>
		</li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="home1">
			<a class="font-weight-semibold" style="color:<?php echo $p1Color; ?>;">Pass GO: $<?php echo $p1PassGO_Stats . ' | #' . $p1PassGO_Stats/$passGO; ?></a>
			<br>
			<a class="font-weight-semibold" style="color:<?php echo $p1Color; ?>;">Free Parking: $<?php echo $p1FreeParking_Stats . ' | #' . $p1FreeParking_Stats/$freeParking; ?></a>
			<br>
			<a class="font-weight-semibold" style="color:<?php echo $p1Color; ?>;">Total From <?php echo $p2Name; ?>: $<?php echo $p1TotalFromP2_Stats; ?></a>
			<br>
			<a class="font-weight-semibold" style="color:<?php echo $p1Color; ?>;">Total From Bank: $<?php echo $p1TotalFromBank_Stats; ?></a>
			
			

		
		</div>
		<div class="tab-pane show" id="profile1">
			<p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
			<p class="mb-0">Vakal text here dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
		</div>
		<div class="tab-pane" id="messages1">
			<p>Vakal text here dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
			<p class="mb-0">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
		</div>
	</div>
</div>
-->
<!-- end card-box-->
                            </div>
							
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


<?php
 
$dataPoints = array(
	array("label"=> "Rent", "y"=> $p1TotalFromP2_Stats),
	array("label"=> "House", "y"=> $p1TotalFromP2_HouseStats),
	array("label"=> "freeP", "y"=> $p1FreeParking_Stats),
	array("label"=> "GO", "y"=> $p1PassGO_Stats)
);

$dataPoints2 = array(
	array("label"=> "Rent", "y"=> $p2TotalFromP1_Stats),
	array("label"=> "House", "y"=> $p2TotalFromP1_HouseStats),
	array("label"=> "freeP", "y"=> $p2FreeParking_Stats),
	array("label"=> "GO", "y"=> $p2PassGO_Stats)
);


	
?>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	theme: "dark2",
	animationEnabled: false,
	title: {
		text: "<?php echo $p1Name; ?>'s Income"
	},
	data: [{
		type: "pie",
		indexLabel: "{label} - {y}",
		yValueFormatString: "$#,##0\"\"",
		indexLabelPlacement: "inside",
		indexLabelFontColor: "#36454F",
		indexLabelFontSize: 10,
		indexLabelFontWeight: "bolder",
		showInLegend: false,
		legendText: "{label}",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});


var chart2 = new CanvasJS.Chart("chartContainer2", {
	theme: "dark2",
	animationEnabled: false,
	title: {
		text: "<?php echo $p2Name; ?>'s Income"
	},
	data: [{
		type: "pie",
		indexLabel: "{label} - {y}",
		yValueFormatString: "$#,##0\"\"",
		indexLabelPlacement: "inside",
		indexLabelFontColor: "#36454F",
		indexLabelFontSize: 10,
		indexLabelFontWeight: "bolder",
		showInLegend: false,
		legendText: "{label}",
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	}]
});




chart.render();
chart2.render();

}
</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<?php

if ($isShowPieInHome == "yes")
{?>
	<div id="chartContainer" style="height: 370px; width: 100%;"></div>
	<div id="chartContainer2" style="height: 370px; width: 100%;"></div><?php
}
if ($isShowMoneyChartinHome == "yes")
{?>
	<div id="chart_div" style="height: 300px; width: 100%;"></div><?php
}
?>











<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawLogScales);

function drawLogScales() {
      var data = new google.visualization.DataTable();
      data.addColumn('number', 'X');
      data.addColumn('number', '<?php echo $p1Name; ?>');
      data.addColumn('number', '<?php echo $p2Name; ?>');

      data.addRows([
	  
		<?php
		$conn=mysqli_connect("localhost", $username, $password, $db);
		if (mysqli_connect_errno())
		echo "Failed to connect to MySQL: " . mysqli_connect_error();

		$result = mysqli_query($conn,"SELECT * FROM moneyhistory"); 
		while($row = mysqli_fetch_array($result))
		{
			// Array of external databases | ext = external
			$historyID = $row['id'];
			$historyP1Money = $row['p1Money'];
			$historyP2Money = $row['p2Money'];
			$historyTime = $row['time'];
			
			$timestamp = date("g.i",strtotime($historyTime));
			
			echo "[$historyID, $historyP1Money, $historyP2Money],";
			
		}
		?>
      ]);

      var options = {
        hAxis: {
          title: 'id',
          logScale: false
        },
        vAxis: {
          title: 'Money',
          logScale: false
        },
        colors: ['<?php echo $p1Color; ?>', '<?php echo $p2Color; ?>']
      };

      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
</script>





<p>Last 10 transactions</p>
<!-- Logs Start-->
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

$result = mysqli_query($conn,"SELECT * FROM trans ORDER BY tId DESC LIMIT 10"); 
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

        <!-- Plugins js-->
        <script src="assets/libs/flatpickr/flatpickr.min.js"></script>
        <script src="assets/libs/jquery-knob/jquery.knob.min.js"></script>
        <script src="assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="assets/libs/flot-charts/jquery.flot.js"></script>
        <script src="assets/libs/flot-charts/jquery.flot.time.js"></script>
        <script src="assets/libs/flot-charts/jquery.flot.tooltip.min.js"></script>
        <script src="assets/libs/flot-charts/jquery.flot.selection.js"></script>
        <script src="assets/libs/flot-charts/jquery.flot.crosshair.js"></script>

        <!-- Dashboar 1 init js-->
        <script src="assets/js/pages/dashboard-1.init.js"></script>

        <!-- Plugins js -->
        <script src="assets/libs/peity/jquery.peity.min.js"></script>



        <!-- App js-->
        <script src="assets/js/app.min.js"></script>

        
    </body>
</html>