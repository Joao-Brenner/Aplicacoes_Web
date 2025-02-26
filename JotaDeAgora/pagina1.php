

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maior Número</title>
    <?php include("resultado.php"); ?>
</head>
<body>
<form method="POST" action="">
		 <center>
			<fieldset>
               <h3>Insira três números:</h3>
               1°_Número: <input type="text" name="n1"><br><br>
               2°_Número: <input type="text" name="n2"><br><br>
               3°_Número: <input type="text" name="n3"><br><br>
               <button type="submit" name="acao"> Comparar</button>
           </fieldset>
           
		 </center>
</form>
<?php 

echo("<br><br>");
comparar(@$_POST["n1"], @$_POST["n2"], @$_POST["n3"]);?>
</body>
</html>
