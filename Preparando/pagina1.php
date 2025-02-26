<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include('pagina2.php');?>
</head>
<body>
    <form method="POST" action="">
        <center>
            <fieldset>
                <h2>Coloque o salário bruto do funcionário e a Pontuação do seu Desempenho</h2>
                Salário: <input type="text" name="salario"><br><br>
                Desempenho: <input type="text" name="desempenho" placeholder="1 a 10"><br><br>
                <button type="submit" name= "acao"> Calcular</button>                    
            </fieldset>
        </center>
    </form>
<br><br>

<?php  SalarioLiquido(@$_POST['salario'],@$_POST['desempenho']);   
        Maior(@$_POST["salario"]); 
?>

</body>
</html>