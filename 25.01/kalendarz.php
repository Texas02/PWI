<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Organizer</title>
    <link rel="stylesheet" href="./styl5.css">
</head>

<body>
    <header>
        
    <section id="blokpierwszy">
            <img src="./logo1.png" alt="Mój kalendarz">
        </section>

        <section id="blokdrugi">
            <h2>KALENDARZ</h2>
        
        <?php
           $conn = new mysqli(
            hostname: '127.0.0.1',
            username: 'root',
            password: '',
            database: 'egzamin2020',
            port: 3306
        );
            

            if ($conn) {
                $q = "SELECT miesiac, rok FROM zadania WHERE dataZadania  = '2020-07-01'";
                $res = mysqli_query($conn, $q);
                while ($row = mysqli_fetch_array($res)) {
                    echo "<h1>miesiąc: $row[0], rok: $row[1]</h1>";
                }

                mysqli_free_result($res);
            } else {
                echo "Błąd połączenia z bazą danych.";
            }
            ?>
        </section>
    </header>
    <main>
        <?php
        if ($conn) {
            $q = "SELECT dataZadania, wpis FROM zadania WHERE miesiac = 'lipiec'";
            $res = mysqli_query($conn, $q);

            while ($row = mysqli_fetch_array($res)) {
                echo "<div class='dzien'>
                        <h5>$row[0]</h5>
                        <p>$row[1]</p>
                    </div>";
            }

            mysqli_free_result($res);
        }
        ?>
    </main>
    <footer>
        <form action="./kalendarz.php" method="POST">
            <label>dodaj wpis:
                <input name="wpis">
            </label>
            <button name="wyslij">DODAJ</button>
        </form>
        <?php
        if ($conn && isset($_POST['wyslij'])) 
        {
            $wpis = mysqli_real_escape_string($conn, $_POST['wpis']);
            $q = "UPDATE zadania SET wpis = '$wpis' WHERE dataZadania = '2020-07-13'";
            mysqli_query($conn, $q);
        }

        if ($conn) {
            mysqli_close($conn);
        }
        ?>
        <p>oskar kubala</p>
    </footer>
</body>

</html>
