CREATE OR REPLACE FUNCTION
anadir_usuario (usuario TEXT, correo TEXT, password TEXT)
RETURNS void AS $$
DECLARE 
	id INT;
BEGIN 
id = SELECT max(uid) FROM usuarios;
id = id + 1
INSERT INTO usuarios(uid, username, correo, password) VALUES (id, usuario, correo, password);
END 
$$ language plpgsql