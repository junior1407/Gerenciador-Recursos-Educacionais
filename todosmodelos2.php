<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
<link rel="stylesheet" href="css/bootstrap.min.css">
  <style>
      .espacado{
          margin-top: 70px;
      }


  </style>
</head>
<body>
<?php




$endereco = "core-services-webapp.herokuapp.com/Model/";
$curl = curl_init($endereco);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$curl_response = curl_exec($curl);

$json = json_decode($curl_response, true);
$json = $json["@Ontology#Model"];
?>
<div class="container">
    <h1> Gestor de Recursos Educacionais</h1>
    <div class="col-lg-6">
    <h2>Modelos Cadastrados</h2>

    <form action="modeloselecionadotree.php" method="get">
        <div class="list-group">
            <li href="#" class="list-group-item active">Nome</li>

            <?php foreach ($json as $atual) {?>

                <button name="clickado" class="list-group-item"  value="<?php echo$atual["@Ontology#id"];?>"><?php echo $atual["@Ontology#label"]; ?></button>

            <?php } ?>
        </div>
        </form>

</div>

    <div class="col-lg-6">

   <a href="index.php"><button class="btn btn-primary espacado"> Listar todos Domínios</button></a>


    </div>

</div>

</body>

</html>

