<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
   
    <?php  include('Controle.Class.php') ?>
    <link href="style.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="">
       <center>
           <fieldset>
               <h1>Cadastro de Itens e Cálculo de Total</h1>
               <br>
               <p>Nome: <input type="text" name="item"></p>
               
               <p>Quantidade: <input type="number" name="quantidade"></p>
               
               <p>Preço: <input type="text" name="precounitario"></p>
               <button type="submit" name="calcular">Calcular</button>
               <button type="submit" name="fim">Encerrar Sessão</button>
               <br>
        </center>
            </fieldset>   
    </form>

    <?php  
    session_start();
   if(isset($_POST['calcular'])){
    @$_SESSION['item']=$_POST['item'];
    @$_SESSION['quantidade'] = $_POST['quantidade'];
    @$_SESSION['precounitario']= $_POST['precounitario'];

    if (!isset($_SESSION['qnt'])) {
        $_SESSION['qnt'] = 0;
        $_SESSION['soma'] = 0; 
        $_SESSION['maiorPreco'] = 0; 
        $_SESSION['maiorItem'] = ''; 
    }

    
    $_SESSION['qnt']++;
   }
    if (isset($_POST['calcular'])) {
        $calcular = new Controle();
        $calcular->Calcular();
    }
    if(isset($_POST['fim'])){
  session_destroy();
    }
    ?>

</body>
</html>