<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>
<?php
    $value = $_GET['clickado'];



$endereco = "core-services-webapp.herokuapp.com/Domain/".$value;
$curl = curl_init($endereco);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$curl_response = curl_exec($curl);

$json = json_decode($curl_response, true);
$json = $json["@Ontology#Model"];
?>









<div class="container">
    <h2>Todos Modelos Cadastrados do dominio selecionado</h2>

    <form action="modeloselecionadotree.php" method="get">
    <div class="list-group">
        <li href="#" class="list-group-item active">Nome</li>

        <?php foreach ($json as $atual) {?>

    <button name="clickado" class="list-group-item"  value="<?php echo$atual["@Ontology#id"];?>"><?php echo $atual["@Ontology#label"]; ?></button>

<?php } ?>
</div>


</div>

</body>
</html>
