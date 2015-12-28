<?php



function getPaideTodos($array){

    foreach($array as $atual){
        if($atual["@Ontology#parent"] ==""){
            return $atual;}

    }


}


function getModelosDominio($idDomain){

    $endereco = "core-services-webapp.herokuapp.com/Model/".$idDomain."/hierarchy";
    $curl = curl_init($endereco);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $curl_response = curl_exec($curl);

    $json = json_decode($curl_response, true);
return $json;

}



function getFilhosTopico($Topico, $array){
    echo "<ul class='table-bordered'>";
    echo "<li><button name='selecao' value='".$Topico["@Ontology#id"]."' type='submit'>".($Topico["@Ontology#label"])."-".($Topico["@Ontology#id"])."</li></button><br>";
foreach($array as $atual){
 if ($atual["@Ontology#parent"]==$Topico["@Ontology#id"]){
    // echo "<li>".($atual["@Ontology#label"])."-".($atual["@Ontology#id"])."</li><br>";
     getFilhosTopico($atual,$array);
 }
}
    echo "</ul>";

}

function getSequenceView($idModel){
$endereco = "core-services-webapp.herokuapp.com/Model/".$idModel."/sequence";
    $curl = curl_init($endereco);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $curl_response = curl_exec($curl);

    $json = json_decode($curl_response, true);
	$json = $json["@Ontology#Topic"];

    return $json;
}

function getResourcesTopico($idTopico){

    $endereco = "core-services-webapp.herokuapp.com/Topic/".$idTopico."/resources";
    $curl = curl_init($endereco);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $curl_response = curl_exec($curl);

    $json = json_decode($curl_response, true);
    $json = $json["@Ontology#Resource"];
    return $json;

}


function getNext($idTopico){
	$endereco = "core-services-webapp.herokuapp.com/Topic/".$idTopico."/next";
    $curl = curl_init($endereco);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $curl_response = curl_exec($curl);

    $json = json_decode($curl_response, true);
		$json = $json["@Ontology#Topic"];

    return $json;
}
function getPrevious($idTopico){
	$endereco = "core-services-webapp.herokuapp.com/Topic/".$idTopico."/previous";
    $curl = curl_init($endereco);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $curl_response = curl_exec($curl);

    $json = json_decode($curl_response, true);
		$json = $json["@Ontology#Topic"];

    return $json;
}
