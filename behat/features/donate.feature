Feature:
  In order to be able to view the donate
  As an anonymous user
  We need to be able to have access to the donate

  @api
  Scenario Outline: Learn More links available.
    Given I am an anonymous user
    When  I visit the "donate" page
    And   I click on "<link>"
    Then  I should have access to the page

    Examples:
    | link                 |
    | Learn More           |
    | Donate               |
    | harmful practice     |
    | die giving life      |
    | heartbreaking injury |

