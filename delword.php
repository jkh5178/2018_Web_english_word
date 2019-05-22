<?php
session_start();
$Word_no=$_POST['wordnum'];
$id=$_SESSION['ID'];
echo $Word_no ;
echo $id;
$mysql=mysqli_connect("localhost","admin","wjsrhkdgh.1","admin");
$sql="DELETE FROM WORD_RECODE WHERE Word_no = '$Word_no' AND Id='$id'";
$mysql->query($sql);
header('Location: wordnotelist.php');
 ?>
