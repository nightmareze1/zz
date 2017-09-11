#!/bin/bash

$fecha=`date`

#login path
cd /home/ec2-user/github/
rm -rf mysql-backup.tar
tar -cvf mysql-backup$fecha.tar mysql/
mv mysql-backup*.tar ../
aws s3 cp mysql-backup*.tar s3://itshellws/

git add . 
# Git: add and commit changes
git commit -a -m "daily crontab backup `date`"

# send data to Git server
git push origin master

echo "backup completado el dia `date`" > backup.txt
