Feature:
  In order to be able to view the homepage
  As an anonymous user
  We need to be able to have access to the homepage

  @api
  Scenario Outline: Visit every link in the menu sections.
    Given I am an anonymous user
    When  I visit the homepage
    Then  I should see the "<section>" with the "<link>" and have access to the link destination

    Examples:
      | section             | link                                         |
      | main menu           | Home                                         |
      | main menu           | About                                        |
      | main menu           | Topics                                       |
      | main menu           | Emergencies                                  |
      | main menu           | News                                         |
      | main menu           | Publications                                 |
      | main menu           | Media centre                                 |
      | news                | More News                                    |
      | publications        | More Publications                            |
      | videos              | More Videos                                  |
      | events              | Browse all Events                            |
      | footer              | Events                                       |
      | footer              | Videos                                       |
      | footer              | Contact                                      |
      | footer              | Site map                                     |
      | footer              | Terms of use                                 |
      | footer              | Safe birth. Even here.                       |
      | footer              | World Population Dashboard                   |
      | footer social links | Newsletter                                   |
      | footer social links | Twitter                                      |
      | footer social links | Facebook                                     |
      | footer social links | Gplus                                        |
      | footer social links | Youtube                                      |


  @api
  Scenario Outline: Visit sub navigation links.
    Given I am an anonymous user
    When  I visit the homepage
    Then  I should see the "<section>" with the "<link>" and have access to the link destination


    Examples:
      | section     | link                              |
      | About       | About us                          |
      | About       | How we work                       |
      | About       | Funds and funding                 |
      | About       | Jobs                              |
      | About       | Procurement and Supply Chain      |
      | About       | Audit and Investigations          |
      | About       | Evaluation                        |
      | About       | Executive Board                   |
      | About       | Goodwill Ambassadors              |
      | About       | UN Population Award               |
      | About       | Frequently asked questions        |
      | Topics      | Family planning                   |
      | Topics      | HIV & AIDS                        |
      | Topics      | Maternal health                   |
      | Topics      | Midwifery                         |
      | Topics      | Obstetric fistula                 |
      | Topics      | Sexual & reproductive health      |
      | Topics      | Adolescent pregnancy              |
      | Topics      | Child marriage                    |
      | Topics      | Comprehensive sexuality education |
      | Topics      | Youth leadership & participation  |
      | Topics      | Engaging men & boys               |
      | Topics      | Female genital mutilation         |
      | Topics      | Gender-based violence             |
      | Topics      | Gender equality                   |
      | Topics      | Human rights                      |
      | Topics      | Gender-biased sex selection       |
      | Topics      | Ageing                            |
      | Topics      | Census                            |
      | Topics      | Climate change                    |
      | Topics      | Demographic dividend              |
      | Topics      | Migration                         |
      | Topics      | Urbanization                      |
      | Topics      | Population Trends                 |
      | Emergencies | All emergencies                   |
      | Emergencies | Crisis in Syria                   |
      | Emergencies | Crisis in Iraq                    |
      | Emergencies | European Refugee Crisis           |
      | Emergencies | South Sudan Emergency             |

  @api
  Scenario: Check the links content in the news section.
    Given I am an anonymous user
    When  I visit the homepage
    Then  I click on the news links

  @api
  Scenario: Check the date links are available in the events section
    Given I am an anonymous user
    When  I visit the homepage
    Then  I should see "4" events
