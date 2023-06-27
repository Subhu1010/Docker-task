FROM ubuntu

# Run commands in shell
RUN apt update && apt install -y ncal

# Set shell variable
ENV name=subhash

# Create directories
RUN mkdir hello hello1

# Display the calendar
RUN ncal

# Start a bash shell when the container is created
CMD ["bash"]

