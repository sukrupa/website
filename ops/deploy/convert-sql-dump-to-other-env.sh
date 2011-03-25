#!/usr/bin/env bash

# uncomment for debugging
set -x

INPUT_DUMP=$2
OUTPUT_DUMP=$3
NEW_HOST='sukrupa.localhost'


usage() {
    cat <<EOF
Convert database dumps from one environment to another environment. 
usage: $0 [option] <input-file> <output/file>  
       (files paths are recommended to be in lib/ directory.)
OPTIONS:
  -p  convert prod input data --> for $NEW_HOST
  -s  convert staging input data --> for $NEW_HOST
Note: this does not change the stored passwords, so if you 
run it, you will get a new password to logon to the wordpress
admin site. This means you need to know the admin password, or
change it afterwards.
EOF
}

if [[ $# != 3 ]]; then usage; exit 1; fi 

process() {
    sed -e "s/$ORIG_HOST/$NEW_HOST/g" $INPUT_DUMP > $OUTPUT_DUMP
}

while getopts "ps" OPTION; do
    case $OPTION in
	p)
	    ORIG_HOST='www.sukrupa.org'
	    process
	    ;;
	s)
	    ORIG_HOST='twu-staging'
	    process
	    ;;
	*)
	    usage
	    ;;
    esac
done
