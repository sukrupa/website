#!/bin/sh

XAMPP_ROOT=/c/xampp

download_xampp() {
	if [ -f xampp-win32-1.7.4-VC6.tar.gz ]; then
		echo Using preexisting xampp-win32-1.7.4-VC6.tar.gz
	else
		echo "Can't find xampp-win32-1.7.4-VC6.tar.gz"
		echo "Downloading from http://sourceforge.net/projects/xampp/files/XAMPP%20Windows/1.7.4/xampp-win32-1.7.4-VC6.zip"
		echo "If this takes forever for you (over an hour), you might have better luck getting it from someone else"
		echo "or downloading it yourself. If you choose to do so, stop this script and put it in the tools directory"
		echo "and then restart this script."
		echo "Installing curl..."
	    apt-get install curl
		curl "http://sourceforge.net/projects/xampp/files/XAMPP%20Windows/1.7.4/xampp-win32-1.7.4-VC6.zip" -L -o xampp-win32-1.7.4-VC6.zip 
	fi
}

install_xampp() {
	if [ -e "$XAMPP_ROOT" ]; then
		echo "Using preexisting XAMPP install at $XAMPP_ROOT"
	else
		download_xampp; 
		echo "Installing XAMPP to $XAMPP_ROOT"
		echo "Copying XAMPP files..."
	    tar xvzf xampp-win32-1.7.4-VC6.tar.gz -C /c/ 
	fi
}

install_xampp; 

echo "Configuring XAMPP"
bash -c "cp $XAMPP_ROOT/apache/conf/extra/httpd-vhosts.conf $XAMPP_ROOT/apache/conf/extra/httpd-vhosts.conf.bak"
bash -c "sed s%##sukrupa-website-path##%$(pwd)% conf/apache-sukrupa-dev.conf.sample > '$XAMPP_ROOT/apache/conf/extra/httpd-vhosts.conf'"
cp conf/httpd.conf.windows "$XAMPP_ROOT/apache/conf/httpd.conf"

if grep -q sukrupa /etc/hosts; then
    echo "/etc/hosts already configured; not modifying"
else
    echo "Adding sukrupa.localhost entry to /etc/hosts"
    sh -c "echo 127.0.0.1	sukrupa.localhost>>/etc/hosts"
fi

sh -c ./startServers.bat

echo "Bootstrapping... (yeah...)"
./bootstrap-windows.sh -lR

#rm -R installed-wordpress/
echo "Upgrading PEAR..."
#sh -c ./upgradePear.bat

