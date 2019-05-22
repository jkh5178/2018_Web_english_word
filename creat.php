<?php
  $Id=$_POST["ID"];
  $password = $_POST["PW"];
  $name = $_POST["Name"];
  $mysql=mysqli_connect("localhost","admin","wjsrhkdgh.1","admin");
  $t=date("Y-m-d",time());
  if($_POST["ID"]==""||$_POST["PW"]==""||$_POST["Name"]==""){
    header('Location: creatform.php');
  }
  else{
  $sql="INSERT INTO Account(ID,PW,name,startday) VALUES('$Id','$password','$name','$t')";
  if($result=$mysql->query($sql)===true){
    header('Location: index.html');}}
 ?>
