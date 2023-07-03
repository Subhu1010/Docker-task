FROM mysql:latest

# Set environment variables
ENV MYSQL_ROOT_PASSWORD my-secret-password
ENV MYSQL_RANDOM_USER my-random-user
ENV MYSQL_RANDOM_PASSWORD my-random-password

# Expose MySQL port
EXPOSE 3306

# Copy SQL initialization script
COPY init.sql /docker-entrypoint-initdb.d/

# Grant all privileges to random user
RUN chmod -R 755 /docker-entrypoint-initdb.d/

