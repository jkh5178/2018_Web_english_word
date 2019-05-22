
<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nanum+Pen+Script" rel="stylesheet">
    <?php
    session_start();
    $word=array();
    $mean=array();
    $Word_no=array();
    $mysql=mysqli_connect("localhost","admin","wjsrhkdgh.1","admin");
    $id=$_SESSION['ID'];
    $sql="SELECT Word_no, word, mean FROM WORD JOIN WORD_RECODE ON WORD.No=WORD_RECODE.Word_no WHERE WORD_RECODE.Id = '$id';";
    $result=$mysql->query($sql);
    $i=0;
    while($row=$result->fetch_array(MYSQLI_ASSOC)){
      $word[$i]=$row['word'];
      $mean[$i]=$row['mean'];
      $Word_no[$i]=$row['Word_no'];
      $i=$i+1;
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
    <table style="width:100% ;height:100%;">
      <tr style="height:20%">
        <td style="width:15%;padding:20px">
          <h1 name="id"><?php echo $_SESSION['name'] ; ?></h1>
          <p style="font-size : 120%">학습시작일 : <strong name="startday"><?php echo $_SESSION['startday'] ; ?></strong></p>
        </td>
        <td rowspan="2" style="height:100%; padding-top:10px;vertical-align: top;">
          <table id="data" style="width: 100%; text-align:center; margin-top:30px; margin-right:30px;font-size:25px">
            <thead>
        <th style="width: 10%;">No.</th>
        <th style="width: 45%;">word</th>
        <th style="width: 45%;">뜻</th>
        </thead>
        <tbody id="wordlist">

        </tbody>
    </table>
    <form action="wordnoteeach.php" method="post" id='frm'>
      <input type="hidden" id='i' name="key" value="0" />
    </form>
    </td>

    </tr>
    <tr style="text-align:center;">
      <td style="width:15%;vertical-align:top;font-size:30px">
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

      </table>

  </body>
  <script>
    var word1=<?= json_encode($word) ?>;
    var mean1=<?= json_encode($mean) ?>;
    var word_no=<?= json_encode($Word_no) ?>;
    var clickKey;
    var word_array = [];
    function addrow(word, mean) {
      var my_tbody = document.getElementById('wordlist');
      var row = my_tbody.insertRow(my_tbody.rows.length);
      var cell1 = row.insertCell(0);
      var cell2 = row.insertCell(1);
      var cell3 = row.insertCell(2);
      cell1.innerHTML = my_tbody.rows.length;
      cell2.innerHTML = word;
      cell3.innerHTML = mean;
    }
    for(i=0;i<word_no.length;i++){
      word_array.push({
        word: word1[i],
        mean: mean1[i],
        key: word_no[i]
      });

    }

    for (i = 0; i < word_array.length; i++) {
      addrow(word_array[i].word, word_array[i].mean);
    }

    $("#data tr").click(function() {

      var str = ""
      var tdArr = new Array(); // 배열 선언

      // 현재 클릭된 Row(<tr>)
      var tr = $(this);
      var td = tr.children();
      td.each(function(i) {
        tdArr.push(td.eq(i).text());
      });
      // td.eq(index)를 통해 값을 가져올 수도 있다.
      clickKey = word_array[parseInt(td.eq(0).text()) - 1].key;
      $("#i").html(clickKey);
      document.getElementById('i').value = clickKey;
      document.getElementById('frm').submit();
    });

  </script>

</html>
