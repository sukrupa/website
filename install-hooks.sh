#!/bin/sh

check_os() {
	OS=`uname`

	if [ $OS == "Linux" ]; then
	    OS=linux
	    XAMPP_PATH=/opt/lampp/bin
	    echo "You are using linux :)"
	elif [ $OS == "Darwin" ]; then
	    OS=mac
	    XAMPP_PATH=/Applications/XAMPP/xamppfiles/bin
	    echo "You are using mac :)"
	else
	    OS=windows
	    XAMPP_PATH=/c/xampp/mysql/bin
	    echo "You are using windows :)"
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
	echo "Adding $XAMPP_PATH to your path..." 

	if [ -d $XAMPP_PATH ] && [[ ":$PATH:" != *":$XAMPP_PATH:"* ]]; then
	    PATH=$XAMPP_PATH:$PATH
	    export PATH
	    echo "XAMPP successfully added to your path."
	else
	    echo "XAMPP already on your path."
	fi

	echo "Your path is now $PATH"
}

check_os
install_hooks
add_mysql_to_path
sh .git/hooks/post-merge

echo "Hooks and database successfully installed"
