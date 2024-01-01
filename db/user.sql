-- SQL queries that would create user for database

CREATE USER 'unreceipts'@'localhost' IDENTIFIED BY 'Pi6a^c9njcj]';
GRANT INSERT, UPDATE, DELETE, SELECT on unreceipts.* TO 'unreceipts'@'localhost' WITH GRANT OPTION;