Invocando o serviço $endereco = http://core-services-webapp.herokuapp.com/Domain
<br>
<?php
// Configura a URL do serviços que queremos invocar
$endereco = "core-services-webapp.herokuapp.com/Domain";

//usa a API do curl para invocar o serviço
$curl = curl_init($endereco);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
// serviço executado e seu resultado foi guardado na variável $curl_response
$curl_response = curl_exec($curl);

// decodifica a saída do serviço utilizando a função json_decode.
// O segundo parâmetro da função deve ser true para que a função retorne um array.
$json = json_decode($curl_response, true);

// Recuperando a tag "@Ontology#Domain" do resultado do serviço.
// Isto retorna um vetor de Domínios.
$arrayOfDomains = $json["@Ontology#Domain"];

//Descomente a linha abaixo para mostrar o conteúdo da variável $arrayOfDomains
//print_r($arrayOfDomains);
echo "<br>";

// Usamos o for para varrer o vetor de domínios.
foreach($arrayOfDomains as $domain){
    // Um domínio é um array com um "@Ontology#id" e "@Ontology#label".
    echo "".$domain["@Ontology#id"]." - ".$domain["@Ontology#label"];
    echo "<br>";
}

?>
