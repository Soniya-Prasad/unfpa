#!/usr/bin/env bash

# Restore to default colours
RESTORE='\033[0m'
# Bold blue color
LBLUE='\033[01;34m'

# Run the regular db preparing script.
bash prepare_db_for_dev.example.sh

echo -e "${LBLUE} > Removing users passwords.${RESTORE}"
drush sqlq "UPDATE users SET pass = ''"

# Truncating unnecessary tables to reduce the size of the DB.
echo -e "${LBLUE} > Truncating unnecessary tables.${RESTORE}"
drush sqlq "truncate table watchdog"
drush sqlq "truncate table field_revision_body"
drush sqlq "truncate table field_revision_field_related_tags"
drush sqlq "truncate table field_revision_field_available_language"
drush sqlq "truncate table field_revision_field_thematic_area"
drush sqlq "truncate table field_revision_field_indicator_value"
drush sqlq "truncate table field_revision_field_indicator_name"
drush sqlq "truncate table field_revision_field_indicator_hover_text"
drush sqlq "truncate table field_revision_field_blurb"
drush sqlq "truncate table field_revision_field_show_feature"
drush sqlq "truncate table field_revision_field_publish_on_home"
drush sqlq "truncate table field_revision_field_admin_resource_pdf_upload"
drush sqlq "truncate table field_revision_field_admin_resource_doc_upload"
drush sqlq "truncate table field_revision_field_indicator"
drush sqlq "truncate table field_revision_field_author"
drush sqlq "truncate table field_revision_field_news_type"

echo
echo -e "${LBLUE} > Done.${RESTORE}"
