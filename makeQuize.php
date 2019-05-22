<?php
  $question=$_POST["q"];
  $a1 = $_POST["a1"];
  $a2 = $_POST["a2"];
  $a3 = $_POST["a3"];
  $a4 = $_POST["a4"];
  $A = $_POST["a"];
  $mysql=mysqli_connect("localhost","admin","wjsrhkdgh.1","admin");

  if($question==""||$a1==""||$a2==""||$a3==""||$a4==""||$A==""){
    header('Location: makeQuizeform.php');
  }
  else{
  $sql="INSERT INTO TOEIC_Q(Q,A,B,C,D,ANSWER) VALUES('$question','$a1','$a2','$a3','$a4','$A')";
  if($result=$mysql->query($sql)===true){
    header('Location: ToeicEnd.php');}}
 ?>
