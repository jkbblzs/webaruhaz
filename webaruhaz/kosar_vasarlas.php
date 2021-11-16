<html lang="hu">
<?php include 'head.php';?>
<body>
<?php include 'top.php';?>

<?php include 'navbar.php';?>
<div align="center">
		<H2 align=center>Az Ön által kiválasztott termék:</H2>


<div class="container" style="margin-top:30px">
<?php
		$termek_id = $_POST["termek_id"];
		//$termek_id1 = $_POST["termek_id1"];
		print ("<br>");
		print($termek_id);

	?>

<?php  include 'kapcsolat.php';?>



<?php
// Create connection --------------------------------------------------------------
$kapcsolat = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$kapcsolat) {
  die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT * FROM termek Where id = '$termek_id'";
$eredmeny = mysqli_query($kapcsolat, $sql);


// A lekérdezés kiíratása

print("<table class=\"table table-condensed table table-striped\">
	<thead>
		<tr>");
// Az eredménytábla mezőneveinek kiíratása
		print("<th style= \"width: 2%\">Sorszám</th>");
		print("<th style= \"width: 2%\">Kategória</th>");
		print("<th style= \"width: 2%\">Termék neve</th>");
		print("<th style= \"width: 2%\">Ár</th>");
		print("<th style= \"width: 2%\">Foto</th>");
		//print("<th style= \"width: 2%\">foto_nk</th>");
		print("<th style= \"width: 2%\">Készlet</th>");	
		print("<th style= \"width: 2%\">Vásárlás</th>");			
print("</tr>
	</thead>");
	
// Az eredménytábla tartalmának kiíratása
	
print("<tbody>");
while ($sor = mysqli_fetch_array($eredmeny,MYSQLI_ASSOC))
	{
		$termek_szamlalo++;
		print ("<tr>");
		$mezo_szamlalo=0;
		foreach ($sor as $i=>$ertek)
		{
			$mezo_szamlalo++;
			if ($mezo_szamlalo == 1)
				{print("<td>$ertek</td>"); $termek_id=$ertek; $termek_id_nagykephez=$ertek;}
			if ($mezo_szamlalo == 2) 
					print("<td>$ertek</td>");
				if ($mezo_szamlalo == 3) 
					print("<td>$ertek</td>");
			if ($mezo_szamlalo == 4)
				print("<td>$ertek Ft</td>");
			if ($mezo_szamlalo == 5)
				print("<td><a href=\"../kepek/$sor[foto_nk]\" target=\"_blank\"><img src=\"../kepek/$ertek\" alt=\"\" height=\"200\" widht=\"300\" style=\"max-width=\"300\"\"></a></td>");
			//if ($mezo_szamlalo == 6)
				//print("<td><a href=\"fotok/$ertek\" target=\"_blank\">nagykép</a></td>");
			if ($mezo_szamlalo == 7) 
				print("<td>$ertek db</td>");
						
		}
		
		print("</tr>");
	}		
print("</table>\n");

mysqli_close($kapcsolat);

?>
<br>
</div>
<?php include 'footer.php';?>
</body>
</html>