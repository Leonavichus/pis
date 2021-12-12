DROP PROCEDURE IF EXISTS gen;
DELIMITER $$
CREATE PROCEDURE gen()
BEGIN
	UPDATE genre g
    	SET col = (SELECT count(title) as count_book
    	FROM books b
	WHERE b.idg = g.id
    	GROUP BY g.name);
END$$
DELIMITER ;

CALL gen();
------------------
DROP PROCEDURE IF EXISTS aut;
DELIMITER $$
CREATE PROCEDURE aut()
BEGIN
	UPDATE authors a
    	SET col = (SELECT count(title) as count_book
    	FROM books b
	WHERE b.ida = a.id
    GROUP BY a.surname);
END$$
DELIMITER ;

CALL auto();
------------------------
DROP PROCEDURE IF EXISTS aut_book;
DELIMITER $$
CREATE TRIGGER aut_book
AFTER INSERT
ON books
FOR EACH ROW
BEGIN
	UPDATE authors a SET col = (col+1) WHERE a.id = NEW.ida;
END$$
DELIMITER ;
------------------------
DROP PROCEDURE IF EXISTS gen_book;
DELIMITER $$
CREATE TRIGGER gen_book
AFTER INSERT
ON books
FOR EACH ROW
BEGIN
	UPDATE genre g SET col = (col+1) WHERE g.id = NEW.idg;
END$$
DELIMITER ;
------------------------
DROP PROCEDURE IF EXISTS aut_book;
DELIMITER $$
CREATE TRIGGER aut_book
AFTER DELETE
ON books
FOR EACH ROW
BEGIN
	UPDATE authors a SET col = (col-1) WHERE a.id = OLD.ida;
END$$
DELIMITER ;
-------------------------
DROP PROCEDURE IF EXISTS gen_book;
DELIMITER $$
CREATE TRIGGER gen_book
AFTER DELETE
ON books
FOR EACH ROW
BEGIN
	UPDATE genre g SET col = (col-1) WHERE g.id = OLD.idg;
END$$
DELIMITER ;
--------------------------
DROP PROCEDURE IF EXISTS all_genre;
DELIMITER $$
CREATE PROCEDURE all_genre()
BEGIN
	SELECT name FROM genre;
END$$
DELIMITER ;

CALL all_genre();
---------------------------
DROP PROCEDURE IF EXISTS genre_b;
DELIMITER $$
CREATE PROCEDURE genre_b(IN c VARCHAR(20))
BEGIN
	SELECT title,name FROM books b, genre g WHERE b.idg = g.id AND b.title=c;
END$$
DELIMITER ;

CALL genre_b("Пари");
-----------------------------
DROP PROCEDURE IF EXISTS books_g;
DELIMITER $$
CREATE PROCEDURE books_g(IN c VARCHAR(20))
BEGIN
	SELECT title,name FROM books b, genre g WHERE b.idg = g.id AND g.name=c;
END$$
DELIMITER ;

CALL books_g("Фэнтези");
------------------------------
DROP PROCEDURE IF EXISTS authors_b;
DELIMITER $$
CREATE PROCEDURE authors_b(IN c VARCHAR(20))
BEGIN
	SELECT title,surname,name,middlename,birthday,dob FROM books b, authors a WHERE b.ida = a.id AND b.title=c;
END$$
DELIMITER ;

CALL authors_b("Пари");
--------------------------------
DROP EVENT IF EXISTS book;
DELIMITER &&
CREATE EVENT book
ON SCHEDULE EVERY 10 SECOND 
DO
BEGIN
	INSERT INTO trash 
    SELECT * FROM books WHERE idg = 8;
END &&
DELIMITER ;