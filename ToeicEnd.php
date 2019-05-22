﻿
<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nanum+Pen+Script" rel="stylesheet">
    <?php
    session_start();
    $mysql=mysqli_connect("localhost","admin","wjsrhkdgh.1","admin");
    $No=(explode(",",$_POST["A_num"]));
    $num=$_POST["num"];
    $Id=$_SESSION['ID'];
    $rank=array();
    for($i=0;$i<$num;$i++){
      $no=$No[$i];
      $check="SELECT * FROM TOEIC_Q WHERE No='$no' ";
      $result=$mysql->query($check);
      $row=$result->fetch_array(MYSQLI_ASSOC);
      $count=$row['Answer_Count']+1;
      $sql = "UPDATE TOEIC_Q SET Answer_Count='$count' WHERE No='$no' ";
      $mysql->query($sql);
      $sql = "UPDATE Account SET toeicgamebest='$num' WHERE Id='$Id' ";
      $mysql->query($sql);
    }
    $sql="SELECT ID FROM TOEIC_RANK WHERE Id='$Id'";
    $result=$mysql->query($sql);
    if($result->num_rows==1){
      $sql="UPDATE TOEIC_RANK SET Score='$num' WHERE Id='$Id' ";
      $mysql->query($sql);
    }
    else{
    $sql="INSERT INTO TOEIC_RANK(Id, Score) VALUES ('$Id', '$num')";
    $mysql->query($sql);}

    $sql="SELECT * FROM TOEIC_RANK ORDER BY Score DESC";
    $result=$mysql->query($sql);
    $i=0;
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          if($i<5){
            $rank[$i]=$row["Id"];
            $i=$i+1;
            }
          else{
              break;
          }
        }
    } else {
        echo "0 results";
    }
    ?>
    <style>
      body,
      html {
        font-family: 'Nanum Pen Script', cursive;

        height: 100%;
        margin: 0;
        color: #ffffff;
        background-image: url('https://ncd.nl/wp-content/uploads/2018/05/chalkboard.jpg');
        background-size: 95%;
      }

      table,
      th,
      td {
        border-collapse: collapse;
      }

      table#data {
        border-collapse: collapse;
        width: 100%;
      }

      table#data td,
      th {
        border: 1px solid #dddddd;
      }

    </style>
  </head>

  <body>
    <table style="width:100% ;height:100%">
      <tr style="height:20%">
        <td style="width:15%;padding:20px">
          <h1 name="id"><?php echo $_SESSION['name'] ; ?></h1>
          <p style="font-size : 120%">학습시작일 : <strong name="startday"><?php echo $_SESSION['startday'] ; ?></strong></p>
        </td>
        <td rowspan="2" style="; text-align:center">
          <h1 style="font-size:400%"> <?php echo $num ;?> 문항/10문항</h1>
          <a href="ToeicM.php" style="color: #ffffff;font-size: 40px; cursor: pointer; background-color:transparent;"/>다시풀기</a>

          <form action="makeQuizeform.php">
            <input type="submit" value="문제만들기" style="color: #ffffff;font-size: 40px; cursor: pointer; background-color:transparent;"/>
          </form>

        </td>
      </tr>
      <tr style="text-align:center">
        <td rowspan="2" style="width:15%;vertical-align:top;font-size:30px">
          <ul style="list-style-type: none;margin: 0;padding: 0; font-size:110%;">
            <li><a href="start.php" ; style="text-decoration: none;  color: #ffffff;">MENU</a></li>
            <br>
            <li><a href="wordnotelist.php" ; style="text-decoration: none;color: #ffffff;">나의 단어장</a></li>
            <br>
            <li><a href="ToeicM.php" ; style="text-decoration: none;color: #ffffff;">토익 문제 게임</a></li>
            <br>
            <li><a href="WordGameM.php" ; style="text-decoration: none;color: #ffffff;">단어 맞추기</a></li>
            <br>
            <li><a href="search.php" ; style="text-decoration: none;color: #ffffff;">검색</a></li>
          </ul>
        </td>
      </tr>

      <tr>
        <td style="height:70%">
          <table id="data" style=" font-size: 50px;margin-left:15%;text-align:center;width:70%">
            <tr>
              <th style="width: 10%;">No.</th>
              <th style="width: 90%;">사용자</th>
            </tr>
            <tbody id=recode>

            </tbody>
          </table>
        </td>
      </tr>
    </table>
  </body>
  <script>
  var rank=<?= json_encode($rank) ?>;
  function addrow(No, name) {
    var my_tbody = document.getElementById('recode');
    var row = my_tbody.insertRow(my_tbody.rows.length);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    cell1.innerHTML = No;
    cell2.innerHTML = name;
  }
  for (i = 0; i < 5; i++) {
    addrow(i+1,rank[i]);
  }
  </script>

</html>
