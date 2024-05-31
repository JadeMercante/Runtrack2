
SELECT * 
FROM `etudiants`  -- Replace 'utilisateurs' with your actual user table name
WHERE naissance < DATE_SUB(CURDATE(), INTERVAL 18 YEAR)