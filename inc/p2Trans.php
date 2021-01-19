<?php

include_once 'db.php';

$bankName = 'bank';
$passGOName = 'Pass GO';
$freeParkingName = 'Free Parking';

//Find lowest id that does not exist in database [trans]
$sql = "SELECT tId+1 FROM `trans` WHERE (tId+1) not in (SELECT tId FROM `trans`) limit 1";
$stmt = $conn->prepare($sql);
$stmt->execute(array());
$new_tId = $stmt->fetchColumn();

//Find lowest id that does not exist in database [moneyhistory]
$sql = "SELECT id+1 FROM `moneyhistory` WHERE (id+1) not in (SELECT id FROM `moneyhistory`) limit 1";
$stmt = $conn->prepare($sql);
$stmt->execute(array());
$newMoneyHistory_id = $stmt->fetchColumn();

$currentTime = date("H:i:s");

function playMoneySound()
{

	$myAudioFile = "../assets/money.wav";
	echo '<audio autoplay="true" style="display:none;">
		<source src="'.$myAudioFile.'" type="audio/wav">
		</audio>';
}

playMoneySound();

	
if(isset($_POST['p2_passGO']))
{
	$newBal = $p2Bal + $passGO;
	try{
	$sql = "UPDATE players SET pBal='.$newBal.' WHERE pId='1'";

	  // Prepare statement
	  $stmt = $conn->prepare($sql);

	  // execute the query
	  $stmt->execute();

	  // echo a message to say the UPDATE succeeded
	  //echo "<script>alert('$bankName ($$passGO) => $p2Name');window.location.href='../index.php';</script>";
	  echo "<script>window.location.href='../index.php';</script>";

	} 
	catch(PDOException $e){
	  echo $sql . "<br>" . $e->getMessage();
	}

    $sql = "INSERT INTO `trans` (`tId`, `fromName`, `toName`, `amount`, `type`, `dateTime`) VALUES (:tId,:fromName,:toName,:amount,:type,:dateTime);";
    $stmt = $conn->prepare($sql);
    try{
    $stmt->execute(array(':tId' => $new_tId, ':fromName' => $bankName, ':toName' => $p2Name, ':amount' => $passGO, ':type' => $passGOName, ':dateTime' => $currentTime));
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
	
	//Add money history
	$sql = "INSERT INTO `moneyhistory` (`id`, `p1Money`, `p2Money`, `time`) VALUES (:id,:p1Money,:p2Money,:time);";
    $stmt = $conn->prepare($sql);
    try{
		$stmt->execute(array(':id' => $newMoneyHistory_id, ':p1Money' => $p1Bal, ':p2Money' => $newBal, ':time' => $currentTime));
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
	
	
}


	
else if(isset($_POST['p2_freeParking']))
{
	$newBal = $p2Bal + $freeParking;
	try{
	$sql = "UPDATE players SET pBal='.$newBal.' WHERE pId='1'";

	  // Prepare statement
	  $stmt = $conn->prepare($sql);

	  // execute the query
	  $stmt->execute();

	  // echo a message to say the UPDATE succeeded
	echo "<script>window.location.href='../index.php';</script>";
	} 
	catch(PDOException $e){
	  echo $sql . "<br>" . $e->getMessage();
	}
	
	$sql = "INSERT INTO `trans` (`tId`, `fromName`, `toName`, `amount`, `type`, `dateTime`) VALUES (:tId,:fromName,:toName,:amount,:type,:dateTime);";
    $stmt = $conn->prepare($sql);
    try{
    $stmt->execute(array(':tId' => $new_tId, ':fromName' => $bankName, ':toName' => $p2Name, ':amount' => $freeParking, ':type' => $freeParkingName, ':dateTime' => $currentTime));
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
	
	//Add money history
	$sql = "INSERT INTO `moneyhistory` (`id`, `p1Money`, `p2Money`, `time`) VALUES (:id,:p1Money,:p2Money,:time);";
    $stmt = $conn->prepare($sql);
    try{
		$stmt->execute(array(':id' => $newMoneyHistory_id, ':p1Money' => $p1Bal, ':p2Money' => $newBal, ':time' => $currentTime));
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
}


else if(isset($_POST['p2_sendTo']))
{
	$sendTo = $_POST["p2_sendToPlayer"]; //player 1 or bank
	$sendType = $_POST["p2_sendType"]; //send type (Rent or House)
	$valueToSend = $_POST["p2_valueToSend"]; //money amount
	
	if ($sendTo == 'p1') //player 1
	{
		$newP2Bal = $p2Bal - $valueToSend;
		$newP1Bal = $p1Bal + $valueToSend;
		
		try{
			$sql = "UPDATE players SET pBal='.$newP2Bal.' WHERE pId='1'";
			$sql2 = "UPDATE players SET pBal='.$newP1Bal.' WHERE pId='0'";
		

		  // Prepare statement
		  $stmt = $conn->prepare($sql);
		  $stmt2 = $conn->prepare($sql2);

		  // execute the query
		  $stmt->execute();
		  $stmt2->execute();

		  // echo a message to say the UPDATE succeeded
		  echo "<script>window.location.href='../index.php';</script>";

		} 
		catch(PDOException $e){
		  echo $sql . "<br>" . $e->getMessage();
		}
		
		$sql = "INSERT INTO `trans` (`tId`, `fromName`, `toName`, `amount`, `type`, `dateTime`) VALUES (:tId,:fromName,:toName,:amount,:type,:dateTime);";
		$stmt = $conn->prepare($sql);
		try{
		$stmt->execute(array(':tId' => $new_tId, ':fromName' => $p2Name, ':toName' => $p1Name, ':amount' => $valueToSend, ':type' => $sendType, ':dateTime' => $currentTime));
		}
		catch(PDOException $e)
		{
			echo "Connection failed: " . $e->getMessage();
		}
		
		//Add money history
		$sql = "INSERT INTO `moneyhistory` (`id`, `p1Money`, `p2Money`, `time`) VALUES (:id,:p1Money,:p2Money,:time);";
		$stmt = $conn->prepare($sql);
		try{
			$stmt->execute(array(':id' => $newMoneyHistory_id, ':p1Money' => $newP1Bal, ':p2Money' => $newP2Bal, ':time' => $currentTime));
		}
		catch(PDOException $e)
		{
			echo "Connection failed: " . $e->getMessage();
		}

	}
	else if ($sendTo == 'Bank') //player 2 id
	{
		$newP2Bal = $p2Bal - $valueToSend;
		$newBankBal = $bankBal + $valueToSend;
		
		try{
		$sql = "UPDATE players SET pBal='.$newP2Bal.' WHERE pId='1'";
		$sql2 = "UPDATE players SET pBal='.$newBankBal.' WHERE pId='2'";

		  // Prepare statement
		  $stmt = $conn->prepare($sql);
		  $stmt2 = $conn->prepare($sql2);

		  // execute the query
		  $stmt->execute();
		  $stmt2->execute();

		  // echo a message to say the UPDATE succeeded
		  echo "<script>window.location.href='../index.php';</script>";

		} 
		catch(PDOException $e){
		  echo $sql . "<br>" . $e->getMessage();
		}
		
		$sql = "INSERT INTO `trans` (`tId`, `fromName`, `toName`, `amount`, `type`, `dateTime`) VALUES (:tId,:fromName,:toName,:amount,:type,:dateTime);";
		$stmt = $conn->prepare($sql);
		try{
		$stmt->execute(array(':tId' => $new_tId, ':fromName' => $p2Name, ':toName' => $bankName, ':amount' => $valueToSend, ':type' => $bankName, ':dateTime' => $currentTime));
		}
		catch(PDOException $e)
		{
			echo "Connection failed: " . $e->getMessage();
		}
		
		//Add money history
		$sql = "INSERT INTO `moneyhistory` (`id`, `p1Money`, `p2Money`, `time`) VALUES (:id,:p1Money,:p2Money,:time);";
		$stmt = $conn->prepare($sql);
		try{
			$stmt->execute(array(':id' => $newMoneyHistory_id, ':p1Money' => $p1Bal, ':p2Money' => $newP2Bal, ':time' => $currentTime));
		}
		catch(PDOException $e)
		{
			echo "Connection failed: " . $e->getMessage();
		}
	}
	
}
?>