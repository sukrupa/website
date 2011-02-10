#!/bin/bash

ROOT_MYSQL_PASSWORD='root'

usage() {
cat <<EOF
usage: $0 [options]

OPTIONS:
  -R	reset, totally wipe out local database and installed files
  -d	configure ci and staging deployment environments
  -l    configure local development environments (including to use staging server db)
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
    ls `pwd`/sukrupa-theme
    die_if_errors "You must run this from the root directory of the project"

	echo "************************************************************************************************************"
	echo "PREREQUISITES: "
	echo "*) You need to enable apache's mod_php5, mod_rewrite, and mod_substitute."
	echo ""
	echo "FOR CI AND STAGING SERVERS:"
	echo "*) You need to install MySQL community edition server, sudo apt-get install mysql-server php5mysql"
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

create_database_if_missing(){
    die_if_not_on_path 'mysql'
    die_if_not_on_path 'mysqladmin'

	echo "- Bootstraping wordpress configuration. (With default mysql 'root' user and password '$ROOT_MYSQL_PASSWORD') Creating database."
	echo "  If you do not have the mysql root password correct, run this command: mysqladmin -u root password root"

	mysql -uroot -p$ROOT_MYSQL_PASSWORD --verbose --execute="create database if not exists sukrupa2_wordpress default character set 'utf8';" 
	die_if_errors
}

install_wordpress(){
	echo "- extracting wordpress binary"
	mkdir -p logs/
	rm -rf installed-wordpress/
	unzip -qo lib/wordpress-3.0.4.zip -d .
	mv wordpress installed-wordpress
	cp -f lib/wp-config.php installed-wordpress/
	cp -f lib/.htaccess installed-wordpress/
	ln -sf `pwd`/sukrupa-theme/ ./installed-wordpress/wp-content/themes/sukrupa
	ln -sf `pwd`/content/ ./installed-wordpress/content
}

reset_db() {
    mkdir -p database-backups
    echo "- first creating backup of old database tables before dropping everything"
    timestamp=$(date "+%Y-%m-%d_%H-%M-%S")
    mysqldump sukrupa_wordpress -uroot -p$ROOT_MYSQL_PASSWORD > database-backups/sukrupa_wordpress.backupdump.$timestamp.sql   
    die_if_errors
    echo "  (If the database migration was successful, you may want to remove the backup db dump.)"
    echo "- now dropping everything from the database and recreating tables"
    mysql -uroot -p$ROOT_MYSQL_PASSWORD sukrupa_wordpress < lib/sukrupa_wordpress.dump.sql
    die_if_errors
}



while getopts "Rdl" OPTION
do
	case $OPTION in
		R)
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
	    *)
	        usage
	        ;;        
	esac
done


