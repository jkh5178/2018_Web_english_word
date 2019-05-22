
<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Pen+Script" rel="stylesheet">
    <?php
    session_start();
    $Word_no=$_POST['key'];
    $mysql=mysqli_connect("localhost","admin","wjsrhkdgh.1","admin");
    $sql="SELECT * FROM WORD WHERE No= '$Word_no'";
    $result=$mysql->query($sql);
    $row=$result->fetch_array(MYSQLI_ASSOC);
    $word=$row['word'];
    $mean=$row['mean'];
    $sorce=$row['sorce'];
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

    </style>
  </head>

  <body>
    <table style="width:100% ;height:100%">
      <tr style="height:20%">
        <td style="width:15%;padding:20px">
          <h1 name="id"><?php echo $_SESSION['name'] ; ?></h1>
          <p style="font-size : 120%">학습시작일 : <strong name="startday"><?php echo $_SESSION['startday'] ; ?></strong></p>
        </td>
        <td style="width:5%" style="text-align:center; font-size:50px;">
          <a href="wordnotelist.php" style="text-decoration: none;color: #ffffff;"> 뒤로 가기 </a>
        </td>
        <td colspan="4">
          학습일 : <?php echo $_SESSION['studycount']?> 일(평균 학습일:<?php echo $_SESSION['avrstudy']?>일)
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
        <td colspan="2" style="width:40%">
          <img id="wordimg" src="" style="height:200px; width:200px; margin-left: 50px" />
        </td>
        <td colspan="3">
          <h2 id="English_word" style="font-size:70px">English word</h2>
          <h2 id="korean" style="font-size:60px">한국어 뜻</h2>
        </td>
      </tr>
      <tr style="height:10%">
        <td>

        </td>
        <td colspan="3">
          <form class="" action="delword.php" method="post">
            <input type="hidden" id="wordnum" readOnly="true"  name="wordnum" value=""/>
            <input id="button" type="submit" value="암기 완료" style="margin:10px;margin-left:50%;
            color: #ffffff;font-size: 25px; cursor: pointer; background-color:transparent;">
          </form>
        </td>
        <td style="width:5%">

        </td>

      </tr>
    </table>
  </body>

</html>
<script>
var img=<?= json_encode($sorce) ?>;
var english=<?= json_encode($word) ?>;
var korean=<?= json_encode($mean) ?>;
var key=<?= json_encode($Word_no) ?>;
document.getElementById('wordnum').value=key;
document.getElementById('wordimg').src = img;
document.getElementById('English_word').innerHTML = english;
document.getElementById('korean').innerHTML = korean;
</script>
