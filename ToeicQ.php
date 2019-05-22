<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Pen+Script" rel="stylesheet">
    <?php
    session_start();
    $mysql=mysqli_connect("localhost","admin","wjsrhkdgh.1","admin");
    $num=$_SESSION['Qnum'];
    $Q=array();
    $Choose=array();
    $A=array();
    $percent=array();
    for($i=0;$i<10;$i++){
      $Id=$num[$i];
      $check="SELECT * FROM TOEIC_Q WHERE No='$Id' ";
      $result=$mysql->query($check);
      if($result->num_rows==1){
        $row=$result->fetch_array(MYSQLI_ASSOC);
        $percent[$i]=($row['Answer_Count']/$row['Member_Count'])*100;
        $count=$row['Member_Count']+1;
        $sql = "UPDATE TOEIC_Q SET Member_Count='$count' WHERE No='$Id' ";
        $mysql->query($sql);
        $Q[$i]=$row['Q'];
        $Choose[$i]=array($row['A'],$row['B'],$row['C'],$row['D']);
        $A[$i]=$row['ANSWER'];
      }
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

      button {
        text-align: center;
        font-size: 50px;
        font-weight: bold;
        padding: 20px;
        margin-left: 40px;
        margin-right: 50px;
      }

    </style>
  </head>

  <body>
    <table style="width:100% ;height:100%">
      <tr>
        <td style="width:15%;padding:20px">
          <h1 name="id"><?php echo $_SESSION['name'] ; ?></h1>
          <p style="font-size : 120%">학습시작일 : <strong name="startday"><?php echo $_SESSION['startday'] ; ?></strong></p>
        </td>
        <td colspan="2" style="text-align:center;height:10%">
          <h2 style="margin: 5px;">TOEIC 어휘 문제</h2>
          <h4 style="font-size: 150%;margin-top:5px; margin-bottom: 5px;"> (총 <strong id=usecount>5</strong>회 이용) </h4>

        </td>
      </tr>
      <tr style="text-align:center">
        <td rowspan="3" style="width:15%;vertical-align:top;font-size:30px">
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
        <td style="height:5%;width:80%;">

          <p id="time" style="background:gray;width:100%;text-align:right;">
            time
          </p>
        </td>
        <td style="width:5%;">
          <p id="percent">
            오답률
          </p>
        </td>
      </tr>
      <tr style="height:60%">
        <td colspan="2" style="width:75%;text-align:center">
          <form id='a' action="ToeicEnd.php" method="post" style="display:none">
            <input id="A_num" type="hidden" name="A_num" />
            <input id="num" name="num" type="hidden" />
            <input id="button" type="submit" value="결과 확인" style="color: #ffffff;font-size: 40px; cursor: pointer; background-color:transparent;">
          </form>
          <h2 id="Q" style="font-size:40px">

          </h2>
          <h3 id="C" style="font-size:40px">
          </h3>
        </td>
      </tr>
      <tr>

        <td colspan="4" style="height:20%;text-align:center;">
          <button id="A" onclick="nextclick(this)" style="color: #ffffff;background-color:transparent;">A</button>
          <button id="B" onclick="nextclick(this)" style="color: #ffffff;background-color:transparent;">B</button>
          <button id="C" onclick="nextclick(this)" style="color: #ffffff;background-color:transparent;">C</button>
          <button id="D" onclick="nextclick(this)" style="color: #ffffff;background-color:transparent;">D</button>
          <p id="g">

          </p>
        </td>
      </tr>
    </table>
  </body>
  <script>
    var Q_num=<?= json_encode($num) ?>;
    var q=<?= json_encode($Q) ?>;
    var c=<?= json_encode($Choose) ?>;
    var a=<?= json_encode($A) ?>;
    var percentq=<?= json_encode($percent) ?>;
    var A_num=[];
    var ToeicQ=[];
    var Qcount = 0;
    var answerc = 0;
    var time = 100;
    for(i = 0; i < 10; i++){
      ToeicQ.push({
      question: q[i],
      choose: c[i],
      answer: a[i],
      percent: percentq[i]
    });
    console.log(a[i]);
  }

    function view(num) {
      document.getElementById('Q').innerHTML = ToeicQ[num].question;
      document.getElementById('C').innerHTML = "(A) "+ToeicQ[num].choose[0]+"  (B) "+ToeicQ[num].choose[1]+"  (C) "+ToeicQ[num].choose[2]+"  (D) "+ToeicQ[num].choose[3];
      document.getElementById('percent').innerHTML=ToeicQ[num].percent;
    }

    view(Qcount);
    document.getElementById('g').innerHTML=Qcount+1;

    function nextclick(button) {
      document.getElementById('g').innerHTML=Qcount+1;
      if (button.id == ToeicQ[Qcount].answer) {
        console.log("ok");
        A_num.push(Q_num[Qcount]);
        answerc = answerc + 1;
      }
      Qcount = Qcount + 1;
      if (Qcount >= ToeicQ.length) {
        document.getElementById('Q').style.display='none';
        document.getElementById('C').style.display='none';
        document.getElementById('a').style.display='block';
        document.getElementById('num').value=answerc;
        document.getElementById('A_num').value=A_num;
      }
      else{
      time = 100;
      view(Qcount);}
    }

    setInterval(function() {
      if (time <= 0) {
        nextclick();
      } else {
        time = time - 1;
        document.getElementById('time').style.width = time + "%";
        document.getElementById('time').innerHTML = parseInt(time * 0.6);
      }

    }, 600);

  </script>

</html>
