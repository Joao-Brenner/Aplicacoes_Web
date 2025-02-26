 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php

   $v1 = $_POST['valor1'];

   echo("Primeiro valor digitado: " .$v1);
  
   if($v1 > 20){
     echo("</br> O valor digitado é maior que 20.");

   } else if($v1 < 20){
    echo("</br> O valor digitado é menor que 20.");

}else{
    echo("</br> O valor digitado é igual a 20.");

}

for($cont = 1; $cont <= $v1; $cont++){
    echo("</br> Valor atual: ".$cont);
}

   
   ?>
</body>
</html>