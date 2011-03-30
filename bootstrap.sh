#!/bin/bash

#uncomment for debugging script
#set -x

MYSQL_PASSWORD='root'
DATABASE_NAME=sukrupa_wordpress
DATABASE_HOST=localhost
DATABASE_USER=root
MYSQL_ARGS=" -u$DATABASE_USER -p$MYSQL_PASSWORD $DATABASE_NAME -h$DATABASE_HOST "

set_beta_db_vars() {
    if [[ -f ../conf/.mysql_beta_env ]]; then 
        source ../conf/.mysql_beta_env 
    else
        echo "Missing ../conf/.mysql_beta_env, exiting"
        exit 1
    fi
    DATABASE_NAME=sukrupa_wordpress_beta
    DATABASE_HOST=db.sukrupa.org
    DATABASE_USER=sukrupadb
    MYSQL_ARGS=" -u$DATABASE_USER -p$MYSQL_PASSWORD $DATABASE_NAME -h$DATABASE_HOST "
}

usage() {
cat <<EOF
usage: $0 [options]

OPTIONS:
  -R	reset, totally wipe out local database and installed files
  -d	configure ci and staging deployment environments
  -l    configure local development environments (including to use staging server db)
  -b    configure beta environment, overwriting database

Note: Options execute in the order given, so do -Rl, not -lR or it will reset last.
EOF
}

die() {
    echo >&2 "$@"
    echo "Fatal error, exiting"
    exit 1
}

die_if_errors() {
  if [  $? -gt 0 ]; then die; fi
}

die_if_not_on_path() {
  if [ -z $(which $1) ] ; then
    die "!!  Is $1 installed? It is not found on your path. Exiting... !!";
  fi
}

prerequisites() {
    die_if_errors "You must run this from the root directory of the project"

    echo "************************************************************************************************************"
    echo "PREREQUISITES: "
    echo "*) You need to enable apache's mod_php5, mod_rewrite, and mod_substitute."
    echo ""
    echo "FOR CI AND STAGING SERVERS:"
    echo "*) You need to install MySQL community edition server, sudo apt-get install mysql-server php5-mysql"
    echo "*) The go user must be able to run '/bin/ln' and '/etc/init.d/apache2 restart' as sudo without a password."
    echo "   i.e. in /etc/sudoers:  go ALL = (root) NOPASSWD: /bin/ln, /etc/init.d/apache2 restart"
    echo ""
    echo "FOR LOCAL DEVELOPMENT:"
    echo "*) Create a conf/apache-sukrupa-dev.conf with appropriate paths for your environment."
    echo "   Enable the 'Substitute' lines in module or it will show the wrong content (!! IMPORTANT !!)"
    echo "   Link it to apache. "
    echo "   i.e. on linux:"
    echo " 		sudo ln -s <ABSOLUTE path to>/conf/apache-sukrupa-dev.conf /etc/apache2/sites-enabled/"
    echo "   i.e. on mac:"
    echo "		sudo ln -s <ABSOLUTE path to>/conf/apache-sukrupa-dev.conf /etc/apache2/other/"
    echo "   and then on both, restart apache"
    echo "*) Edit /etc/hosts to include: 127.0.0.1 sukrupa.localhost"	
    echo "************************************************************************************************************"
}

create_database_if_missing() {
    die_if_not_on_path 'mysql'
    die_if_not_on_path 'mysqladmin'

    echo "- Bootstraping wordpress configuration. (With default mysql 'root' user and password '$MYSQL_PASSWORD') Creating database."
    echo "  If you do not have the mysql root password correct, run this command: mysqladmin -u root password root"

    mysql -u$DATABASE_USER -p$MYSQL_PASSWORD -h$DATABASE_HOST --verbose --execute="create database if not exists $DATABASE_NAME default character set 'utf8';" 
    die_if_errors
}

install_wordpress() {
    echo "- extracting wordpress binary"
    mkdir -p logs/
    rm -rf installed-wordpress/
    unzip -qo lib/wordpress.zip -d .
    mv wordpress installed-wordpress
    cp -f lib/wp-config.php installed-wordpress/
    cp -f lib/.htaccess installed-wordpress/
    cp -f content/favicon.ico installed-wordpress/
    ln -sf `pwd`/sukrupa-theme/ ./installed-wordpress/wp-content/themes/sukrupa
    ln -sf `pwd`/content/ ./installed-wordpress/content
    ln -sf `pwd`/plugins/sukrupa-volunteer-form ./installed-wordpress/wp-content/plugins/sukrupa-volunteer-form
}

reset_db() {
    mkdir -p database-backups
    echo "- first creating backup of old database tables before dropping everything"
    timestamp=$(date "+%Y-%m-%d_%H-%M-%S")
    mysqldump $MYSQL_ARGS > database-backups/sukrupa_wordpress.backupdump.$timestamp.sql   
    die_if_errors

    echo "  (If the database migration was successful, you may want to remove the backup db dump.)"
    echo "- now dropping everything from the database and recreating tables"
    mysql $MYSQL_ARGS < lib/sukrupa_wordpress.dump.sql
    die_if_errors
}

reset_db_beta() {    
    mkdir -p database-backups
    echo "- *********************************************************************************"
    echo "- ** WARNING: this imports the db as it is currently checked into the lib/ dir. **"
    echo "- ** If in error, restore the backup which we are creating now.                 **"
    echo "- *********************************************************************************"
    timestamp=$(date "+%Y-%m-%d_%H-%M-%S")
    mysqldump $MYSQL_ARGS > database-backups/sukrupa_wordpress_beta.dump.$timestamp.sql   
    die_if_errors
    
    sed 's/twu-staging/beta.sukrupa.org/g' lib/sukrupa_wordpress.dump.sql > lib/sukrupa_wordpress_beta.dump.sql
    die_if_errors

    echo "  (If the database migration was successful, you may want to remove the backup db dump.)"
    echo "- now dropping everything from the beta database and recreating tables"
    mysql $MYSQL_ARGS < $HOME/beta.sukrupa.org/lib/sukrupa_wordpress_beta.dump.sql
    die_if_errors
}

while getopts "Rdlb" OPTION
do
    case $OPTION in
	R)
	    create_database_if_missing
	    reset_db
	    ;;
	d)
	    prerequisites		
	    create_database_if_missing
	    install_wordpress
	    ;;
	l)
	    prerequisites
	    install_wordpress           
      	    ;;
	b)
	    prerequisites
	    install_wordpress
            set_beta_db_vars
            reset_db_beta
    	    ;;	
	*)
	    usage
	    ;;
    esac
done

if [[ $# == 0 ]]; then usage; fi
