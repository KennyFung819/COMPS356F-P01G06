<?php
	require_once('../database.php');
	$aaa = "Delete from Post where Id = ".$_GET["Id"];
	echo $aaa;
	$sth = $conn->prepare($aaa);
    print_r($sth->execute());
    header('Location: post.php');
    
    
?>
  