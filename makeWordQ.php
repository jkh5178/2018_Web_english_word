<?php
session_start();
$mysql=mysqli_connect("localhost","admin","wjsrhkdgh.1","admin");
$sql="SELECT * FROM WORD";
$result=$mysql->query($sql);
$num=$result->num_rows;
$rnum=mt_rand(1,$result->num_rows);
$_SESSION['Qnum']=array(($rnum+3)%$num,($rnum+6)%$num,
($rnum+9)%$num,($rnum+12)%$num,($rnum+15)%$num,($rnum+18)%$num,($rnum+21)%$num,($rnum+14)%$num,($rnum+27)%$num,($rnum)%$num);
header('Location: WordGameQ.php');
?>
