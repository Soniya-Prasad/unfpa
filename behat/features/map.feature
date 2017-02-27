Feature:
  In order to be able to view the map
  As an anonymous user
  We need to be able to have access to the map on any page

  @api
  Scenario Outline: Test default map pin basic display
    Given I am an anonymous user
    When  I visit the homepage
    Then  I should see on the map a pin with "<country>" from "<type>"

  Examples:
    | country     | type          |
    | Panama      | regional      |
    | Jamaica     | sub-regional  |
    | Switzerland | liaison       |


  @api
  Scenario Outline: Check if the map image exist under every language
    Given I am an anonymous user
    When  I visit the homepage
    And   I click on "<language>"
    Then  I should see the image map

    Examples:
      | language   |
      | English    |
      | Español    |
      | Français   |


  @api
  Scenario Outline: Check if the map image exist in the job page under every language
    Given I am an anonymous user
    When  I visit the "jobs" page
    And   I click on "<language>"
    Then  I should see the image map

    Examples:
      | language   |
      | English    |
      | Español    |
      | Français   |

