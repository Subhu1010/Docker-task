#!/bin/bash

# Check if the USERNAME and PASSWORD environment variables are set
if [ -z "$USERNAME" ] || [ -z "$PASSWORD" ]; then
  echo "ERROR: Environment variables USERNAME and PASSWORD must be set."
  exit 1
fi

# Create the user and set the password
useradd -m "$USERNAME"
echo "$USERNAME:$PASSWORD" | chpasswd

# Start the SSH service
service ssh start

# Keep the container running
tail -f /dev/null


