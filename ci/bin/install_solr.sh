#!/bin/sh
set -e

# ---------------------------------------------------------------------------- #
#
# Installs SOLR search server.
#
# ---------------------------------------------------------------------------- #

# No need for Solr if the profile is not installed.
if [ "$INSTALL_PROJECT" -ne 1 ]; then
 exit 0;
fi

# We use a script hosted on GitHub.
git clone git@github.com:RoySegall/solr-script.git
bash solr-script/solr.sh > ~/solr.log 2>&1 &
