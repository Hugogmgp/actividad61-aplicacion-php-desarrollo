CREATE TABLE Pokemon (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  apellido VARCHAR(100) NOT NULL,
  nombre VARCHAR(100) NOT NULL,
  edad INT UNSIGNED NOT NULL,
  pokemon_principal VARCHAR(100) NOT NULL,
  puesto VARCHAR(100) NOT NULL,
  ciudad_natal varchar(100) not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO Pokemon (apellido, nombre, edad, pokemon_principal, puesto, ciudad_natal) VALUES('Ketchum', 'Ash', 10, 'Pikachu', 'Entrenador', 'Pueblo Paleta');
INSERT INTO Pokemon (apellido, nombre, edad, pokemon_principal, puesto, ciudad_natal) VALUES('Oviedo', 'Cynthia', 34, 'Garchomp', 'Campeon/a', 'Pueblo Caelestis');
INSERT INTO Pokemon (apellido, nombre, edad, pokemon_principal, puesto, ciudad_natal) VALUES('Vargas', 'Rojo', 19, 'Charizard', 'Campeon/a', 'Pueblo Paleta');
INSERT INTO Pokemon (apellido, nombre, edad, pokemon_principal, puesto, ciudad_natal) VALUES('Donoso', 'Misty', 20, 'Staryu', 'Lider', 'Ciudad Celeste');
INSERT INTO Pokemon (apellido, nombre, edad, pokemon_principal, puesto, ciudad_natal) VALUES('Celis', 'Brook', 30, 'Onix', 'Lider', 'Ciudad Plateada');
INSERT INTO Pokemon (apellido, nombre, edad, pokemon_principal, puesto, ciudad_natal) VALUES('Palencia', 'Iris', 15, 'Haxorus', 'Lider', 'Aldea Dragon');
INSERT INTO Pokemon (apellido, nombre, edad, pokemon_principal, puesto, ciudad_natal) VALUES('Zamanillo', 'Paul', 12, 'Electivire', 'Entrenador', 'sinnho');


