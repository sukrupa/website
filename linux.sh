#!/bin/sh

XAMPP_ROOT=/opt/lampp

download_xampp() {
	if [ -f xampp-linux-1.7.4.tar.gz ]; then
		echo Using preexisting xampp-linux-1.7.4.tar.gz
	else
		echo "Can't find xampp-linux-1.7.4.tar.gz"
		echo "Downloading from http://sourceforge.net/projects/xampp/files/XAMPP%20Linux/1.7.4/xampp-linux-1.7.4.tar.gz"
		echo "If this takes forever for you (over an hour), you might have better luck getting it from someone else"
		echo "or downloading it yourself. If you choose to do so, stop this script and put it in the tools directory"
		echo "and then restart this script."
		echo "Installing curl..."
		sudo apt-get install curl
		curl "http://sourceforge.net/projects/xampp/files/XAMPP%20Linux/1.7.4/xampp-linux-1.7.4.tar.gz" -L -o xampp-linux-1.7.4.tar.gz 
	fi
}

install_xampp() {
	if [ -e "$XAMPP_ROOT" ]; then
		echo "Using preexisting XAMPP install at $XAMPP_ROOT"
	else
		download_xampp; 
		echo "Installing XAMPP to $XAMPP_ROOT"
		echo "Copying XAMPP files..."
		sudo tar xzvf xampp-linux-1.7.4.tar.gz -C /opt 
	fi
}

install_xampp; 

echo "Configuring XAMPP"
sudo bash -c "cp '$XAMPP_ROOT/etc/extra/httpd-vhosts.conf' '$XAMPP_ROOT/etc/extra/httpd-vhosts.conf.bak'"
sudo bash -c "sed s%##sukrupa-website-path##%$(pwd)% conf/apache-sukrupa-dev.conf.sample > '$XAMPP_ROOT/etc/extra/httpd-vhosts.conf'"
sudo cp conf/httpd.conf.linux "$XAMPP_ROOT/etc/httpd.conf"

if grep -q sukrupa /etc/hosts; then
    echo "/etc/hosts already configured; not modifying"
else
    echo "Adding sukrupa.localhost entry to /etc/hosts"
    sudo sh -c "echo 127.0.0.1	sukrupa.localhost>>/etc/hosts"
fi

sudo $XAMPP_ROOT/lampp startapache
sudo $XAMPP_ROOT/lampp startmysql

echo "Bootstrapping... (yeah...)"
./bootstrap-linux.sh -lR

#rm -R installed-wordpress/

echo "Upgrading PEAR..."
sudo $XAMPP_ROOT/bin/pear upgrade
sudo $XAMPP_ROOT/bin/pear channel-discover pear.phpunit.de
sudo $XAMPP_ROOT/bin/pear channel-discover components.ez.no 
sudo $XAMPP_ROOT/bin/pear channel-discover pear.symfony-project.com 
sudo $XAMPP_ROOT/bin/pear install --nodeps XML_RPC2 
sudo $XAMPP_ROOT/bin/pear install phpunit/PHPUnit
