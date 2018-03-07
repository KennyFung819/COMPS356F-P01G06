<?php
	require_once('../database.php');
	$aaa = "Insert into Post (Id,Title,Content,Introduction,type,likeNo,DateTime,Image) Values(" ;
$_POST['likeNo']=0;
$_POST['DateTime']=date("Y-m-d G:i:s");

	foreach($_POST as $key => $value){
		if(strcmp('Tag',$key)){
	    $aaa .= "'".$value."',";
		}
	}

	if($_FILES['Image']['tmp_name']){
	$aaa .= "'" .addslashes(file_get_contents($_FILES['Image']['tmp_name']))."');";
	}else{
		$aaa .="'');";
	}
	$sth = $conn->prepare($aaa);
	echo $aaa;
    print_r($sth->execute());

		//Inserting tags to database
$tag=explode(' ',$_POST['Tag']);
foreach($tag as $element){
		$sql = "Insert into Tag values ('".$_POST['Id']."','".$element."');";
		$sql = $conn->prepare($sql);
		print_r($sql->execute());
}


	header('Location: addpost.php');

?>
