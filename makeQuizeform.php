
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
        font-size:30px;
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
    <table style="width:100% ;height:100%">
      <tr style="height:20%">
        <td style="width:15%;padding:20px">
          <h1 name="id" style="font-size : 100%"><?php echo $_SESSION['name'] ; ?></h1>
          <p style="font-size : 80%">학습시작일 : <strong name="startday"><?php echo $_SESSION['startday'] ; ?></strong></p>
        </td>
        <td rowspan="2" style="height:100%; ">
          <form style="text-align:center" method="post" action="makeQuize.php" >
            문제 : <input id="Q" name="q" type="text" size="80" class="underline"><br />
            보기1 : <input id="a1" name="a1" type="text" size="50" class="underline"><br />
            보기2 : <input id="a2" name="a2" type="text" size="50" class="underline"><br />
            보기3 : <input id="a3" name="a3" type="text" size="50" class="underline"><br />
            보기4 : <input id="a4" name="a4" type="text" size="50" class="underline"><br />
            정답 : <input id="a" name="a" type="text" size="50" class="underline"><br />
            <input id="button" type="submit" value="제출" style="margin:10px;margin-left:50%;
            color: #ffffff;font-size: 25px; cursor: pointer; background-color:transparent;">
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
