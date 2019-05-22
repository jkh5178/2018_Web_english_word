
<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Pen+Script" rel="stylesheet">
    <?php session_start();
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
        <td rowspan="2" style="height:100%; ">
          <form style="text-align:center" action="researt.php" method="post">
            <input name="word" type="text" size="50" style="color: #ffffff;font-size:150%;border:1px solid white; background-color:transparent;">
            <input type="submit" value="search" style="color: #ffffff;font-size: 25px; cursor: pointer;border:1px solid white; background-color:transparent;">
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

    </table>
  </body>

</html>
