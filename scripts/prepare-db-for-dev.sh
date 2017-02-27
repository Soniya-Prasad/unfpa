#!/usr/bin/env bash

TABLE_NAME="$1"

if [ ! $TABLE_NAME ]; then
    echo
    echo -e  " ERROR >>> Please provide a table name."
    echo
    echo -e  "       Example:"
    echo -e  "         > bash prepare-db-for-dev.sh <table_name>"
    echo
    exit 1
fi

echo
echo -e "You're about to modify a table named: '$TABLE_NAME'"
read -p "Are you sure (y/n)? "

if [[ ! $REPLY =~ ^[Yy]$ ]]
then
    exit
fi

echo
echo " > Changing the solr index to be read only."
mysql -uroot -e "UPDATE $TABLE_NAME.search_api_index SET read_only = '1'"

echo
echo " > Removing emails from all users."
mysql -uroot -e "UPDATE $TABLE_NAME.users SET mail = 'mail@example.invalid'"

echo
echo " > Enabling the devel module."
drush en devel -y

echo
echo " > Setting the error_level to display all the error messages."
drush vset error_level 2

echo
echo " > Disabling performance caching."
drush vset cache 0
drush vset block_cache 0
drush vset page_compression 0
drush vset preprocess_js 0
drush vset preprocess_css 0

echo
echo " > Disabling logs HTTP API (Loggly)."
drush vset logs_http_enabled 0

echo
echo " > Clearing all cache."
drush cc all
