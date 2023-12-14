<!DOCTYPE html>
<html lang="pl-PL">
<head>
	<meta charset="utf-8" />
	<title>Wędkowanie</title>
	<link rel="stylesheet" href="styl_1.css" />
</head>
<body>
	<header>
		<h1>Portal dla wędkarzy</h1>
	</header>
	<main>
		<section id="lewy1">
			<h3>Ryby zamieszkujące rzeki</h3>
			<ol>
				<?php
				$conn= new mysqli(
					'127.0.0.1',
					 'root',
					 "",
					 'wedkowanie',
					 3306,
					);
					 $q1 = "SELECT ryby.nazwa, lowisko.akwen, lowisko.wojewodztwo FROM ryby INNER JOIN lowisko ON ryby.id = lowisko.Ryby_id WHERE lowisko.rodzaj = 3;";
					 $res1 = mysqli_query($conn, $q1);
					 while ($row = mysqli_fetch_array($res1)) {
						 echo "<li>$row[0] pływa w rzece $row[1], $row[2]</li>";
					 }
				?>
			</ol>
		</section>
		<section id="prawy">
			<img src="ryba1.jpg" alt="Sum" /><br/>
			<a href="kwerendy.txt">Pobierz kwerendy</a>
		</section>
		<section id="lewy2">
			<h3>Ryby drapieżne naszych wód</h3>
			<table>
				<tr>
					<th>L.p.</th>
					<th>Gatunek</th>
					<th>Występowanie</th>
				</tr>
				<?php
				$q2 = "SELECT id, nazwa, wystepowanie FROM ryby WHERE styl_zycia = 1;";
				$res2 = mysqli_query($conn, $q2);
				while ($row = mysqli_fetch_array($res2)) {
					echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
				}
				mysqli_close($conn);
				?>
			</table>
		</section>
	</main>
	<footer>
		<p>Stronę wykonał: Oskar Kubala
	</footer>
</body>
</html>