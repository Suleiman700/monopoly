<!-- Right Sidebar -->
        <div class="right-bar">
            <div class="rightbar-title">
                <a href="javascript:void(0);" class="right-bar-toggle float-right">
                    <i class="dripicons-cross noti-icon"></i>
                </a>
                <h5 class="m-0 text-white">Settings</h5>
            </div>
            <div class="slimscroll-menu" style="text-align:center;">
                <!-- User box -->
				<!--
                <div class="user-box">
                    <div class="user-img">
                        <img src="assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme" class="rounded-circle img-fluid">
                        <a href="javascript:void(0);" class="user-edit"><i class="mdi mdi-pencil"></i></a>
                    </div>
            
                    <h5><a href="javascript: void(0);">Geneva Kennedy</a> </h5>
                    <p class="text-muted mb-0"><small>Admin Head</small></p>
                </div>
				-->
				<br>
				<div class="checkbox checkbox-primary mb-2">
						<form action="inc/resetMoney.php" method="post">
							<button type="submit" class="btn btn-dark btn-rounded waves-effect waves-light">Reset Game</button>
						</form>
                    </div>

                <hr class="mt-0" />
                <h5 class="pl-3">All Players Stats</h5>
                <hr class="mb-0" />

				<?php
				echo '<p class="sub-header">Players spent on rents: <code>$'.$totalPlayersSpentOnRents.'</code>';
				echo '<br>Players paid to bank: <code>$'.$totalPlayersPaidToBank.'</code>';
				echo '<br>Bank paid to players: <code>$'.$totalBankPaidToPlayers.'</code></p>';
				?>
				
				
				<!-- P1 Stats -->
				<hr class="mt-0" />
                <h5 class="pl-3" style="color:<?php echo $p1Color; ?>;"><?php echo $p1Name; ?>'s Stats</h5>
                <hr class="mb-0" />

				<?php
				echo '<p class="sub-header">Spent on rents: <code>$'.$totalP1PaidForRents.'</code>
					<br>
					Paid to bank: <code>$'.$totalP1PaidForBank.'</code>
					<br>
					Pass GO: <code>#'.$p1PassGO_Stats/$passGO.'</code>
					<br>
					Free Parking: <code>#'.$p1FreeParking_Stats/$freeParking.'</code></p>';
				?>
				
				<!-- P2 Stats -->
				<hr class="mt-0" />
                <h5 class="pl-3" style="color:<?php echo $p2Color; ?>;"><?php echo $p2Name; ?>'s Stats</h5>
                <hr class="mb-0" />

				<?php
				echo '<p class="sub-header">Spent on rents: <code>$'.$totalP2PaidForRents.'</code>
					<br>
					Paid to bank: <code>$'.$totalP2PaidForBank.'</code>
					<br>
					Pass GO: <code>#'.$p2PassGO_Stats/$passGO.'</code>
					<br>
					Free Parking: <code>#'.$p2FreeParking_Stats/$freeParking.'</code></p>';
				?>
				
				
              

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->