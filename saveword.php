<?php
session_start();
$_SESSION['wordcount']=$_POST['wordnum'];
$wordid=($_SESSION['studycount']*5)-5+1+$_POST['wordnum'];
$_SESSION['wordcount']=$wordid-2+5-($_SESSION['studycount']*5);
$id=$_SESSION['ID'];
$mysql=mysqli_connect("localhost","admin","wjsrhkdgh.1","admin");
$sql="SELECT * FROM WORD_RECODE WHERE Word_No='$wordid' AND Id='$id'" ;
$result=$mysql->query($sql);
if(($result->num_rows==1)){
  if($_POST['set']==1){
    header('Location: worngWord.php');
  }
  else{header('Location: start.php');}
}
else{
$sql="INSERT INTO WORD_RECODE(Word_No,Id) VALUES('$wordid','$id')";
$mysql->query($sql);
if($_POST['set']==1){
  header('Location: worngWord.php');
}
else{header('Location: start.php');}

}
 ?>
