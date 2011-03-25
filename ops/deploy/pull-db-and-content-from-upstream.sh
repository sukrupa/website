#!/usr/bin/env bash

if [ ! -f lib/sukrupa_wordpress.dump.sql ]; then
   echo 'you appear to not be in the correct directory, exiting'
   echo "this must be run in the directory holding lib, such as this:"
   echo "sh ops/deploy/pull-content-from-staging.sh"
   exit 1
fi

maybe_explain_password_prompt() {
    echo "If prompted, please enter the $1 password"
}

db_backup() {
    echo "=== backing up db... ==="
    maybe_explain_password_prompt $DB_USER@$DB_HOST
    mysqldump -u$DB_USER -p$DB_PASS -h$DB_HOST $DB_NAME > lib/sukrupa_wordpress.dump.from-$ENV-env.sql
}

content_sync() {
    echo "=== syncing the  server to your local machine... ==="
    maybe_explain_password_prompt $CONTENT_USER@$CONTENT_HOST
    rsync --verbose --archive --progress --stats --compress --recursive \
	--times --perms $CONTENT_USER@$CONTENT_HOST:$CONTENT_PATH ./content/
}

prompt_git() {
    echo '=== your manual steps, git status: ==='
    git status
    echo ''
    echo 'Now you choose to manually import the content into a db, or'
    echo 'replace the dump committed in lib/sukrupa_wordpress.dump.sql'
    echo ''
}

usage() {
    cat <<EOF
This tool is designed to pull data from a different environment, 
and prepare if for local import.
usage: $0 [options]

OPTIONS:
  -p   copy from production
  -s   copy from staging

Note: when copying from Prod, if you commit it will break Staging.
This is WIP, see Jonathan please with questions!
EOF
}

while getopts "ps" OPTION; do
    case $OPTION in
	p)
	    # TODO: jaw, does not work (yet) b/c disallows connections from all but 
	    # sukrupa.org server IP. To fix by sshing into sukrupa.org, source ~/conf/.mysql_beta_env
	    # use that password, and make dump. Then scp that to my local machine.
	    ENV=prod
	    DB_HOST=db.sukrupa.org
	    DB_USER=sukrupadb
	    DB_NAME=sukrupa_wordpress_production
	    CONTENT_HOST=sukrupa.org
	    CONTENT_USER=sukrupaweb
	    CONTENT_PATH=/home/sukrupaweb/sukrupa.org/current/content/
	    db_backup
	    content_sync
	    prompt_git
	    ;;
	s)
	    ENV=staging
	    DB_HOST=twu-staging
	    DB_USER=root
	    DB_NAME=sukrupa_wordpress
	    DB_PASS=root
	    CONTENT_HOST=twu-staging
	    CONTENT_USER=twu
	    CONTENT_PATH=/var/opt/sukrupa/sukrupa-website/content/
	    db_backup
	    content_sync
	    prompt_git
	    ;;
	*)
	    usage
	    exit 1
    esac
done

if [[ $# == 0 ]]; then usage; fi 