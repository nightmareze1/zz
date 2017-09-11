#!/bin/bash

DATE=$(date +%F)

#login path
cd /home/ec2-user/github/
rm -rf mysql-backup.tar
tar -cvf "mysql-backup-$DATE.tar" mysql/
mv "mysql-backup-$DATE.tar" ../
cd /home/ec2-user
aws s3 cp "mysql-backup-$DATE.tar" s3://itshellws/
rm -rf mysql-backup-*
cd /home/ec2-user/github/

git add .
# Git: add and commit changes
git commit -a -m "daily crontab backup `date`"

# send data to Git server
git push origin master

echo "backup completado el dia `date`" > backup.txt

