<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Hodowla Swinek Morskich</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <div id="baner"></div>
    <div id="menu">
        <a href="peruwinka.php">Rasa Peruwianka</a>
        <a href="american.php">Rasa American</a>
        <a href="crested.php">Rasa Crested</a>
    </div>
    <div id="glowny"></div>
    <div id="prawy">
        <h3>Poznaj Wszystkie rasy swinek morskich</h3>
        <ol>
        <?php
            
            $conn = new mysqli('localhost', 'root', '', 'hodowla');

            if ($conn->connect_error) {
                die("Błąd połączenia: " . $conn->connect_error);
            }

          
            $query = "SELECT rasa FROM rasy";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
               
                while($row = $result->fetch_assoc()) {
                    echo "<li>" . htmlspecialchars($row['rasa']) . "</li>";
                }
            } else {
                echo "<li>Brak dostępnych ras.</li>";
            }

            
            $conn->close();
        ?>
        </ol>
    </div>
    <div id="baner">
        <p>Strone wykonal: Oskar Kubala</p>
    </div>
</body>
</html>