FROM ubuntu:latest

# Install MySQL Server
RUN apt-get update && \
    DEBIAN_FRONTEND=noninteractive apt-get install -y mysql-server && \
    rm -rf /var/lib/apt/lists/*

# Set environment variables
ENV MYSQL_RANDOM_USER random_user
ENV MYSQL_RANDOM_PASSWORD random_password

# Copy entrypoint script
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Set entrypoint
ENTRYPOINT ["/entrypoint.sh"]

# Expose MySQL port
EXPOSE 3306

