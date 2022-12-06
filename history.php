<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Histórico</title>
  <link href="style.css" rel="stylesheet" type="text/css">
  <script src="script.js"></script>
</head>

<body>
  <div class="centerText">
  <h1>Histórico</h1>
 
    <table class="center">
      <?php

$con = mysqli_connect("localhost","root","");

if (!$con)

  {

  die('Falha ao conectar: ' . mysqli_error());

  }

 

mysqli_select_db($con,'jogo_da_memoria');

 

$result = mysqli_query("SELECT * FROM history");

 

echo "<table border='1'>

<tr>

<th>Nome</th>

<th>Tabuleiro</th>

<th>Modalidade</th>

<th>Tempo gasto</th>

<th>Resultado</th>

<th>Data e hora</th>

</tr>";

 

while($row = mysql_fetch_array($result))

  {

  echo "<tr>";

  echo "<td>" . $row['nome_player'] . "</td>";

  echo "<td>" . $row['tabuleiro'] . "</td>";

  echo "<td>" . $row['modalidade'] . "</td>";

  echo "<td>" . $row['tempo_gasto'] . "</td>";
    
  echo "<td>" . $row['resultado'] . "</td>";

  echo "<td>" . $row['data_hora'] . "</td>";

  echo "<td>" . $row['login_player'] . "</td>";

  echo "</tr>";

  }

echo "</table>";


mysql_close($con);

?>
  </div>

  <div class="centerText">
  <br><br><a href="escolhaGAME.html">Voltar</a><br><br>
  </div>

</body>

</html>
