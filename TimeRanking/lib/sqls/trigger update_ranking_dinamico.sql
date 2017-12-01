DELIMITER |

DROP TRIGGER IF EXISTS update_ranking_dinamico|

CREATE TRIGGER update_ranking_dinamico AFTER UPDATE ON characters
  FOR EACH ROW
    BEGIN
      IF OLD.pvpkills <> NEW.pvpkills THEN
        CALL insert_ranking_dinamico(NEW.obj_Id, 'pvp');
      ELSEIF (OLD.pkkills <> NEW.pkkills) THEN
        CALL insert_ranking_dinamico(NEW.obj_Id, 'pk');
      END IF;
    END;
|

DELIMITER ;