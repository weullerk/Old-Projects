DROP VIEW IF EXISTS vclans;
CREATE OR REPLACE
ALGORITHM=UNDEFINED 
VIEW vclans AS 
SELECT cl.clan_name AS nome,
       ch.char_name AS lider,
       cl.ally_id AS idAlianca,
       IF(cl.ally_name = '', 'Sem ally', IFNULL(cl.ally_name, 'Sem ally')) AS alianca,
       IFNULL(ca.name, 'Sem castelo') AS castelo,
       cl.clan_level AS level,
       COUNT(clch.char_name) AS membros,
       cl.reputation_score AS reputacao,
       SUM(clch.pvpkills) AS pvp,
       SUM(clch.pkkills) AS pk
FROM clan_data cl
JOIN characters ch ON ch.obj_Id = cl.leader_id
LEFT JOIN castle ca ON ca.id = cl.hasCastle
JOIN characters clch ON clch.clanid = cl.clan_id GROUP BY clch.clanid;
