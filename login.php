  <?php
    session_start();
    $Id=$_POST["ID"];
    $password = $_POST["PW"];
    $mysql=mysqli_connect("localhost","admin","wjsrhkdgh.1","admin");
    $t=date("Y-m-d",time());
    $check="SELECT * FROM Account WHERE ID='$Id' ";
    $result=$mysql->query($check);
    if($result->num_rows==1){
      $row=$result->fetch_array(MYSQLI_ASSOC);
      if($row['PW']==$password){
        $_SESSION['ID']=$Id;
        $_SESSION['name']=$row['name'];
        $_SESSION['startday']=$row['startday'];
        $_SESSION['wordcount']=0;
        $count=$row['studycount'];
        if(isset($_SESSION['ID'])){
          if($row['lastaccessday']!=$t){
          $count=$count+1;
          $sql = "UPDATE Account SET studycount='$count' WHERE ID='$Id' ";
          $mysql->query($sql);
          $sql = "UPDATE Account SET lastaccessday='$t' WHERE ID='$Id' ";
          $mysql->query($sql);}
          $_SESSION['studycount']=$count;

          $sql="SELECT AVG(`studycount`) FROM `Account`";
          $result=$mysql->query($sql);
          $row=$result->fetch_array(MYSQLI_ASSOC);
          $_SESSION['avrstudy']=(int)$row['AVG(`studycount`)'];

          echo "성공";
          header('Location: start.php');
        }
        else{echo "저장실패";}
      }
      else{echo "계정 확인";
      header('Location: index.html');}
    }
    else{echo "계정 확인";
    header('Location: index.html');}

   ?>
