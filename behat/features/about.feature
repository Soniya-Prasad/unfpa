Feature:
  In order to be able to view the about-us
  As an anonymous user
  We need to be able to have access to the about-us

  @api
  Scenario Outline: Visit every sidebar link.
    Given I am an anonymous user
    When  I visit the "about-us" page
    Then  I should see the "<section>" with the "<link>" and have access to the link destination

    Examples:
      | section       | link                         |
      | sidebar       | About us                     |
      | sidebar       | How we work                  |
      | sidebar       | Funds and funding            |
      | sidebar       | Jobs                         |
      | sidebar       | Procurement and Supply Chain |
      | sidebar       | Audit and Investigations     |
      | sidebar       | Evaluation                   |
      | sidebar       | Executive Board              |
      | sidebar       | Goodwill Ambassadors         |
      | sidebar       | UN Population Award          |
      | sidebar       | Frequently asked questions   |


  @api
  Scenario Outline: Visit every content link.
    Given I am an anonymous user
    When  I visit the "about-us" page
    And   I click on "<link>"
    Then  I should have access to the page

    Examples:
      | link                           |
      | Sexual and reproductive health |
      | child marriage                 |
      | female genital mutilation      |
      | human rights                   |
      | back decades                   |
      | maternal death and disability  |
      | demographic trends             |
      | adolescent girls               |
