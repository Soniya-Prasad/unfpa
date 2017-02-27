Feature:
  In order to be able to view the swop page
  As an anonymous user
  We need to be able to have access to the swop page

  @api
  Scenario Outline: Check that we get a default set of articles that appear on
  the page.
    Given I am an anonymous user
    When  I visit the "swop-2015" page
    Then  I should see "<title>"
    Examples:
      | title                                                                  |
      | Women and girls are disproportionately disadvantaged                   |
      | 100 million people                                                     |
      | Natural Disasters                                                      |
      | Recorded Natural Disasters                                             |
      | Conflict                                                               |
      | Fragility and Vulnerability                                            |
      | The Fund For Peace's Fragile States Index 2015                         |
      | Risks to Women and Adolescents                                         |
      | Women do not stop getting pregnant or having babies when a crisis hits |
      | Although there are important differences among                         |
      | Until only 20 years ago, sexual and reproductive health took a back    |
      | United Nations humanitarian response                                   |
      | Healthy mothers                                                        |
      | UNFPA Supports Access to Services By Women And Girls                   |
      | Preventing and treating HIV                                            |
      | Preventing and addressing gender-based violence                        |
      | A conflict or disaster can erase in a moment a generation of economic  |
      | Women, girls and resilience                                            |
      | Inclusive, equitable development                                       |
      | Tip the balance from reaction to preparedness and resilience           |
      | Transformation can begin, in part, in the aftermath of a crisis        |
      | At the core of the interrelated elements of humanitarian action        |
      | Tear down the divide between humanitarian action and development       |

  @api
  Scenario: Check return to top button
    Given I am an anonymous user
    When  I visit the "swop-2015" page
    And   I click on "Moving forward"
    And   I should see text:
      | Tear down the divide between humanitarian action and development |
    Then   I click on "Return"
