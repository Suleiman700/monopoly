<?php

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
	
	
//Names
$sql='SELECT pName FROM players WHERE pId=0';
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$p1Name=$stmt->fetchColumn();

$sql='SELECT pName FROM players WHERE pId=1';
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$p2Name=$stmt->fetchColumn();

//Colors
$sql='SELECT pColor FROM players WHERE pId=0';
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$p1Color=$stmt->fetchColumn();

$sql='SELECT pColor FROM players WHERE pId=1';
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$p2Color=$stmt->fetchColumn();

//Balance
$sql="SELECT pBal FROM players WHERE pName='$p1Name'";
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$p1Bal=$stmt->fetchColumn();

$sql="SELECT pBal FROM players WHERE pName='$p2Name'";
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$p2Bal=$stmt->fetchColumn();

$sql="SELECT pBal FROM players WHERE pName='Bank'";
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$bankBal=$stmt->fetchColumn();

//Stats

//P1 passGO
$sql="SELECT SUM(amount) FROM trans WHERE toName='$p1Name' AND type='Pass GO'";
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$p1PassGO_Stats=$stmt->fetchColumn();

//P1 land on freeParking
$sql="SELECT SUM(amount) FROM trans WHERE toName='$p1Name' AND type='Free Parking'";
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$p1FreeParking_Stats=$stmt->fetchColumn();

//P1 total from bank
$sql="SELECT SUM(amount) FROM trans WHERE toName='$p1Name' AND fromName='bank'";
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$p1TotalFromBank_Stats=$stmt->fetchColumn();

//P1 total from P2 (rent)
$sql="SELECT SUM(amount) FROM trans WHERE toName='$p1Name' AND fromName='$p2Name' AND type='Rent'";
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$p1TotalFromP2_Stats=$stmt->fetchColumn();

//P1 total from P2 (house)
$sql="SELECT SUM(amount) FROM trans WHERE toName='$p1Name' AND fromName='$p2Name' AND type='House'";
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$p1TotalFromP2_HouseStats=$stmt->fetchColumn();

//P1 total income
$sql="SELECT SUM(amount) FROM trans WHERE toName='$p1Name'";
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$p1TotalIncome=$stmt->fetchColumn();

//P1 total outcome
$sql="SELECT SUM(amount) FROM trans WHERE fromName='$p1Name'";
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$p1TotalOutcome=$stmt->fetchColumn();

//---------------
//P2 passGO
$sql="SELECT SUM(amount) FROM trans WHERE toName='$p2Name' AND type='Pass GO'";
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$p2PassGO_Stats=$stmt->fetchColumn();

//P2 land on freeParking
$sql="SELECT SUM(amount) FROM trans WHERE toName='$p2Name' AND type='Free Parking'";
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$p2FreeParking_Stats=$stmt->fetchColumn();

//P2 total from bank
$sql="SELECT SUM(amount) FROM trans WHERE toName='$p2Name' AND fromName='bank'";
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$p2TotalFromBank_Stats=$stmt->fetchColumn();

//P2 total from P1 (rent)
$sql="SELECT SUM(amount) FROM trans WHERE toName='$p2Name' AND fromName='$p1Name' AND type='Rent'";
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$p2TotalFromP1_Stats=$stmt->fetchColumn();

//P2 total from P1 (house)
$sql="SELECT SUM(amount) FROM trans WHERE toName='$p2Name' AND fromName='$p1Name' AND type='House'";
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$p2TotalFromP1_HouseStats=$stmt->fetchColumn();

//P2 total income
$sql="SELECT SUM(amount) FROM trans WHERE toName='$p2Name'";
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$p2TotalIncome=$stmt->fetchColumn();

//P2 total outcome
$sql="SELECT SUM(amount) FROM trans WHERE fromName='$p2Name'";
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$p2TotalOutcome=$stmt->fetchColumn();





//Stats for right_navbar.php START -----------------

//Total amount bank paid to players
$sql="SELECT SUM(amount) FROM trans WHERE fromName='bank' AND toName='$p1Name' OR toName='$p2Name'";
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$totalBankPaidToPlayers=$stmt->fetchColumn();

//Total amount players spent on rents
$sql="SELECT SUM(amount) FROM trans WHERE type='Rent' OR type='House'";
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$totalPlayersSpentOnRents=$stmt->fetchColumn();

//Total amount players paid to bank
$sql="SELECT SUM(amount) FROM trans WHERE type='bank' AND fromName='$p1Name' OR fromName='$p2Name'";
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$totalPlayersPaidToBank=$stmt->fetchColumn();

//Total amount player 1 paid for rents
$sql="SELECT SUM(amount) FROM trans WHERE fromName='$p1Name' AND type='Rent' OR type='House'";
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$totalP1PaidForRents=$stmt->fetchColumn();

//Total amount player 1 paid for bank
$sql="SELECT SUM(amount) FROM trans WHERE fromName='$p1Name' AND type='bank'";
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$totalP1PaidForBank=$stmt->fetchColumn();

//Total amount player 2 paid for rents
$sql="SELECT SUM(amount) FROM trans WHERE fromName='$p2Name' AND type='Rent' OR type='House'";
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$totalP2PaidForRents=$stmt->fetchColumn();

//Total amount player 2 paid for bank
$sql="SELECT SUM(amount) FROM trans WHERE fromName='$p2Name' AND type='bank'";
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$totalP2PaidForBank=$stmt->fetchColumn();

//Stats for right_navbar.php END -----------------





//Config START -------------------

$sql='SELECT startMoney FROM config';
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$startMoney=$stmt->fetchColumn();

$sql='SELECT passGO FROM config';
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$passGO=$stmt->fetchColumn();

$sql='SELECT freeParking FROM config';
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$freeParking=$stmt->fetchColumn();

$sql='SELECT jail FROM config';
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$jail=$stmt->fetchColumn();

//Config END -------------------





//Stats charts START -------------------

//Used to show/hide charts

//Pie chart
$sql='SELECT showInHome FROM stats WHERE chartName="pie"';
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$isShowPieInHome=$stmt->fetchColumn();

//Money chart
$sql='SELECT showInHome FROM stats WHERE chartName="moneyChart"';
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$isShowMoneyChartinHome=$stmt->fetchColumn();


//Stats charts END -------------------






//Summary
$sql='SELECT COUNT(*) FROM trans';
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$totalTrans=$stmt->fetchColumn();


?>