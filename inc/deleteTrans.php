<?php

include_once 'db.php';

$tId = $_GET['tId']; //Transaction ID
$moneyHistry_TransID = $tId + 1; //moneyhistory id (will be Transaction ID + 1)


//Get names and amount from db based on Transaction ID (tId)
$sql="SELECT fromName FROM trans WHERE tId=$tId";
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$tFromName=$stmt->fetchColumn();

$sql="SELECT toName FROM trans WHERE tId=$tId";
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$tToName=$stmt->fetchColumn();

$sql="SELECT amount FROM trans WHERE tId=$tId";
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$tamount=$stmt->fetchColumn();
//-------------------------------------------------------------------

//Remove money amount from (toName) and add it back to (fromName)
$sql="SELECT pBal FROM players WHERE pName='$tFromName'";
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$fromNewBal=$stmt->fetchColumn();
$fromOriginalBal = $fromNewBal + $tamount;

$sql="SELECT pBal FROM players WHERE pName='$tToName'";
$stmt=$conn->prepare($sql);
$stmt->execute(array());
$toNewBal=$stmt->fetchColumn();
$toOriginalBal = $toNewBal - $tamount;
//-------------------------------------------------------------------

try
{
$sql = "UPDATE players SET pBal='$fromOriginalBal.' WHERE pName='$tFromName'"; //update (fromName) balance
$sql2 = "UPDATE players SET pBal='$toOriginalBal.' WHERE pName='$tToName'"; //update (toName) balance
$sql3 = "DELETE FROM trans WHERE tId=$tId"; //delete transaction from db
$sql4 = "DELETE FROM moneyhistory WHERE id=$moneyHistry_TransID"; //delete moneyhistory (will be Transaction ID + 1)



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
alert('Transaction deleted successfully');
window.location.href='../index.php';
</script>";


} 
catch(PDOException $e)
{
  echo $sql . "<br>" . $e->getMessage();
}

?>