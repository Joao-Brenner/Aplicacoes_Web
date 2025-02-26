<!DOCTYPE html>
<html lang="pr-br">
<head>
    <link href="style.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include('Processamento.Class.php') ?>
</head>
<body>
   
    <form  name="formulario" method="POST" action="">
        <center>
          
             <h1>Bem vindo ao nosso Restaurante</h1>
             <h2>Bora dividir essa conta aí?</h2>

             Mesa:<select name="mesa">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>

		</select>
             <input type="number"  name="clientes" placeholder="Quantidade de Clientes:">
             <input type="number" name ="conta" placeholder="Valor da Conta:">
             <input type="submit" name="calcular" value="Dividir">
         
        </center>
</form>
<?php
$calcular = new Processamento();
echo $calcular->CalcularConta();
?>

</body>
</html>
