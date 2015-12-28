<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        .col-lg-6{
            height: 100%;
        }
        .espacado{
            margin-top: 70px;
        }

    </style>
</head>
<body>





<?php
require('funcoes.php');
$modelo = $_GET['modelo'];
$topico = $_GET['selecao'];
$json = getResourcesTopico($topico);

$listaSequence= getSequenceView($modelo);
$topico_atual = "";
foreach($listaSequence as $atual){
	if ($atual["@Ontology#id"] == $topico){


	$topico_atual = $atual;
	}
}
?>


<div class="container">

    <h1> Gestor de Recursos Educacionais</h1>

    <h2>Sequence View - <?php echo $topico_atual["@Ontology#label"];?></h2>
    <div class="col-lg-3 espacado">
        <form action="topicoatual.php" method="get">
            <?php

            $previous = getPrevious($topico);

            if (count($previous)==1){
                echo "<button type='submit' name ='selecao'  value='".$previous[0]["@Ontology#id"]."' > Previous</button>";   echo $previous[0]["@Ontology#label"];
            }

         /*
            echo "<br><BR>Atual: ";
            print_r($topico_atual);
            */?>
            <input type="hidden" name="modelo" value="<?php echo($modelo);?>">
            </form>

    </div>
    <div class="col-lg-6">

    <h2>Recursos Educacionais</h2>

    <ul class="list-group">
<?php
if (count($json)==0){
    echo '<a href="#"> <li class="list-group-item">Vazio</li></a>';
}
foreach($json as $atual){
    echo '<a href="'.$atual["@Ontology#link"].'"> <li class="list-group-item">'.$atual["@Ontology#label"].'</li></a>';


}
?>


    </ul>
</div>
    <div class="col-lg-3 espacado">
    <form action="topicoatual.php" method="get">
        <?php

        $next = getNext($topico);
      //  print_r($next);

        if (count($next)==1){
            echo "<button type='submit' name= 'selecao' value='". $next[0]["@Ontology#id"]."' > Next</button>";
            echo $next[0]["@Ontology#label"];
        }

    
        ?>
        <input type="hidden" name="modelo" value="<?php echo($modelo);?>">
    </form>

        </div>

</body>
</html>
