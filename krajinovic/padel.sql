CREATE TABLE korisnici (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ime VARCHAR(100) NOT NULL,
    prezime VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('igrač', 'trener') NOT NULL
);

CREATE TABLE dostupnost_terena (
    id INT AUTO_INCREMENT PRIMARY KEY,
    trener_id INT NOT NULL,
    datum DATE NOT NULL,
    vrijeme TIME NOT NULL,
    FOREIGN KEY (trener_id) REFERENCES korisnici(id)
);
