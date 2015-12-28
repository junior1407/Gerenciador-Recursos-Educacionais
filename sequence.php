<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>
<?php
require('funcoes.php');
if(!isset($_GET["modelo"])){
	echo "oi";
}
else{
	


}


echo $_GET['modelo'];
getSequenceView($_GET['modelo']);



?>