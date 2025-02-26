<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar_Dep</title>
    <link rel="stylesheet" href="../Visao/css/style.css">

</head>
<body>

    <?php
    require '../Modelo/ClassDepartamento.php';
    require '../Modelo/DAO/ClassDepDAO.php';
        $classDepDAO= new ClassDepDAO();
        $dep = $classDepDAO->listarDepartamentos();

        
   echo"<div class='principal'>
    JDEVS.getDepartamentos()
       </div>";

            
                  echo "<table style='border: 2px solid black; width: 105.4%; border-collapse: collapse; margin: 0;'>";
                  echo "<tr>";
                  echo "<th scope='col' style='padding: 10px; background-color: #f2f2f2;'><p align='center'>Identificador</p></th>";
                  echo "<th scope='col' style='padding: 10px; background-color: #f2f2f2;'><p align='center'>Nome</p></th>";
                  echo "<th scope='col' style='padding: 10px; background-color: #f2f2f2;'><p align='center'>Andar</p></th>";
                  echo "<th scope='col' style='padding: 10px; background-color: #f2f2f2;'></th>"; // Coluna vazia para o botão
                  echo "</tr>";

            foreach ($dep as $dep) {
             echo "<tr>";
             echo "<td scope='col' style='padding: 10px;'><p align='center'>" .($dep['id']) . "</p></td>";
             echo "<td scope='col' style='padding: 10px;'><p align='center'>" .($dep['nome']) . "</p></td>";
             echo "<td scope='col' style='padding: 10px;'><p align='center'>" .($dep['andar']). "</p></td>";
             echo "<td scope='col' style='padding: 10px;' class='buttons_2' id='lista'><a href='Alt_Departamento.php?idex=" . $dep["id"] . "'><input type='button' value='selecionar'></a></td>";
             echo "</tr>";
         }
             echo "</table>";
?>
<br>
   <div style="text-align:right;" class="buttons_2" id="lista" >
   <a href="http://localhost/Trabalho_APW/index.php"><input type='button' value="Home"></a>
   </div>
</body>
</html>
