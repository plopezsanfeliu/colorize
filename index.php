<!DOCTYPE html>
<html>
<head>
	<title>Coloreador. Colorea tus fotos antiguas o en B/N</title>
	<style type="text/css">
		body {
			font-family: sans-serif;
			background-image: url("style/bg.jpg");
			background-position: center; 
		}
		h1 {
			color: white;
		}
		#mainContainer {
			margin: 0 auto;
			width: 90%;
			height: 500px; /* canviar a relatiu! */
			background-color: lavender;
			border-radius: 20px;
			padding: 20px;
			text-align: center;
		}
		#leftContainer {
			width: 40%;
			height: 95%;
			float: left;
			background-color: DarkKhaki;
			text-align: center;
			border-radius: 20px;
		}
		#rightContainer {
			width: 40%;
			height: 95%;
			float: right;
			background-color: DarkSalmon;	
			text-align: center;
			border-radius: 20px;
		}
		#leftCanvas {
			padding: 10px;
			width: 90%;
			border:1px solid #d3d3d3;
			background-color: white;
			margin: 0 auto;
		}
		#rightCanvas {
			padding: 10px;
			width: 90%;
			border:1px solid #d3d3d3;
			background-color: white;
			margin: 0 auto;
		}
		button {
			border-radius: 4px;
			background-color: white;
			color: black;
			border: 2px solid #4CAF50;
		}
		button:disabled {
			border-radius: 4px;
			background-color: white;
			color: black;
			border: 2px solid #f44336;
			color: grey;
		}
		input {
			border-radius: 4px;
			background-color: white;
			color: black;
			border: 2px solid #4CAF50;
		}
	</style>

	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

	<script>
		function loading() {
				document.getElementById("loading").innerHTML = "<h4>Coloreando fichero</h4><p>No recargar ni cerrar la web durante el proceso</p><img src='style/loading.gif' height='150' width='150' alt='loading'>";
		}
	</script>
</head>
<body>
	<h1>Panel del Colorize</h1>

	<?php
	$leftImage = $_GET["leftImage"];
	$rightImage = $_GET["rightImage"];
	?>

	<div id="mainContainer">
		<button id="color_button" <?php if((!isset($_GET["leftImage"])) || (isset($_GET["rightImage"]))) echo "disabled"; else echo "onclick='window.location.href=\"colorize.php?link=$leftImage\"; loading(); this.disabled=true; document.getElementById(\"reset\").disabled = true;' "; ?>>Colorear</button>
		<div id="leftContainer">
			<h2>Imagen a colorear</h2>
			<div id="leftCanvas">
				<?php
				if(isset($_GET["leftImage"])) {
					echo "<img alt=\"imagen-blanco-negro\" style=\"max-height: 300px; max-width: 100%;\" id=picture1 src=\"" . $_GET["leftImage"] . "\">";
				}
				else {
					echo "<img alt=\"imagen-blanco-negro\" id=picture1 src=\"style/void_image.jpg\">";
				}
				?>
			</div>
			<br />
			<?php
			if(!isset($_GET["leftImage"])) {
				echo '
				<form action="upload.php" method="post" enctype="multipart/form-data">
					<input type="file" name="fileToUpload" accept="image/*">
					<br /><br />O bien entra URL:<br />URL: <input type="text" name="url"><br /><br />
					<input type="submit" value="Subir">
				</form>';
			}
			else {
				echo "<button id=\"reset\" onclick=\"window.location.href='index.php'\">Reset</button>";
			}
			?>

		</div>
		<div id="rightContainer">
			<h2>Imagen coloreada</h2>
			<div id="rightCanvas">
				<?php
				if(isset($_GET["rightImage"])) {
					echo "<img alt=\"imagen-color\" style=\"max-height: 300px; max-width: 100%;\" id=picture1 src=\"" . $_GET["rightImage"] . "\">";
				}
				else {
					echo "<img alt=\"imagen-color\" id=picture2 src=\"style/void_image.jpg\">";
				}
				?>	
			</div>
			<br />
			<button<?php
			if(!isset($_GET["rightImage"])) {
				echo " disabled";
			}
			else {
				echo " onclick=\"window.location.href='$rightImage'\"";
			}
			?>>Descargar</button>
		</div><br />
		<?php
		if(!(isset($_GET["rightImage"])) && !(isset($_GET["leftImage"]))) {
			echo "
			<h4>Autenticacion obligatoria</h4>
			<button onclick=\"window.open('https://algorithmia.com/signin')\">Autenticar</button>
			<p>Usuario: plopezsanfeliu</p>
			<p>Contraseña: cc2017</p>
			";
		}
		?>
		<div id="loading" style="margin-top: 100px;"></div>
		
	</div>
</body>
</html>
