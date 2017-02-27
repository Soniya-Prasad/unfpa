#!/bin/sh
set -e

# ---------------------------------------------------------------------------- #
#
# Run the behat tests.
#
# ---------------------------------------------------------------------------- #


# No need for Behat if the profile is not installed.
if [ "$INSTALL_PROJECT" -ne 1 ]; then
 exit 0;
fi

# Create display.
export DISPLAY=:99.0
sh -e /etc/init.d/xvfb start

# Disable 'imagemagick' module since we don't use files on travis.
drush dis imagemagick -y

# Disable dblog module to avoid extra stress on MySQL server.
drush dis dblog -y

# Since some contrib modules has been updated we should update the DB until
# the next dump.
# Since we run update on a DB that has installed pantheon Solr, we must enable
# before.
drush en pantheon_apachesolr -y
drush updb -y
drush dis pantheon_apachesolr -y

# start a web server on port 8080, run in the background; wait for initialization
drush rs 8080 > ~/server.log 2>&1 &
until netstat -an 2>/dev/null | grep '8080.*LISTEN'; sleep 1; curl -I http://127.0.0.1:8080 ; do true; done

# Run selenium.
java -jar selenium-server-standalone-2.45.0.jar -p 4444 > ~/selenium.log 2>&1 &
sleep 5

# Run behat tests
cd behat
./bin/behat --tags=~@wip

cd $TRAVIS_BUILD_DIR
