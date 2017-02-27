#!/bin/sh
set -e

# ---------------------------------------------------------------------------- #
#
# Installs Selenium.
#
# ---------------------------------------------------------------------------- #

# No need for Selenium if the profile is not installed.
if [ "$INSTALL_PROJECT" -ne 1 ]; then
 exit 0;
fi

# Install selenium
wget http://selenium-release.storage.googleapis.com/2.45/selenium-server-standalone-2.45.0.jar
