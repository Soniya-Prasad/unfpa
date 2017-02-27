Feature:
  In order to be able to view the media center pages
  As an anonymous user
  We need to be able to access the media center pages

  @api
  Scenario Outline: Check that we get a default set of articles that appear on
  the page when we have no filters.
    Given I am an anonymous user
    When  I visit the "press/press-release" page
    Then  I should see "<title>"
    Examples:
      | title                                                               |
      | Press Release                                                       |
      | Search                                                              |
      | Thematic Area                                                       |
      | Year                                                                |
      | Read more                                                           |
      | Countries Commit to Boosting Support for Women, Girls During Crises |
      | SAFE BIRTH EVEN HERE                                                |

  @api
  Scenario: Check the articles filters.
    Given I am an anonymous user
    When  I visit the "press/press-release" page
    And   I set the filters:
      | text          | #edit-combine                                 | Girls Face Escalating Risk of Violence |
      | date          | #edit-field-news-date-value-value-year        | 2014                                   |
      | thematic area | #edit-field-thematic-area-tid-i18n            | -Maternal health                       |
    And   I press "Go"
    Then  I should see "Women, Girls Face Escalating Risk of Violence"

  @api
  Scenario: Check the articles filters.
    Given I am an anonymous user
    When  I visit the "press/media-advisory" page
    And   I set the filters:
      | text          | #edit-combine                                 | UNITED NATIONS                     |
      | date          | #edit-field-news-date-value-value-year        | 2015                               |
      | thematic area | #edit-field-thematic-area-tid-i18n            | -Youth leadership & participation  |
    And   I press "Go"
    Then  I should see "Investing in Young People to Secure Peace, Security in Lake Chad Basin Nations Attacked by Terrorists"

  @api
  Scenario: Check the articles filters.
    Given I am an anonymous user
    When  I visit the "press/statement" page
    And   I set the filters:
      | text          | #edit-combine                                 | Statement by Dr. Babatunde |
      | date          | #edit-field-news-date-value-value-year        | 2015                       |
      | thematic area | #edit-field-thematic-area-tid-i18n            | -Family planning           |
    And   I press "Go"
    Then  I should see "UNFPA Hopes Policy Changes Will Lead to Fulfillment of Chinese Couples' Rights on Family Size"

  @api
  Scenario: Check the articles filters.
    Given I am an anonymous user
    When  I visit the "press/speech" page
    And   I set the filters:
      | text          | #edit-combine                                 | Population and Development |
      | date          | #edit-field-news-date-value-value-year        | 2015                       |
      | thematic area | #edit-field-thematic-area-tid-i18n            | - Any                      |
    And   I press "Go"
    Then  I should see "48th session of the Commission on Population and Development"
