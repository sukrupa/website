#!/bin/bash

echo "this must be run in the directory holding lib, such as this:"
echo "sh ops/deploy/pull-content-from-staging.sh"
if [ ! -f lib/sukrupa_wordpress.dump.sql ]; then
   echo 'you appear to not be in the correct directory, exiting'
   exit 1
fi

# "backup latest twu-staging wordpress database"
echo "backing up..."
mysqldump -uroot -proot -htwu-staging sukrupa_wordpress > lib/sukrupa_wordpress.dump.sql

echo "syncing the staging server to your local machine"
rsync --verbose --archive --progress --stats --compress --recursive --times --perms twu@twu-staging:/var/opt/sukrupa/sukrupa-website/content/ ./content/


echo ''
git status
echo ''
echo 'now you can commit'

