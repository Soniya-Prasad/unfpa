Feature:
  In order to be able to view the jobs page
  As an anonymous user
  We need to be able to have access to the jobs page

  @api
  Scenario: Check the jobs filters.
  Given I am an anonymous user
  When  I visit the "jobs" page
  Then  I should see minimum one active job
  And   I should have access to the job results

  @api
  Scenario: Check the show all link.
    Given I am an anonymous user
    When  I visit the "jobs" page
    And   I click on "Show all"
    Then  I should see minimum one active job
    And   I should have access to the job results

