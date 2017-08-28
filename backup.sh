#!/bin/bash

#login path
cd /home/ec2-user/github/

git add . 
# Git: add and commit changes
git commit -a -m "daily crontab backup `date`"

# send data to Git server
git push origin master

echo "backup completado el dia `date`" > backup.txt
