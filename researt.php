
<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Pen+Script" rel="stylesheet">
    <?php
     session_start();
     $mysql=mysqli_connect("localhost","admin","wjsrhkdgh.1","admin");
     $word=$_POST['word'];
     $sql="SELECT * FROM WORD WHERE word='$word'";
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
table, th, td {
    border-collapse: collapse;
}
table#data {
    border-collapse: collapse;
    width: 100%;
}

table#data td, th {
    border: 1px solid #dddddd;
}

table#data tr:nth-child(even) {
    background-color: #dddddd;}
</style>
  </head>

  <body>
    <table style="width:100% ;height:100%">
      <tr style="height:20%">
        <td style="width:15%;padding:20px">
          <h1 name="id"><?php echo $_SESSION['name'] ; ?></h1>
          <p style="font-size : 120%">학습시작일 : <strong name="startday"><?php echo $_SESSION['startday'] ; ?></strong></p>
        </td>
        <td>
          <form style="text-align:center" action="researt.php">
            <input type="text" size="50" style="font-size:150%">
            <input type="submit" value="search" style="font-size: 25px; cursor: pointer;">
          </form>

        </td>

      </tr>
      <tr style="text-align:center">
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
        <td>
          <h1 id="English_word" style="font-size:70px"><? echo $word;?></h1>
          <img id="wordimg"  style="height:200px; width:200px; margin-left: 50px" />
          <h2 id="korean" style="font-size:60px"><? echo $mean;?></h2>
        </td>
      </tr>
    </table>
  </body>
<script>
var img=<?= json_encode($sorce) ?>;
var word=<?= json_encode($word) ?>;
var mean=<?= json_encode($mean) ?>;
document.getElementById('English_word').innerHTML=word;
document.getElementById('korean').innerHTML=mean;
document.getElementById('wordimg').src = img;
</script>
</html>
