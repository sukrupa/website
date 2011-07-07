#!/bin/bash

XAMPP_ROOT=/Applications/XAMPP

download_xampp() {
	if [ -e tools/xampp-macosx-1.7.3.dmg ]; then
		echo Using preexisting tools/xampp-macosx-1.7.3.dmg
	else
		echo "Can't find tools/xampp-macosx-1.7.3.dmg"
		echo "Downloading from http://downloads.sourceforge.net/project/xampp/XAMPP%20Mac%20OS%20X/1.7.3/xampp-macosx-1.7.3.dmg"
		echo "If this takes forever for you (over an hour), you might have better luck getting it from someone else"
		echo "or downloading it yourself. If you choose to do so, stop this script and put it in the tools directory"
		echo "and then restart this script."
		curl "http://downloads.sourceforge.net/project/xampp/XAMPP%20Mac%20OS%20X/1.7.3/xampp-macosx-1.7.3.dmg" -L -o tools/xampp-macosx-1.7.3.dmg
	fi
}

install_xampp() {
	if [ -e "$XAMPP_ROOT" ]; then
		echo "Using preexisting XAMPP install at $XAMPP_ROOT"
	else
		download_xampp
		echo "Installing XAMPP to $XAMPP_ROOT"
		mkdir mount
		hdiutil attach -mountpoint mount tools/xampp-macosx-1.7.3.dmg
		echo "Copying XAMPP files..."
		cp -R mount/XAMPP "$XAMPP_ROOT"
		hdiutil detach mount
		rmdir mount
	fi
}

install_xampp
cp "$XAMPP_ROOT/xamppfiles/etc/extra/httpd-vhosts.conf" "$XAMPP_ROOT/xamppfiles/etc/extra/httpd-vhosts.conf.bak"
sed s%##sukrupa-website-path##%/Users/sbhat/bb/sukrupa-website% conf/apache-sukrupa-dev.conf.sample > "$XAMPP_ROOT/etc/extra/httpd-vhosts.conf"
cp conf/httpd.conf "$XAMPP_ROOT/etc/httpd.conf"
sudo "echo 127.0.0.1	sukrupa.localhost>>/etc/hosts"
