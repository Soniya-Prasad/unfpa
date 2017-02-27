Feature:
  In order to be able to view the events page
  As an anonymous user
  We need to be able to have access to the events page

  @api
  Scenario: Check the details links
  Given I am an anonymous user
  When  I visit the "events" page
  Then  I click on "Upcoming Events"
  And   I should have access to the page

  @api
  Scenario: Check the past events button
    Given I am an anonymous user
    When  I visit the "events" page
    Then  I click on "Past Events"
    And   I should have access to the page
