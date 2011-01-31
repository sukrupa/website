echo "*******************************************"
echo "You need to enable on apache the php module."
echo "(On mac, uncomment in /etc/apache2/httpd.conf: LoadModule php5_module libexec/apache2/libphp5.so)"
echo "********************************************"

if [[ -z $(which mysql) ]] ; then
  echo "!!  Is mysql installed? It is not found on your path. Exiting... !!";
  exit 1
fi

echo ""
echo "We will bootstrap the wordpress configuration. Creating database."

mysql -uroot -p  --verbose --execute="create database if not exists sukrupa_wordpress default character set 'utf8';"


mkdir -p installed-wordpress/

echo "extracting wordpress binary"
unzip lib/wordpress-3.0.4.zip -q -d installed-wordpress
mv installed-wordpress/wordpress/* installed-wordpress
rm -fr installed-wordpress/wordpress

cp lib/wp-config.php installed-wordpress/

echo "first creating backup of old database tables before dropping everything"
timestamp=$(date "+%Y-%m-%d_%H-%M-%S")
mysqldump sukrupa_wordpress -uroot -p > sukrupa_wordpress.backupdump.$timestamp.sql   

echo "now dropping everything from the database and recreating tables"
mysql -uroot -p sukrupa_wordpress < lib/sukrupa_wordpress.dump.sql

echo "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!"
echo "You need to create a file that's similar to conf/apache-sukrupa-dev.conf with appropriate paths for your environment."
echo "Edit /etc/hosts to include l127.0.0.1 sukrupa.localhost"