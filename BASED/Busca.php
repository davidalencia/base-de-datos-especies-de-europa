<?php
		$encabezado=array('id','Especie','Genero','Orden','Familia','N.Cíentifico', 'Descubridor','Listado','Notas','Distribución','Introducidads-?','Extintas-?','Reintroducidas','Clase','Filo');
		$busca=$_POST['Busca'];
		$conect=mysql_connect("localhost","root","","Plantas");
		$query='SELECT * FROM ESPECIE JOIN GENERO ON ESPECIE.genero=GENERO.id_genero, ORDEN JOIN FAMILIA ON ORDEN.id_orden=FAMILIA-id_orden, FAMILIA JOIN GENERO ON FAMILIA.id_familia=GENERO.id_familia, ESPECIE JOIN LIST ON ESPECIE.id_list=LIST.id_list, ESPECIE JOIN FULL ON ESPECIE.id_full=FULL.id_full, ESPECIE JOIN FULL_NUMERAL ON ESPECIE.id_full_numeral=FULL_NUMERAL.id_full_numeral, INTRODUCIDAS JOIN ESPECIE ON INTRODUCIDAS.id_planta=ESPECIES.id_planta, TALVEZ_INTRODUCIDAS JOIN ESPECIE ON TALVEZ_INTRODUCIDAS.id_planta=ESPECIE.id_planta,  TALVEZ JOIN ESPECIE ON TALVEZ.id_planta=ESPECIE.id_planta, REINTRODUCIDAS JOIN ESPECIE ON REINTRODUCIDAS.id_planta=ESPECIE.id_planta,  EXTINTAS JOIN ESPECIE ON EXTINTAS.id_planta=ESPECIE.id_planta, TALVEZ_EXTINTAS JOIN ESPECIE ON TALVEZ_EXTINTAS.id_planta=ESPECIE.id_planta,  CLASE JOIN ESPECIE ON CLASE.id_planta=ESPECIE.id_planta    WHERE especie LIKE "%".$busca."%"';
		$res=mysqli_query($conect,$query);
		$fila=mysqli_fetch_assoc($res);
		//------------------------------------------------------------------------------------------------------------------------------------------------------------------
echo "<!DCOTYPE html>
		<html lang='es'>
		<head>
			<meta charset='UTF-8'/>
			<title>TablaMysql</title>
			<link rel='stylesheet' type='text/css' href='../styles/planta.css'/>
		</head>";
echo	"<body>";
echo		"<table border='4' align='center' id='tabla'>";
echo			"<h2>Reino Plantae</h2>";
echo			"<tr>";
				for($f=0;$f<16;$f++)
echo					"<th>".$encabezado[$f]."</th>";		 
					for($m=0;$f<16;$f++)
echo			"</tr>";
		
				while($fila=mysqli_fetch_assoc($res))
					{	
echo					"<tr>";
echo							"<td>".$fila['id_planta']."</td>";
echo							"<td>".$fila['especie']."</td>";
echo							"<td>".$fila['genero']."</td>";
echo							"<td>".$fila['listing']."</td>";
echo							"<td>".$fila['n_cientifico']."</td>";
echo							"<td>".$fila['nom_autor']."</td>";
echo							"<td>".$fila['id_listado']."".$fila['nom_listado']."</td>";
echo							"<td>".$fila['id_party']."</td>";
echo							"<td>".$fila['not_uno']." ".$fila['not_dos']."</td>";
echo							"<td>".$fila['id_pais']." ".$fila['nom_pais']."</td>";
echo							"<td>".$fila['intro_pais']." ".$fila['pointro_pais']."</td>";
echo							"<td>".$fila['extin_pais']." ".$fila['poextin_pais']."</td>";
echo							"<td>".$fila['d_incierta']."</td>";
echo							"<td>".$fila['rein_pais']."</td>";
echo   							"<td>".$fila['nom_fila']."</td>";
echo							"<td>".$fila['nom_clase']."</td>";
echo				    "</tr>";		
					}			
echo		"</table>";
echo		"</body>";
echo		"<footer>*Nota: No existen subespecie y tampoco filo ni clase en esta lista</footer>";
echo	"</html>";

?>