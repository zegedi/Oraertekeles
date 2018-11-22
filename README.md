# Oraertekeles

MySQL adatbázis:

CREATE DATABASE oraertekeles;
USE oraertekeles;
CREATE TABLE ertekeles (
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(256) NOT NULL,
  pluses INT DEFAULT 0,
  minuses INT DEFAULT 0
);


Valamint szükséges a dbconn.php-ben az ip cím átállítása
