<?php

$BASE_URL = "http://paulopez.ddns.net/colorize/";

$link0 = $_GET["link"];

if (strncmp($link0, "uploads/", 8) === 0) { // si es tracta d'una imatge pujada
	$link = $BASE_URL . $_GET["link"];
}
else { // en altre cas es tracta d'una URL externa
	$link = $link0;
}

$return = exec("python /var/www/html/colorize/colorize.py $link");

header("Location: index.php?leftImage=$link0&rightImage=$return");

?>