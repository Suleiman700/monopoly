<?php

include_once 'db.php';


$sql='SELECT startMoney FROM config';
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$startMoney=$stmt->fetchColumn();


try
{
$sql = "UPDATE players SET pBal='$startMoney.' WHERE pId='0'";
$sql2 = "UPDATE players SET pBal='$startMoney.' WHERE pId='1'";

//Delete [moneyhistory] table
$sql3 = "DELETE FROM trans";
$sql4 = "DELETE FROM moneyhistory";


  // Prepare statement
  $stmt = $conn->prepare($sql);
  $stmt2 = $conn->prepare($sql2);
  $stmt3 = $conn->prepare($sql3);
  $stmt4 = $conn->prepare($sql4);

  // execute the query
  $stmt->execute();
  $stmt2->execute();
  $stmt3->execute();
  $stmt4->execute();

  // echo a message to say the UPDATE succeeded
  echo "<script>
alert('game reseted successfully');
window.location.href='../index.php';
</script>";


} 
catch(PDOException $e)
{
  echo $sql . "<br>" . $e->getMessage();
}


//After deleting (moneyHistory) table, add row of the 2 players money, used to stats (line chart)
try
{
	include_once 'p1Trans.php';
	//include_once 'p2Trans.php';
	$sql = "INSERT INTO `moneyhistory` (`id`, `p1Money`, `p2Money`, `time`) VALUES (:id,:p1Money,:p2Money,:time);";
	//$sql2 = "INSERT INTO `moneyhistory` (`id`, `pName`, `money`, `time`) VALUES (:id,:pName,:money,:time);";
    $stmt = $conn->prepare($sql);
	//$stmt2 = $conn->prepare($sql2);
    try{
		$stmt->execute(array(':id' => $newMoneyHistory_id, ':p1Money' => $startMoney, ':p2Money' => $startMoney, ':time' => $currentTime));
		//$stmt2->execute(array(':id' => $newMoneyHistory_id+1, ':pName' => $p2Name, ':money' => $startMoney, ':time' => $currentTime));
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
}
catch(PDOException $e)
{
  echo $sql . "<br>" . $e->getMessage();
}
?>