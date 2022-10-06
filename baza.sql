CREATE DATABASE IF NOT EXISTS `db_igrica`;

USE `db_igrica`;

CREATE TABLE korisnik (
    id_korisnika INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(50) NOT NULL UNIQUE,
    korisnicko_ime VARCHAR(50) NOT NULL UNIQUE,
    lozinka VARCHAR(50) NOT NULL
);

INSERT INTO korisnik (email, korisnicko_ime, lozinka)
VALUES ("bo@gmail.com", "admin", "sifra");
INSERT INTO korisnik (email, korisnicko_ime, lozinka)
VALUES ("jo@gmail.com", "Jova", "sifra");

SELECT * FROM korisnik;
DROP TABLE korisnik;

CREATE TABLE vreme (
    id_korisnika INT NOT NULL,
    fldVreme VARCHAR(50) NOT NULL,
    FOREIGN KEY (id_korisnika) REFERENCES korisnik(id_korisnika)
);

SELECT * FROM vreme;
DROP TABLE vreme;

SELECT * FROM vreme ORDER BY fldVreme+0 ASC;

INSERT INTO vreme(id_korisnika, fldVreme) VALUES ('1','37');
INSERT INTO vreme(id_korisnika, fldVreme) VALUES ('1','13');
INSERT INTO vreme(id_korisnika, fldVreme) VALUES ('2','71');
INSERT INTO vreme(id_korisnika, fldVreme) VALUES ('2','92');

DELETE FROM vreme WHERE id_korisnika=2;
DELETE FROM korisnik WHERE id_korisnika=2;

SELECT * FROM korisnik INNER JOIN vreme ON korisnik.id_korisnika = vreme.id_korisnika ORDER BY fldVreme+0 ASC;
