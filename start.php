
<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Pen+Script" rel="stylesheet">
    <?php
    session_start();
    $mysql=mysqli_connect("localhost","admin","wjsrhkdgh.1","admin");
    $word=array();
    $mean=array();
    $sorce=array();
    $j=0;
    $wordcount=$_SESSION['wordcount']%5;
    for($i=($_SESSION['studycount']*5)-5+2;$i<($_SESSION['studycount']*5)+2;$i++){
      $sql="SELECT * FROM WORD WHERE No='$i'";
      $result=$mysql->query($sql);
      if($result->num_rows==1){
        $row=$result->fetch_array(MYSQLI_ASSOC);
        $word[$j]=$row['word'];
        $mean[$j]=$row['mean'];
        $sorce[$j]=$row['sorce'];
      }
      $j=$j+1;
    }
    $_SESSION['word']=$word;
    $_SESSION['mean']=$mean;
    $_SESSION['sorce']=$sorce;
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
      input.underline {
        font-family: 'Nanum Pen Script', cursive;
        border-left-width:0;
        border-right-width:0;
        border-top-width:0;
        border-bottom-width:0;
        margin:10px;color: #ffffff;
        font-size:30px;
        background-color:transparent;
      }
      table,
      th,
      td {
        border-collapse: collapse;
      }

    </style>

  </head>

  <body style="">
    <table style="width:100% ;height:100%">
      <tr style="height:20%">
        <td style="width:15%;padding:20px">
          <h1 name="id"><?php echo $_SESSION['name'] ; ?></h1>
          <p style="font-size : 120%">학습시작일 : <strong name="startday"><?php echo $_SESSION['startday'] ; ?></strong></p>
        </td>
        <td colspan="5" style="text-align:center; font-size:50px;">
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
        <td style="width:40%" colspan="2">
          <img id="wordimg" src="" style="height:200px; width:200px; margin-left: 50px" />
        </td>
        <td colspan="3">
          <h2 id="English_word" style="font-size:70px">English word</h2>
          <h2 id="korean" style="font-size:60px">한국어 뜻</h2>
        </td>
      </tr>
      <tr style="height:20%">
        <td style="width:10%">
          <img id="left" onclick="leftclick()" style="height:100px;margin-left: 20px" src="https://image.flaticon.com/icons/svg/33/33262.svg" />
        </td>

        <td colspan="3" style="text-align:center">
          <form class="" action="saveword.php" method="post">
            <input id="wordnum" readOnly="true"  name="wordnum" value="" class="underline" />
            <input id="button" type="submit" value="저장" style="margin:10px;margin-left:50%;
            color: #ffffff;font-size: 25px; cursor: pointer; background-color:transparent;">
          </form>

        </td>
        <td style="width:12%">
          <img id="right" onclick="rightclick()" style="transform: scaleX(-1);height:100px;margin-right: 20px" src="https://image.flaticon.com/icons/svg/33/33262.svg" /> </td>
      </tr>
    </table>
  </body>

  <script>
    var img=<?= json_encode($_SESSION['sorce']) ?>;
    var english=<?= json_encode($_SESSION['word']) ?>;
    var korean=<?= json_encode($_SESSION['mean']) ?>;

    var word = [];
    var wordcount = <?= json_encode($wordcount) ?>;

    if(isNaN(wordcount)){
      wordcount=0;
    }
    for(i=0;i<5;i++){
      word.push({
        wordimg: img[i],
        English_word: english[i],
        mean: korean[i]
      });
    }


    function view(num) {
      document.getElementById('wordimg').src = word[num].wordimg;
      document.getElementById('English_word').innerHTML = word[num].English_word;
      document.getElementById('korean').innerHTML = word[num].mean;
      document.getElementById('wordnum').value = (num + 1) + "/" + word.length;
    }
    view(wordcount);

    function leftclick() {
      if (wordcount > 0) {
        wordcount = wordcount - 1;
        view(wordcount);
      }
    }

    function rightclick() {
      if (wordcount < word.length - 1) {
        wordcount = wordcount + 1;
        view(wordcount);
      }

    }

  </script>

</html>
