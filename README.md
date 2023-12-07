# Database & Webserver
In this project I will be using Ansible to install PHPmyadmin & MariaDB + a webserver (nginx / apache) using docker so it doesn't matter what linux distro you use.

# Prerequisites
- Linux machine with SSH & ansible
- Root access or sudo user
- A working internet connection
- Installation of requirements.yml

# How to install
I will be using an ubuntu 20.04 machine to run the playbook, but this playbook will work for most other distro's.<br>

Get a linux machine and log in as root or sudo user <br>
```sudo apt install ansible``` <br>
Generate an SSH key if you haven't already. <br>
```ssh keygen``` <br>
Copy your SSH key to the machine you want to use this playbook on. <br>
```ssh-copy-id -i ~/.ssh/id_rsa.pub <username>@<ip-address>``` <br>
Install the requirements.yml to get the needed collections and roles <br>
```ansible-galaxy install -r requirements.yml```