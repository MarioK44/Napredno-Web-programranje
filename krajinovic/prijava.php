<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $stmt = $pdo->prepare("SELECT * FROM korisnici WHERE email = ?");
    $stmt->execute([$email]);
    $korisnik = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($korisnik && password_verify($password, $korisnik['password'])) {
        session_start();
        $_SESSION['korisnik'] = $korisnik;
        if ($korisnik['role'] == 'trener') {
            header("Location: trener.php");
        } else {
            header("Location: igrac.php");
        }
        exit();
    } else {
        echo "Podaci za prijavu su netočni.";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Casa del padel</title>
    <link rel="stylesheet" href="css.css">
</head>
<body class="o-nama">
    
<div class="link">
        <a class="linkovi" href="index.php">Početna</a>
        <a class="linkovi" href="o_nama.php">O nama</a>
        <a class="linkovi" href="pravila.php">Pravila</a>
        <a class="linkovi" href="registracija.php">Registracija</a>
        <a class="linkovi" href="prijava.php">Prijava</a>
    </div>

    <div class="o-nama-naslov">
        <p class="glavni-naslov">Prijava</p>
    </div>

    <div class="prijava-2">

        <form method="post">
                    <label class="velicna-upita" for="email">Email:</label>
                    <input type="email" id="email" name="email" required placeholder="Unesi e-mail">       
            
                    <label class="velicna-upita" for="password">Lozinka:</label>
                    <input type="password" id="password" name="password" required placeholder="Unesi lozinku">
                    

                <button class="velicna-upita" type="submit">Prijava</button>
                <a class="nema-registracije" href="Registracija.html"> Kreiraj račun ako ga nemaš!</a>
        </form>
    </div>


    <div class="copyright-b">
        <p class="copyright">Copyright© 2024. Casa del padel. Sva prava zadržana.</p>
    </div>



</body>
</html>