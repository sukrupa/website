echo "We will bootstrap the wordpress configuration."

mysql -uroot -p  --verbose --execute="create database if not exists sukrupa_wordpress default character set 'utf8';"
