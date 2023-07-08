FROM ubuntu:latest

# Install OpenSSH server
RUN apt-get update && apt-get install -y openssh-server
RUN mkdir /var/run/sshd

# Set environment variables for username and password
ENV USERNAME <desired_username>
ENV PASSWORD <desired_password>

# Create a new user and set the password
RUN useradd -m ${USERNAME} && \
    echo ${USERNAME}:${PASSWORD} | chpasswd && \
    usermod --shell /bin/bash ${USERNAME} && \
    usermod -aG sudo ${USERNAME}

# SSH login fix
RUN sed -i 's/#PermitRootLogin prohibit-password/PermitRootLogin no/' /etc/ssh/sshd_config
RUN echo 'PasswordAuthentication yes' >> /etc/ssh/sshd_config
RUN echo 'PubkeyAuthentication no' >> /etc/ssh/sshd_config
RUN echo 'AllowTcpForwarding yes' >> /etc/ssh/sshd_config

# Create SSH directory and empty known_hosts file
RUN mkdir -p /home/${USERNAME}/.ssh && \
    chmod 700 /home/${USERNAME}/.ssh && \
    touch /home/${USERNAME}/.ssh/known_hosts && \
    chmod 644 /home/${USERNAME}/.ssh/known_hosts && \
    chown -R ${USERNAME}:${USERNAME} /home/${USERNAME}/.ssh

# Remove offending host key from known_hosts file
RUN ssh-keygen -R localhost

EXPOSE 22

CMD ["/usr/sbin/sshd", "-D"]

