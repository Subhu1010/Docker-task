# Use CentOS as the base image
FROM centos:7

# Install Apache web server
RUN yum -y update
RUN yum -y install httpd 

WORKDIR /var/www/html
COPY website.html .


# Expose port 80 for web traffic
EXPOSE 80

# Start the Apache web server
CMD ["httpd", "-D", "FOREGROUND"]





