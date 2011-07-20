#!/bin/sh

check_os() {
	OS=`lowercase \`uname\``
	KERNEL=`uname -r`
	MACH=`uname -m`

	if [ "{$OS}" == "windowsnt" ]; then
	    OS=windows
	    XAMPP_PATH=/c/xampp/mysql/bin
	elif [ "{$OS}" == "darwin" ]; then
	    OS=mac
	    XAMPP_PATH=/Applications/XAMPP/xammpfiles/bin
	else
	    OS=linux
	    XAMPP_PATH=/opt/lampp/bin
	fi
}

install_hooks() {
	echo "Installing git hooks..."
	cp lib/pre-commit .git/hooks
	cp lib/post-merge .git/hooks
	chmod +x .git/hooks/pre-commit
	chmod +x .git/hooks/post-merge
	echo "Hooks installed."
}

add_mysql_to_path() {
	echo "Adding XAMPP mysql binary to your path..." 
	PATH=$XAMPP_PATH:$PATH
	export PATH
}

check_os
install_hooks
add_mysql_to_path
sh .git/hooks/post-merge

echo "Hooks and database successfully installed"
