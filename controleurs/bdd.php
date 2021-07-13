<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=wikislam;charset=utf8', 'admin', 'OszX^hr~m;|TD;zYbs');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
    echo "erreur !";
}
?>


