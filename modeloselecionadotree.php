<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <style>

        ul{
            list-style-type: none;
          margin:0;
        }
        .espacado{
            margin-top: 70px;
        }
    </style>
</head>
<body>
<?php
require('funcoes.php');
$modeloatual = $_GET['clickado'];

?>



<?php

$json =getModelosDominio($modeloatual);
$json = $json["@Ontology#Topic"];
echo "<br><br>";
//array(3) { ["@Ontology#parent"]=> string(0) ""
//["@Ontology#id"]=> string(3) "357"
//["@Ontology#label"]=> string(17) "CN_Root_Tanenbaum" }
?>


<div class="container">

    <h1> Gestor de Recursos Educacionais</h1>
    <div class="col-lg-8">
        <h2>Tree View</h2>

<div class="list-group">

<form action="topicoatual.php" method="get">
<input type="hidden" name="modelo" value="<?php echo($modeloatual);?>">
           <?php
           $pai = getPaideTodos($json);
          // echo $pai["@Ontology#label"];
           getFilhosTopico($pai,$json);
           ?>
    </form>
</div>
</div>

    <div class="col-lg-4">

        <a href="javascript:history.go(-1)" ><button class="btn btn-primary espacado"> Voltar para Modelos do Domínio</button></a>


    </div>

    </div>
</body>
</html>