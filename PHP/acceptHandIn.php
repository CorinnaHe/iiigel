<?php   

 include_once("database.php");
 $currentGroupID = $_GET['groupID'];
 $currentTnID = $_GET['tnID'];


  $ODB->acceptHandIn($currentTnID,$currentGroupID) ;
  $ODB->setFortschrittFromUserinGroup($currentTnID,$currentGroupID); 
  header("Refresh:0"); 
?>