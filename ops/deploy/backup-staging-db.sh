#!/bin/bash

echo "this must be run in the directory holding lib, such as this:"
echo "sh ops/deploy/backup-staging-db.sh"
if [ ! -f lib/sukrupa_wordpress.dump.sql ]; then
   echo 'you appear to not be in the correct directory, exiting'
   exit 1
fi

# "backup latest twu-staging wordpress database"
echo "backing up..."
mysqldump -uroot -proot -htwu-staging sukrupa_wordpress > lib/sukrupa_wordpress.dump.sql
git status

echo ''
echo 'now you can commit'

