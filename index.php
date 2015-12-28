<html>
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
$endereco = "core-services-webapp.herokuapp.com/Domain";
$curl = curl_init($endereco);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$curl_response = curl_exec($curl);
$json = json_decode($curl_response, true);
$json = $json["@Ontology#Domain"];




/*

earrayOfDomains = $json["@Ontology#Domain"];
foreach($arrayOfDomains as $domain){
    // Um domínio é um array com um "@Ontology#id" e "@Ontology#label".
    echo "".$domain["@Ontology#id"]." - ".$domain["@Ontology#label"];
    echo "<br>";
}
*/
?>
<div class="container">
    <h1> Gestor de Recursos Educacionais</h1>
    <div class="col-lg-6">
    <h2>Domínios Cadastrados</h2>

    <form action="dominioselecionado.php" method="get">
    <div class="list-group">
        <li href="#" class="list-group-item active">Nome</li>

        <?php foreach ($json as $atual) {?>

        <button name="clickado" class="list-group-item" type="submit" value="<?php echo$atual["@Ontology#id"];?>"><?php echo $atual["@Ontology#label"]; ?></button>

        <?php } ?>
    </div>
</div>
    </form>
    <div class="col-lg-6">

   <a href="todosmodelos2.php"><button class="btn btn-primary espacado"> Listar todos Modelos</button></a>


    </div>

</div>

</body>

</html>

