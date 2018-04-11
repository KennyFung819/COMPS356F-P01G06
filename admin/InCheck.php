<?php
<<<<<<< HEAD
require_once('../database.php');

=======
	require_once('../database.php');

	$aaa = "Insert into Post (Id,Title,Content,Introduction,type,likeNo,DateTime,Image) Values(" ;
>>>>>>> Search(Integrate)
$_POST['likeNo']=0;
$_POST['DateTime']=date("Y-m-d G:i:s");

var_dump($_POST);

/*
'Id' => string '123123123' (length=9)
  'Title' => string 'aaa' (length=3)
  'Content' => string 'bbb' (length=3)
  'Introduction' => string 'cc' (length=2)
  'type' => string 'ddd' (length=3)
  'Tag' => string 'aaaa' (length=4)
  'likeNo' => int 0
  'DateTime' => string '2018-02-28 8:59:58' (length=18)
*/


$stmt = "Insert into Post (Id,Title,Content,Introduction,type,likeNo,DateTime,Image) Values (:Id, :Title, :Content, :Introduction, :type, :Tag, :likeNo, :DateTime)";



foreach($_POST as $key => $value){
	if(strcmp('Tag',$key)){
		$acc .= "'" . $value . "',";
	}
}



if($_FILES['Image']['tmp_name']) {
	$acc .= "'" . addslashes(file_get_contents($_FILES['Image']['tmp_name'])) . "');";
} else {
	$acc .="'');";
}

$sth = $conn->prepare($acc);
//echo $aaa;
print_r($sth->execute());

//Inserting tags to database
$tag=explode(' ',$_POST['Tag']);
foreach($tag as $element){
	$sql = "Insert into Tag values ('".$_POST['Id']."','".$element."');";
	$sql = $conn->prepare($sql);
	print_r($sql->execute());
}


// header('Location: addpost.php');
?>
