USE laravel_instgramer;

-- Tabla users
INSERT INTO users VALUES(NULL, 'admin', 'Carlos', 'Schwarz', 'Charly', 'carlos@carlos', '123', NULL, CURTIME(), CURTIME(), NULL );
INSERT INTO users VALUES(NULL, 'user', 'Ana', 'Bignon', 'Bichito', 'ana@ana', '123', NULL, CURTIME(), CURTIME(), NULL );
INSERT INTO users VALUES(NULL, 'user', 'Damian', 'Rivero', 'Dami', 'dami@dami', '123', NULL, CURTIME(), CURTIME(), NULL );
INSERT INTO users VALUES(NULL, 'user', 'Diego', 'Rivero', 'PapaOso', 'diego@diego', '123', NULL, CURTIME(), CURTIME(), NULL );


-- Tabla images
INSERT INTO images VALUES(NULL, 1, 'test.jpg', 'Solo una fucking Prueba', CURTIME(), CURTIME());
INSERT INTO images VALUES(NULL, 3, 'prueba.jpg', 'Solo otra Prueba', CURTIME(), CURTIME());
INSERT INTO images VALUES(NULL, 4, 'prueba.jpg', 'Solo la ultima Prueba', CURTIME(), CURTIME());

-- Tabla comments
INSERT INTO comments VALUES(NULL, 1, 3, 'comentario', CURTIME(), CURTIME());
INSERT INTO comments VALUES(NULL, 2, 3, 'comentario', CURTIME(), CURTIME());
INSERT INTO comments VALUES(NULL, 2, 1, 'comentario', CURTIME(), CURTIME());
INSERT INTO comments VALUES(NULL, 4, 1, 'comentario', CURTIME(), CURTIME());
INSERT INTO comments VALUES(NULL, 4, 3, 'comentario', CURTIME(), CURTIME());
INSERT INTO comments VALUES(NULL, 4, 2, 'comentario', CURTIME(), CURTIME());
INSERT INTO comments VALUES(NULL, 1, 2, 'comentario', CURTIME(), CURTIME());

-- Tabla likes
INSERT INTO likes VALUES(NULL, 2, 3, CURTIME(), CURTIME());
INSERT INTO likes VALUES(NULL, 1, 3, CURTIME(), CURTIME());
INSERT INTO likes VALUES(NULL, 3, 3, CURTIME(), CURTIME());
INSERT INTO likes VALUES(NULL, 2, 1, CURTIME(), CURTIME());
INSERT INTO likes VALUES(NULL, 4, 2, CURTIME(), CURTIME());