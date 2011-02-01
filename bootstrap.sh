echo "************************************************************************************************************"
echo "PREREQUISITES: "
echo "1) You need to install MySQL community edition server"
echo "2) You need to enable on apache the php module."
echo "   (On mac, uncomment in /etc/apache2/httpd.conf: LoadModule php5_module libexec/apache2/libphp5.so)"
echo "3) Create a file that's similar to conf/apache-sukrupa-dev.conf with appropriate paths for your environment."
echo "4) Edit /etc/hosts to include: 127.0.0.1 sukrupa.localhost"
echo "************************************************************************************************************"

die () {
    echo >&2 "$@"
    echo "Fatal error, exiting"
    exit 1
}

die_if_errors() {
  if [[  $? -gt 0 ]]; then die; fi
}


if [[ -z $(which mysql) ]] ; then
  die "!!  Is mysql installed? It is not found on your path. Exiting... !!";
fi

ROOT_MYSQL_PASSWORD='root'

echo ""
echo "Bootstraping wordpress configuration. (With default mysql 'root' user and password '$ROOT_MYSQL_PASSWORD') Creating database."
echo "If you do not have the mysql root password correct, run this command: mysqladmin -u root password root"

mysql -uroot -p$ROOT_MYSQL_PASSWORD --verbose --execute="create database if not exists sukrupa_wordpress default character set 'utf8';" 
die_if_errors

mkdir -p installed-wordpress/

# TODO: add step to clean (and back up) any existing installed-wordpress/ directory, and then initialize the template directory

echo "extracting wordpress binary"
unzip -q lib/wordpress-3.0.4.zip -d installed-wordpress
mv installed-wordpress/wordpress/* installed-wordpress
rm -fr installed-wordpress/wordpress

cp lib/wp-config.php installed-wordpress/

echo "first creating backup of old database tables before dropping everything"
timestamp=$(date "+%Y-%m-%d_%H-%M-%S")
mysqldump sukrupa_wordpress -uroot -p$ROOT_MYSQL_PASSWORD > sukrupa_wordpress.backupdump.$timestamp.sql   
die_if_errors

echo "now dropping everything from the database and recreating tables"
mysql -uroot -p$ROOT_MYSQL_PASSWORD sukrupa_wordpress < lib/sukrupa_wordpress.dump.sql
die_if_errors

echo ""
echo "(If the database migration was successful, you may want to remove the backup db dump.)"