FROM ubuntu

# Install Apache
RUN apt-get update 
RUN apt-get install -y apache2
RUN echo "<h1> Welocome to web-server<h1/>" > /var/www/html/index.html
# Set the environment variable for the port number
ENV PORT_NUMBER=80

# Update Apache configuration
RUN sed -i "s/Listen 80/Listen ${PORT_NUMBER}/" /etc/apache2/ports.conf
RUN sed -i "s/<VirtualHost \*:80>/<VirtualHost \*:${PORT_NUMBER}>/" /etc/apache2/sites-available/000-default.conf

# Expose the specified port
EXPOSE ${PORT_NUMBER}

# Start Apache server
CMD ["apachectl", "-D", "FOREGROUND"]
