# Choose base image
FROM ubuntu

# Run commands in shell
RUN apt update && apt install -y ncal

# Set shell variable
ENV name=subhash 

# Create directories
RUN mkdir hello hello1

# Display the calendar, name, and run date command
CMD ["/bin/bash", "-c", "echo $name && date"]




