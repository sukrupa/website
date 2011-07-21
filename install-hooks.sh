#!/bin/bash

check_os() {
	OS=`uname`

	if [ $OS = "Linux" ]; then
	    OS=linux
	    XAMPP_PATH=/opt/lampp/bin
	    echo "You are using linux :)"
	elif [ $OS = "Darwin" ]; then
	    OS=mac
	    XAMPP_PATH=/Applications/XAMPP/xamppfiles/bin
	    echo "You are using mac :)"
	else
	    OS=windows
	    XAMPP_PATH=/c/xampp/mysql/bin
	    echo "You are using windows :)"
            echo "Please make sure your XAMPP is running"
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
 	    touch ~/.bash_profile
	    if ! grep -q $XAMPP_PATH ~/.bash_profile ; then
		echo "PATH=$XAMPP_PATH:$PATH" >> ~/.bash_profile
		echo "export PATH" >> ~/.bash_profile
		echo "XAMPP successfully added to your path."
	    fi
	else
	    echo "XAMPP already on your path."
	fi

	echo "Your path is now $PATH"
}

check_if_apache_running() { 
    if ! ps ax | grep -v grep | grep bin/httpd > /dev/null 
    then 
	echo "apache is not running."
	return 0 
    else 
	echo "apache is running..." 
    	return 1
    fi 
} 
 
check_if_mysql_running() { 
    if ! ps ax | grep -v grep | grep bin/mysqld > /dev/null 
    then 
	echo "mysql is not running."
	return 0 
    else 
	echo "mysql is running..."
	return 1 
    fi 
} 
 
if ! [[ $OS!="windows" ]] && check_if_apache_running && check_if_mysql_running
then
    echo "XAMPP does not appear to be running, please start it and run 
 	this script again"
    else
	check_os
	install_hooks
	add_mysql_to_path
	sh .git/hooks/post-merge
	echo "Hooks and database successfully installed"
fi

