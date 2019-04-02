INSERT INTO ft_table (login, creation_date, `group`)
SELECT last_name, birthdate, 'other' AS `group`
FROM user_card
WHERE LOCATE('a', last_name) && LENGTH(last_name) < 9
ORDER BY last_name ASC
LIMIT 10;
