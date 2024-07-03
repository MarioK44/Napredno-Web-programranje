<?php
include('config.php');
include('funkcije_xml.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $stmt = $pdo->prepare("INSERT INTO korisnici (ime, prezime, email, password, role) VALUES (?, ?, ?, ?, ?)");
    if ($stmt->execute([$ime, $prezime, $email, $password, $role])) {
        $korisnikId = $pdo->lastInsertId();
        $korisnik = [
            'id' => $korisnikId,
            'ime' => $ime,
            'prezime' => $prezime,
            'email' => $email,
            'role' => $role
        ];
        addUserToXML($korisnik);
        echo "Registracija je provedena!";
    } else {
        echo "Molimo Vas ponovite registraciju.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registracija</title>
    <link rel="stylesheet" href="css.css">
</head>
<body class="o-nama">
    
<div class="link" action="registracija.php" method="post">
        <a class="linkovi" href="index.php">Početna</a>
        <a class="linkovi" href="o_nama.php">O nama</a>
        <a class="linkovi" href="pravila.php">Pravila</a>
        <a class="linkovi" href="registracija.php">Registracija</a>
        <a class="linkovi" href="prijava.php">Prijava</a>
    </div>
    <div class="o-nama-naslov">
        <p class="glavni-naslov">Registracija</p>
    </div>
    <div class="prijava-1">
        <form action="registracija.php" method="post">
            <label class="velicna-upita" for="ime">Ime:</label>
            <input type="text" id="ime" name="ime" required placeholder="Unesi ime">
            

            <label  class="velicna-upita" for="prezime">Prezime:</label>
            <input type="text" id="prezime" name="prezime" required placeholder="Unesi prezime">
            

            <label class="velicna-upita" for="email">Email:</label>
            <input type="email" id="email" name="email" required placeholder="Unesi e-mail">
            

            <label class="velicna-upita" for="role">Uloga:</label>
            <select id="role" name="role">
                <option value="plesac">Igrač</option>
                <option value="trener">Trener</option>
            </select>

            <label class="velicna-upita" for="password">Lozinka:</label>
            <input type="password" id="password" name="password" required placeholder="Lozinka">
            

            <button class="velicna-upita" type="submit">Registracija</button>
        </form>
    </div>

    <div class="copyright-b">
        <p class="copyright">Copyright© 2024. Casa del padel. Sva prava zadržana.</p>
    </div>

</body>
</html>