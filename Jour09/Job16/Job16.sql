UPDATE salles s
JOIN (
  SELECT id, nom, capacité
  FROM salles
  ORDER BY capacité DESC
  LIMIT 1
) max_cap ON s.id = max_cap.id
SET s.nom = CONCAT('Biggest Room (', max_cap.nom, ' - ', max_cap.capacité, ' places)');
