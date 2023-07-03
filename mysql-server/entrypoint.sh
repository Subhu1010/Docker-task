#!/bin/bash

# Check if random user and password are provided, otherwise generate them
if [ -z "$MYSQL_RANDOM_USER" ]; then
    MYSQL_RANDOM_USER=$(cat /dev/urandom | tr -dc 'a-zA-Z0-9' | fold -w 10 | head -n 1)
fi

if [ -z "$MYSQL_RANDOM_PASSWORD" ]; then
    MYSQL_RANDOM_PASSWORD=$(cat /dev/urandom | tr -dc 'a-zA-Z0-9' | fold -w 10 | head -n 1)
fi

# Start MySQL server
service mysql start

# Wait for MySQL server to start
while ! mysqladmin ping --silent; do
    sleep 1
done

# Create user and grant access to the database
mysql --execute="CREATE USER '$MYSQL_RANDOM_USER'@'%' IDENTIFIED BY '$MYSQL_RANDOM_PASSWORD';"
mysql --execute="GRANT ALL PRIVILEGES ON *.* TO '$MYSQL_RANDOM_USER'@'%';"
mysql --execute="FLUSH PRIVILEGES;"

# Wait indefinitely to keep the container running
tail -f /dev/null


