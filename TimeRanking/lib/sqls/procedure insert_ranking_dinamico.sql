DELIMITER |

DROP PROCEDURE IF EXISTS insert_ranking_dinamico|

CREATE PROCEDURE insert_ranking_dinamico(IN _char_id INTEGER, _tipo CHAR(3))
BEGIN
  IF (_tipo = 'pvp') THEN
    IF EXISTS(SELECT char_id FROM ranking_dinamico WHERE char_id = _char_id) THEN
      UPDATE ranking_dinamico SET pvp_diario = pvp_diario + 1, pvp_semanal = pvp_semanal + 1, pvp_mensal = pvp_mensal + 1 WHERE char_id = _char_id;
    ELSE
      INSERT INTO ranking_dinamico SET char_id = _char_id, pvp_diario = 1, pvp_semanal = 1, pvp_mensal = 1, pk_diario = 0, pk_semanal = 0, pk_mensal = 0;
    END IF;
  ELSEIF (_tipo = 'pk') THEN
    IF EXISTS(SELECT char_id FROM ranking_dinamico WHERE char_id = _char_id) THEN
      UPDATE ranking_dinamico SET pk_diario = pk_diario + 1, pk_semanal = pk_semanal + 1, pk_mensal = pk_mensal + 1 WHERE char_id = _char_id;
    ELSE
      INSERT INTO ranking_dinamico SET char_id = _char_id, pvp_diario = 0, pvp_semanal = 0, pvp_mensal = 0, pk_diario = 1, pk_semanal = 1, pk_mensal = 1;
    END IF;
  END IF;
END;
|

DELIMITER ;