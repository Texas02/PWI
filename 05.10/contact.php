<!DOCTYPE html>
<html lang="pl">
<head>
<link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <title>Nazwa Twojej Strony</title>

</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Strona główna</a></li>
            <li><a href="about-us.php">O nas</a></li>
            <li><a href="contact.php">Kontakt</a></li>
        </ul>
    </nav>
    <header>

        <h1>Kontakt</h1>

    </header>
    <main>
        <form id="FormularzKontaktowy">
        <p class="title">Login</p>
            <label for="name">Imię i nazwisko:</label>
            <input type="text" id="name" name="name" required>
            <br>
            <label for="email">Adres e-mail:</label>
            <input type="email" id="email" name="email" required>
            <br>
            <label for="message">Wiadomość:</label>
            <textarea id="message" name="message" rows="4" required></textarea>
            <br>
            <input type="submit" value="Wyślij">

            
        </form>
    </main>

    
    <footer>
        Copyright &copy; <?php echo date("Y"); ?>
    </footer>
    <script>
   document.getElementById("contactForm").addEventListener("submit", function (event) {
            event.preventDefault();
            alert("Nie można wysłać formularza");
        });

        const trescDoZnalezienia = "Tytuł nagłówka";

    const znalezionyNaglowek = znajdzNaglowekPoTresci(trescDoZnalezienia);

    if (znalezionyNaglowek) {
    console.log("Znaleziono nagłówek:", znalezionyNaglowek);
    }    else {
    console.log("Nie znaleziono pasującego nagłówka.");
    }
    </script>
	
    

</body>
</html>
