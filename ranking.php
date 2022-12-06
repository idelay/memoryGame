<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>ranking global</title>
  <link href="style.css" rel="stylesheet" type="text/css">
  <script src="script.js"></script>
</head>

<body>
  <div class="centerText">
  <h1>Ranking Global</h1>
  
    <table class="center">
  <?php

$con = mysqli_connect("localhost","root","");

if (!$con)

  {

  die('Falha ao conectar: ' . mysqli_error());

  }

 

mysqli_select_db($con,'jogo_da_memoria');

 

$result = mysqli_query($con,"SELECT * FROM ranking");

 
echo "<tr>

<th>Login</th>

<th>Tabuleiro</th>

<th>Modalidade</th>

<th>Tempo gasto</th>

</tr>";

 

while($row = mysqli_fetch_array($result))

  {

  echo "<tr>";

  echo "<td>" . $row['login_player'] . "</td>";

  echo "<td>" . $row['tabuleiro'] . "</td>";

  echo "<td>" . $row['modalidade'] . "</td>";

  echo "</tr>";

  }

echo "</table>";


mysqli_close($con);

?>
  </div>
  </table>
  </div>

<div class="centerText">
  <br><br><a href="escolhaGAME.html">Voltar</a><br><br>
  </div>
  
</body>

</html>
