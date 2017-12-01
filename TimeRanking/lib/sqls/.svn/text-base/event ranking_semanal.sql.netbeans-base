DROP EVENT IF EXISTS ranking_diario;

delimiter |

CREATE EVENT ranking_diario
    ON SCHEDULE
      EVERY 1 WEEK
      STARTS '2012-11-04 00:00:00'
    DO UPDATE ranking_dinamico SET pvp_semanal = 0, pk_semanal = 0;
|

delimiter ;