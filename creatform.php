<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nanum+Pen+Script" rel="stylesheet">
    <?php
    $Id=$_POST["ID"];
    $Id_check="";
    $mysql=mysqli_connect("localhost","admin","wjsrhkdgh.1","admin");
    $sql="SELECT ID FROM Account WHERE ID='$Id'";
    $result=$mysql->query($sql);
    if($result->num_rows==1){
      $Id="";
      $Id_check="아이디 중복됨.";
      }
      else{$Id_check="";}
    ?>
    <style>
      body,
      html {
        font-family: 'Nanum Pen Script', cursive;
        font-size:50px;
        height: 100%
        margin: 0;
        color: #ffffff;
        background-image: url('https://ncd.nl/wp-content/uploads/2018/05/chalkboard.jpg');
        background-size: 95%;
      }
      input.underline {
        font-family: 'Nanum Pen Script', cursive;
        border:1px solid white;
        border-left-width:0;
        border-right-width:0;
        border-top-width:0;
        border-bottom-width:1;
        margin:10px;color: #ffffff;
        font-size:30px;
        background-color:transparent;
      }
    </style>

  </head>

  <body>
    <h2 style="text-align:center;">Creat Account</h2>
    <form action="creat.php" method="post" style="text-align:left;margin-left:20%; "onchange="activeBtn()">
      ID: <span><input id="Id" name="ID" value="<?php echo $Id;?>" type="text" size="50" class="underline"></span>
      <input type="submit" formaction="<?php echo $_SERVER['PHP_SELF'];?>" value="checkID" style="margin:10px;  color: #ffffff;font-size: 25px; cursor: pointer; background-color:transparent;">
      <span id="id_check"> <?php echo $Id_check;?> </span>
      <br />
      PW: <input id="pw1" name="PW" type="password" size="50" class="underline" onchange="checkpassword()">
      <br />
      PW check:<input id="pw2" type="password" size="50" class="underline" onchange="checkpassword()">
      <p id="check" style="margin:0;padding:0;">
      </p>
      <br />
      Name: <input id="name" name="Name" type="text" size="50" class="underline">
      <br />
      <input id="button" type="submit" value="creat!" style="margin:10px;margin-left:50%;
      color: #ffffff;font-size: 25px; cursor: pointer; background-color:transparent;">
    </form>

  </body>
  <script>
    var Pw1 = document.getElementById('pw1').value;
    var Pw2 = document.getElementById('pw2').value;
    var Id = document.getElementById('Id').value;
    var Name = document.getElementById('name').value;
    var id_check=document.getElementById('id_check').value;
    $('.button').attr('disabled', true);

    function checkpassword() {
      Pw1 = document.getElementById('pw1').value;
      Pw2 = document.getElementById('pw2').value;
      if (Pw1 == Pw2) {
        document.getElementById('check').innerHTML = "확인";
        $('.button').attr('disabled', false);
      } else {
        document.getElementById('check').innerHTML = "다시 시도";
        $('.button').attr('disabled', true);
      }
    }

    function activeBtn() {
      if (!Pw1 || !Pw2 || !Id || !Name || id_check) {
        $('.button').attr('disabled', true);
      } else {
        $('.button').attr('disabled', false);
      }
    }

  </script>

</html>
