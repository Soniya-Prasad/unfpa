#!/bin/sh
set -e

# ---------------------------------------------------------------------------- #
#
# Import the database.
#
# ---------------------------------------------------------------------------- #

# DB has no use if the profile is not installed.
if [ "$INSTALL_PROJECT" -ne 1 ]; then
 exit 0;
fi

# This is just a string that we take and put it when we download the file from
# The drive with the token, this is just a string.
DB_FILE_NAME="unfpa-global-27-10-2016-travis-sanitized.sql"
ZIPPED_FILE_NAME="${DB_FILE_NAME}.gz"

# When you upload a new file please fallow the info:
# Please do "Get shareable link" in the drive.
# From the sharable link copy the TOKEN to the DB_FILE_TOKEN
DB_FILE_TOKEN="0B03TjmhAnhq-UnkxNGFlR3NDWlU"

./gdown.pl $ZIPPED_FILE_NAME $DB_FILE_TOKEN
drush sql-create --db-url="mysql://root:@127.0.0.1/unfpa" -y
gzip -d $ZIPPED_FILE_NAME
du -sh $DB_FILE_NAME
mysql -u root unfpa < $DB_FILE_NAME
drush updb --db-url="mysql://root:@127.0.0.1/unfpa" -y
drush cc all --db-url="mysql://root:@127.0.0.1/unfpa" -y
