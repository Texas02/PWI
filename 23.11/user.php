<?php
    $conn = new mysqli(
        '127.0.0.1',
        'root',
        '',
        'egzamin'
    );
?>

<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Panel administratora</title>
    <link rel="stylesheet" href="./styl4.css">
</head>
<body>
    <header>
        <h3>Portal Społecznościowy - panel administratora</h3>
    </header>
    <main>
        <section>
            <h4>Użytkownicy</h4>
            <?php

            $sql = 'SELECT id, imie, nazwisko, rok_urodzenia, zdjecie FROM osoby LIMIT 30';

            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                echo $row['id'] . ' ' . $row['imie'] . ' ' . $row['nazwisko'] . ' ' . (date('Y') - $row['rok_urodzenia']) . '<br>';
            }

            $result->free_result();

            ?>
            <a href="./settings.html">Inne ustawienia</a><br>
        </section>
        <section>
            <h4>Podaj id użytkownika</h4>
            <form method="post">
                <input type="number" name="user_id">
                <button>ZOBACZ</button>
            </form>
            <hr>
            <?php
            if (isset($_POST['user_id'])) {
                $id = $_POST['user_id'];

                $sql = 'SELECT o.imie, o.nazwisko, o.rok_urodzenia, o.opis, o.zdjecie, h.nazwa FROM osoby o JOIN hobby h ON h.id = o.Hobby_id  WHERE o.id = ' . $id;

                $result = $conn->query($sql);

                $row = $result->fetch_assoc();

                echo "<h2>$id. {$row['imie']} {$row['nazwisko']}</h2>";
                echo "<img src='./{$row['zdjecie']}' alt='$id' />";
                echo "<p>Rok urodzenia: {$row['rok_urodzenia']}</p>";
                echo "<p>Opis: {$row['opis']}</p>";
                echo "<p>Hobby: {$row['nazwa']}</p>";

            }
            ?>
        </section>
    </main>
    <footer>
        Stronę wykonał: 00000000000
    </footer>
</body>
</html>

<?php
    $conn->close();
?>
