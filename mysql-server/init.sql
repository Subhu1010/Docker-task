CREATE USER '$MYSQL_RANDOM_USER'@'%' IDENTIFIED BY '$MYSQL_RANDOM_PASSWORD';
GRANT ALL PRIVILEGES ON *.* TO '$MYSQL_RANDOM_USER'@'%';
FLUSH PRIVILEGES;
