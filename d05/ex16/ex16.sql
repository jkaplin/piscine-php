SELECT COUNT(date) as 'movies' FROM member_history
WHERE (date BETWEEN '2006/10/30' AND '2007/7/27') OR (MONTH(date) = 12 AND DAY(date) = 24);