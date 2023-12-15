# Database & Webserver
In this project I will be using Ansible to install PHPmyadmin & MariaDB + a webserver (nginx / apache) using docker so it doesn't matter what linux distro you use.

# Prerequisites
- Linux machine with SSH & ansible
- Root access or sudo user
- A working internet connection
- Installation of requirements.yml

# How to install
I will be using an ubuntu 20.04 machine to run the playbook, but this playbook will work for most other distro's.<br>

Get a linux machine and log in as root or sudo user
```bash 
sudo apt install ansible
``` 
Generate an SSH key if you haven't already. 
```bash
ssh keygen
``` 
Copy your SSH key to the machine you want to use this playbook on.
```bash
ssh-copy-id <username>@<ip-address>
``` 
Install the requirements.yml to get the needed collections and roles
```bash
ansible-galaxy install -r requirements.yml
```
