CREATE OR REPLACE FUNCTION
seleccionar_ciudades (idartista integer)
RETURNS TABLE (idciudad integer, nombreciudad varchar(255)) AS $$
BEGIN
RETURN QUERY SELECT DISTINCT ciudades.idciudad, ciudades.nombreciudad from artistas, obrasartistas, obras, lugares, ciudades where artistas.idartista = obrasartistas.idartista and obrasartistas.idobra = obras.idobra and obras.idlugar = lugares.idlugar and lugares.idciudad = ciudades.idciudad and artistas.idartista = $1;
RETURN;
END
$$ language plpgsql