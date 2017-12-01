DROP VIEW IF EXISTS vclasses;
CREATE OR REPLACE
ALGORITHM=UNDEFINED 
VIEW vclasses AS 
SELECT ct.ClassId + 1 AS idClasse,
       ct.ClassName AS classe,
       ct.RaceId + 1 AS idRaca
FROM char_templates ct;