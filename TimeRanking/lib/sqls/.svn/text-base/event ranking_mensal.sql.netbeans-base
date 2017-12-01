DROP EVENT IF EXISTS ranking_diario;

delimiter |

CREATE EVENT ranking_diario
    ON SCHEDULE
      EVERY 1 MONTH
      STARTS '2012-12-01 00:00:00'
    DO UPDATE ranking_dinamico SET pvp_mensal = 0, pk_mensal = 0;
|

delimiter ;