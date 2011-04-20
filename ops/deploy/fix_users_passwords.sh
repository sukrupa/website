#!/usr/bin/env bash

PASS=$(mysql -u$DB_USER -p"$DB_PASS" -h$DB_HOST -D$DB_NAME -e 'select user_pass from wp_users;')

PASS=${PASS#'user_pass'}

PASSWORDS_ARRAY=$(echo $PASS | tr " " "\n")

# All passwords will be changed to 'admin'
PASSWORD_HASH='\$P\$BZH61OOO0uJvgqG3tpB2evsf7pxDdU0'

for CURRENT_PASS in $PASSWORDS_ARRAY
do
    # Escapes password hash for using on regexes    
    CURRENT_PASS=$(echo $CURRENT_PASS | sed -e "s/\\$/\\\\$/g")
    CURRENT_PASS=$(echo $CURRENT_PASS | sed -e 's/\//\\\//g')
    
    sed -i -e "s/$CURRENT_PASS/$PASSWORD_HASH/g" /tmp/sukrupa_wordpress.dump.from-$ENV-env.sql
done
