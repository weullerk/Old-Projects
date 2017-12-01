DROP VIEW IF EXISTS vcharacters;
CREATE OR REPLACE
ALGORITHM=UNDEFINED 
VIEW vcharacters AS 
SELECT ch.char_name AS nome,
       ch.race + 1 AS idRaca,
       IF(ch.race = 0, 'Humano', IF(ch.race = 1, 'Elf', IF(ch.race = 2, 'Dark Elf', IF(ch.race = 3, 'Orc', IF(ch.race = 4, 'Dwarf', 'Raça Inválida'))))) AS raca,
       ch.classid + 1 AS idClasse,
       cht.ClassName AS classe,
       ch.clanid AS idClan,
       IFNULL(cl.clan_name, 'Sem Clan') AS clan,
       ch.level AS level,
       ch.pvpkills AS pvp,
       ch.pkkills AS pk,
       ch.karma,
       ch.onlinetime AS tempoOn,
       ch.rec_have AS recomendacoes,
       ch.maxCp AS cp,
       ch.maxHp AS hp
FROM characters ch
JOIN char_templates cht ON cht.ClassId = ch.classid
LEFT JOIN clan_data cl ON cl.clan_id = ch.clanid
WHERE ch.accesslevel = 0;
