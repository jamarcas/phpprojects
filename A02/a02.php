<?php
	function avatarCode($entrada)
	{
		/*
		Definimos la función avatarCode introduciendo un numero.
		Nuestro valor devuelto es el mismo que el introducido y tendría que ser el opuesto.
		Hay que poner el opuesto por lo que la solución es cambiar el signo			
		*/
		return -$entrada;
	}
?>
<html>
	<head>
		<title>CODE 01 SOLUCI&OacuteN</title>
		<style>
		.Funcion{
			border: 1px;
		}
		.OK {
		    background-color: #9CCC65;
		}
		.KO {
		    background-color: #FF7043;
		}
		</style>
	</head>
	<body>
		<?php
			//Si introducimos el valor 0 esperamos que salga el valor 0
			echo "<div class=\"OK\">";
			echo "Valor de entrada=0 valor esperado=0"."</br>";
			echo "--------------------------------"."</br>";
			echo "Valor de salida=".avatarCode(0)." OK</br>";
			echo "</div>";
			echo "<br>";
			//Si introducimos el valor 0 esperamos que salga el valor 0
			echo "<div class=\"OK\">";
			echo "Valor de entrada=1, valor esperado=-1"."</br>";
			echo "--------------------------------"."</br>";
			//Cambiamos el mensaje de salida por correcto.
			echo "Valor de salida=".avatarCode(1)." CORRECTO</br>";
			echo "</div>";
			echo "<br>";
			//Si introducimos el valor -1 esperamos que salga el valor 1
			echo "<div class=\"OK\">";
			echo "Valor de entrada=-1, valor esperado=1"."</br>";
			echo "--------------------------------"."</br>";
			//Cambiamos el mensaje de salida por correcto.
			echo "Valor de salida=".avatarCode(-1)." CORRECTO</br>";
			echo "</div>";
			echo "<br>";
		?>
	</body>
</html>