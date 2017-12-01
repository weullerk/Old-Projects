DROP EVENT IF EXISTS ranking_diario;

delimiter |

CREATE EVENT ranking_diario
    ON SCHEDULE
      EVERY 1 DAY
      STARTS '2012-11-02 00:00:00'
    DO UPDATE ranking_dinamico SET pvp_diario = 0, pk_diario = 0;
|

delimiter ;