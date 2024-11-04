DELIMITER $$
CREATE TRIGGER validate_cupos
BEFORE INSERT ON assistence
FOR EACH ROW
BEGIN
    DECLARE v_cupo INTEGER;
    DECLARE v_total_ocupados INTEGER;

    SELECT publication.cupo INTO v_cupo FROM publication WHERE publication.id = NEW.id_event LIMIT 1;
    SELECT COUNT(*) INTO v_total_ocupados FROM assistence WHERE assistence.id_event = NEW.id_event;
    
    IF v_total_ocupados >= v_cupo THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'No hay cupos disponibles para este evento';
    END IF;
END $$
DELIMITER ;


/*INSERT INTO publication(
    region,
    place,
    id_publicator,
    date,
    hour,
    cupo, 
    type_public,
    details,
    url,
    name
)
VALUES(
    'Quetzaltenango',
    'Centro intercultural',
    1,
    '2024-10-12',
    '08:00',
    100,
    'TEEN',
    'Conferencias del dev fest para adolescentes', 
    'www.google.com',
    'Dev Fest for teens'
);

UPDATE publication SET aprobed = TRUE WHERE id = 1;

SELECT publication.id, publication.name, publication.details 
FROM publication 
LEFT JOIN assistence ON publication.id = assistence.id_event
    GROUP BY publication.id, publication.name, publication.details, publication.cupo, publication.date, publication.hour
    HAVING COUNT(assistence.id_user) < publication.cupo
AND (publication.date < NOW() OR publication.hour <= CURTIME());*/
