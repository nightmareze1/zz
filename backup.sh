#!/bin/bash

DATE=$(date +%F)

#login path
cd /home/ec2-user/github/
rm -rf mysql-backup.tar
tar -cvf "mysql-backup-$DATE.tar" mysql/
mv "mysql-backup-$DATE.tar" ../
aws s3 cp "mysql-backup-$DATE.tar" s3://itshellws/

git add .
# Git: add and commit changes
git commit -a -m "daily crontab backup `date`"

# send data to Git server
git push origin master

echo "backup completado el dia `date`" > backup.txt

