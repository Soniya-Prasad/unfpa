<?php

use Drupal\DrupalExtension\Context\DrupalContext;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

class FeatureContext extends DrupalContext implements SnippetAcceptingContext {

  /**
   * @When /^I visit the homepage$/
   */
  public function iVisitTheHomepage() {
    $this->getSession()->visit($this->locatePath('/'));
  }

  /**
   * @Then I should have access to the page
   */
  public function iShouldHaveAccessToThePage() {
    $this->assertSession()->statusCodeEquals('200');
  }

  /**
   * Get the anchor element by it's text and it's relative parent element.
   *
   * @param $section
   *  The anchor element relative parent element.
   * @param $link_text
   *  The anchor element text.
   * @return mixed|null
   * @throws Exception
   */
  private function getLinkElement($section, $link_text) {
    $page = $this->getCurrentPage();

    switch ($section) {
      case 'main menu':
        $link = $page->find('xpath', '//section[@id="block-system-main-menu"]//ul[@class="menu"]//li[contains(@class, "level-1")]/a[contains(., "' . $link_text . '")]');
        break;

      case 'About':
        $link = $page->find('xpath', '//section[@id="block-system-main-menu"]//ul[@class="menu"]//li[contains(@class, "level-2")]/a[contains(., "' . $link_text . '")]');
        break;

      case 'events':
        $link = $page->find('xpath', '//div[contains(@class, "view-vw-events")]//a[contains(., "' . $link_text . '")]');
        break;

      case 'news':
        $link = $page->find('xpath', '//div[contains(@class, "pane-vw-news")]//a[contains(., "' . $link_text . '")]');
        break;

      case 'publications':
        $link = $page->find('xpath', '//div[contains(@class, "pane-vw-publications")]//a[contains(., "' . $link_text . '")]');
        break;

      case 'videos':
        $link = $page->find('xpath', '//div[contains(@class, "pane-vw-video")]//a[contains(., "' . $link_text . '")]');
        break;

      case 'sidebar':
        $link = $page->find('xpath', '//div[@id="sub-page-template"]//ul[@class="menu"]//li[contains(@class, "level-2")]/a[contains(., "' . $link_text . '")]');
        break;

      case 'Topics':
        $link = $page->find('xpath', '//section[@id="block-system-main-menu"]//ul[@class="menu"]//li/a[contains(., "' . $link_text . '")]');
        break;

      case 'Emergencies':
        $link = $page->find('xpath', '//section[@id="block-system-main-menu"]//ul[@class="menu"]//li/a[contains(., "' . $link_text . '")]');
        break;

      case 'carousel':
        $link = $page->find('xpath', '//div[contains(@class, "carousel")]//a[contains(., "' . $link_text . '")]');
        break;

      case 'stay connected':
        $link = $page->find('xpath', '//div[contains(@class, "stay_connected")]//a[contains(., "' . $link_text . '")]');
        break;

      case 'footer':
        $link = $page->find('xpath', '//div[@id="footer_links"]//ul[@class="menu"]//li[contains(@class, "level-1")]/a[contains(., "' . $link_text . '")]');
        break;

      case 'footer social links':
        $link = $page->find('xpath', '//div[@id="footer_social"]//a[contains(., "' . $link_text . '")]');
        break;

      default:
        $link = FALSE;
    }

    // In case we have no link.
    if (!$link) {
      $variables = array('@section' => $section, '@link' => $link_text);
      throw new \Exception(format_string("The link: '@link' was not found on section: '@section'", $variables));
    }
    return $link;
  }

  /**
   * @Then I should see the :arg1 with the :arg2 and have access to the link destination
   */
  public function iShouldSeeTheWithTheAndHaveAccessToTheLinkDestination($section, $link_text) {

    $link = $this->getLinkElement($section, $link_text);
    // Check if we have access to the page (link url).
    $link->click();
    $url = $this->getSession()->getCurrentUrl();
    $code = $this->getSession()->getStatusCode();
    // In case the link url doesn't return a status code of '200'.
    if ($code != '200') {
      $variables = array(
        '@code' => $code,
        '@url' => $url,
        '@section' => $section,
      );
      $message = "The page code is '@code' it expects it to be '200' (from url: @url at section: @section)";
      throw new \Exception(format_string($message, $variables));
    }
  }

  /**
   * @When I visit the homepage and I pick the language :arg1
   */
  public function iVisitTheHomepageAndIPickTheLanguage($language) {

    // In case no language was supplied as an argument.
    if (empty($language)) {
      throw new \Exception('No language was picked for the site');
    }

    // Get the target language link.
    $page = $this->getCurrentPage();
    $language = strtolower($language);
    $language_link = $page->find('xpath', '//header[@id="header"]//ul[@class="language-switcher-locale-url"]//li[contains(@class, "' . $language . '")]//a');

    // In case no link was found for the target language.
    if (!$language_link) {
      throw new \Exception(format_string("No language link was found for the language: @language", array('@language' => $language)));
    }

    // Preserve the current language.
    $language_link->click();
  }

  /**
   * @Then I should see that the :arg1 inside the :arg2 was translated into the site current language
   */
  public function iShouldSeeThatTheInsideTheWasTranslatedIntoTheSiteCurrentLanguage($text, $section) {
    $page = $this->getCurrentPage();

    switch ($section) {
      case 'navigation links':
        // Get the target links.
        $links = $page->findAll('xpath', '//section[@id="block-system-main-menu"]//ul[@class="menu"]//li[contains(@class, "level-1")]/a');

        // The translated text to compare against.
        $translated_text = explode(', ', $text);
        foreach ($links as $index => $link) {
          // In case the link text is not translated accordingly.
          if (!in_array($link->getText(), $translated_text)) {
            $variables = array(
              '@translation' => $link->getText(),
              '@number' => $index + 1,
            );
            throw new \Exception(format_string("The translation: '@translation' for link number: @number was not found", $variables));
          }
        }
        break;

      case 'slogan':
        $slogan = $page->find('xpath', '//section[@id="main"]//p[@class="unfpa-slogan"]');
        if (strpos($slogan->getHtml(), $text) === FALSE) {
          throw new \Exception(format_string("The slogan: '@slogan' was not found", array('@slogan' => $text)));
        }
        break;

      case 'site logo':
        $logo_image = $page->find('xpath', '//header[@id="header"]//a[@id="logo"]//img');

        // In case the image 'alt'' attribute is in incorrect.
        if (strpos($logo_image->getAttribute('alt'), $text) === FALSE) {
          throw new \Exception(format_string("The logo image alt text: '@text' was not found", array('@text' => $text)));
        }
        break;

      default:
        throw new \Exception(format_string("The section: @section isn't valid", array('@section' => $section)));
    }
  }

  /**
   * @When I visit the :arg1 page
   */
  public function iVisitThePage($page) {
    $this->getSession()->visit($this->locatePath('/' . $page));
  }

  /**
   * @Then I should see the portal title :arg1
   */
  public function iShouldSeeThePortalTitle($title_text) {
    $page = $this->getCurrentPage();

    $this->iWaitForCssElement('#active-activities', "appear");
    if (!strpos($page->getText(), $title_text)) {
      throw new \Exception(format_string("Could not find the '@text' at '@url'.", array(
        '@text' => $title_text,
        '@url' => $this->getSession()->getCurrentUrl()
      )));
    }
  }

  /**
   * @When I click on :arg1 tab
   */
  public function iClickOnButtonTab($button) {
    $page_url = $this->getSession()->getCurrentUrl();
    $page = $this->getSession()->getPage();

    // Click the Donut tab.
    if (!$chart_tabs = $page->find('css', 'li[tabfor="' . $button . '"]')) {
      throw new \Exception(format_string("Could not find the '@core' button in `donut_chart_tab` button at '@url'.", array(
        '@core' => $button,
        '@url' => $page_url
      )));
    }
    $chart_tabs->click();
  }

  /**
   * @Then /^I wait for css element "([^"]*)" to "([^"]*)"$/
   */
  private function iWaitForCssElement($element, $appear) {
    $xpath = $this->getSession()
      ->getSelectorsHandler()
      ->selectorToXpath('css', $element);
    $this->waitForXpathNode($xpath, $appear == 'appear');
  }

  /**
   * Helper function; Execute a function until it return TRUE or timeouts.
   *
   * @param $fn
   *   A callable to invoke.
   * @param int $timeout
   *   The timeout period. Defaults to 10 seconds.
   *
   * @throws Exception
   */
  private function waitFor($fn, $timeout = 10000) {
    $start = microtime(TRUE);
    $end = $start + $timeout / 1000.0;
    while (microtime(TRUE) < $end) {
      if ($fn($this)) {
        return;
      }
    }
    throw new \Exception('waitFor timed out.');
  }

  /**
   * Wait for an element by its XPath to appear or disappear.
   *
   * @param string $xpath
   *   The XPath string.
   * @param bool $appear
   *   Determine if element should appear. Defaults to TRUE.
   *
   * @throws Exception
   */
  private function waitForXpathNode($xpath, $appear = TRUE) {
    $this->waitFor(function ($context) use ($xpath, $appear) {
      try {
        $nodes = $context->getSession()->getDriver()->find($xpath);
        if (count($nodes) > 0) {
          $visible = $nodes[0]->isVisible();
          return $appear ? $visible : !$visible;
        }
        return !$appear;
      } catch (WebDriver\Exception $e) {
        if ($e->getCode() == WebDriver\Exception::NO_SUCH_ELEMENT) {
          return !$appear;
        }
        throw $e;
      }
    });
  }

  /**
   * @When I should see on the map a pin with :arg1 from :arg2
   */
  public function iShouldSeeOnTheMapAPinWithFrom($country, $type) {
    $page = $this->getCurrentPage();

    // Pin type query selector.
    $by_type = '//a[contains(@class, "pin ' . $type . '")]';
    // Pin country query selector.
    $by_country = '/following-sibling::div[@class="quick-info" and contains(., "' . $country . '")]';

    // In case pin isn't found on the map.
    if (!$pin = $page->find('xpath', '//div[@id="unfpa_worldwide"]//div[@class="map-wrapper"]' . $by_type . $by_country)) {
      $variables = array('@country' => $country, '@type' => $type);
      throw new \Exception(format_string("The pin form type: '@type' with country: '@country' was not found on the map", $variables));
    }
  }

  /**
   * @When I click on page :arg1
   */
  function iClickOnPageNumber($page_number) {
    $page_url = $this->getSession()->getCurrentUrl();
    $page = $this->getSession()->getPage();

    // Get the pagination button
    if (!$button = $page->findLink("Go to page " . $page_number)) {
      throw new Exception(format_string("The pagination button '@number' was not found on the page '@url'", array(
        '@number' => $page_number,
        '@url' => $page_url
      )));
    }
    $button->click();
  }

  /**
   * @Then I should not see :arg1 active
   */
  function iShouldNotSeePageNumberActive($page_number) {
    $page_url = $this->getSession()->getCurrentUrl();
    $page = $this->getSession()->getPage();

    // Get the pagination button.
    if ($button = $page->findLink("Go to page " . $page_number)) {
      throw new Exception(format_string("The pagination button '@number' is active at '@url'", array(
        '@number' => $page_number,
        '@url' => $page_url
      )));
    }
  }

  /**
   * @Given /^I set the filters:$/
   */
  public function iSetTheFilters(TableNode $table) {
    $page = $this->getCurrentPage();

    // Iterate over each filter and set it's field value accordingly.
    foreach ($table->getRows() as $filters => $filter_data) {

      // Get the filter data: (name, element selector ,value).
      list($filter_name, $filter, $filter_value) = $filter_data;

      // In case the target element is not found.
      $element = $page->find('css', $filter);
      if (!$element) {
        $variables = array(
          '@name' => $filter_name,
          '@id' => $filter,
        );
        throw new \Exception(format_string("The '@name' filter field with id: '@id' was not found", $variables));
      }
      $this->setElementValue($element, $filter_value);
    }
  }

  /**
   * Set an element value according to its type e.g. input || select etc.
   *
   * @param $element
   *  The target  html element to set it's value.
   * @param $value
   *  The value to be assigned to the element.
   * @throws Exception
   * @return bool
   *  In case of a success returns TRUE else throws an Exception.
   */
  private function setElementValue($element, $value) {

    // Get the element tag name.
    $tag_name = $element->getTagName();

    // Flag to identify if an element was set with a value.
    switch ($tag_name) {
      case 'input':
        if ($element->getAttribute('type') === 'checkbox') {
          $element->click();
        }
        else {
          // The default input type is text.
          $element->setValue($value);
        }
        $element_is_set = TRUE;
        break;

      case 'select':
        $element->selectOption($value);
        $element_is_set = TRUE;
        break;

      case 'div':
        $element->click();
        $element_is_set = TRUE;
        break;

      default:
        $element_is_set = FALSE;
    }

    if (!$element_is_set) {
      $variables = array(
        '@xpath' => $element->getXpath(),
        '@value' => $value,
      );
      throw new \Exception(format_string("The element: '@xpath' was not set with the value: '@value'", $variables));
    }

    return $element_is_set;
  }

  /**
   * @Then /^I should see text:$/
   */
  public function iShouldSeeText(TableNode $table) {
    // Iterate over each title and check if it's in the page.
    foreach ($table->getRows() as $titles) {
      foreach ($titles as $title) {
        if (strpos($this->getSession()
            ->getPage()
            ->getText(), $title) === FALSE
        ) {
          throw new \Exception(format_string("Can't find the text '@title' on the page: @url", array(
            '@title' => $title,
            '@url' => $this->getSession()->getCurrentUrl()
          )));
        }
      }
    }
  }

  /**
   * @When I :arg1 on :arg2 from :arg3 chart
   */
  public function iDoAnActionOnColumnFromChartName($action, $chartColumn, $chartName) {
    $page = $this->getCurrentPage();
    $item = FALSE;
    // Check the svg region to hover/click on.
    switch ($chartColumn) {
      case "non-core resources":
        $item = $page->find('xpath', '//div[@id="chart_div"]//*[local-name() = "svg"]//*[local-name()="rect" and @fill="#e0decd" and @width="47"]');
        break;

      case "UNFPA":
        $item = $page->find('xpath', '//div[@id="implemented-all"]//*[local-name() = "svg"]//*[local-name()="rect" and @fill="#f7931d" and @width="48"]');
        break;

      case "Latin America":
        $item = $page->find('xpath', '//div[@id="map_inner"]//*[@class="sm_state_BR"]');
        break;

      case "Asia":
        $item = $page->find('xpath', '//div[@id="map_inner"]//*[@class="sm_state_PK"]');
        break;
    }

    // Check if the svg item was found on the page.
    if (!$item) {
      throw new \Exception("The '@tooltip' was not found in '@chart'", array(
        '@tooltip' => $chartColumn,
        '@chart' => $chartName
      ));
    }

    // Check if it needs to click on or hover on the svg item.
    switch ($action) {
      case "hover":
        $item->mouseOver();
        break;

      case "click":
        $item->click();
        break;
    }
  }

  /**
   * @Then I should see minimum one active job
   */
  public function iShouldSeeMinimumOneActiveJob() {
    $page = $this->getSession()->getPage();
    $contents = $page->findAll('css', '.view-job .view-content .views-field-title .field-content');

    if (count($contents) < 1) {
      throw new \Exception("Please check the jobs page since there are no results on a clean search.");
    }
  }

  /**
   * @When I click on :arg1
   */
  public function iClickOn($string) {
    $page = $this->getCurrentPage();
    $page->clickLink($string);
  }

  /**
   * @Then I click on the news links
   */
  public function iClickOnTheNewsLinks() {
    $page = $this->getCurrentPage();

    // Get all the news links
    $content_links = $page->findAll('css', '#main .max_wrapper .panel-3col-33-stacked .pane-vw-news a');

    foreach ($content_links as $link) {
      // Click the links that in the list.
      print_r($link->getText() . "\n");
      $link->click();
      // Check that we get 200 OK HTTP code.
      $this->iShouldHaveAccessToThePage();

      // Return to the homepage for click the next link that in the list.
      $this->iVisitTheHomepage();
    }
  }


  /**
   * @return The current page session
   */
  public function getCurrentPage() {
    return $this->getSession()->getPage();
  }

  /**
   * @Then I should see the image map
   */
  public function iShouldSeeTheImageMap() {
    $page = $this->getSession()->getPage();

    // Get the image location.
    $image = $page->find('css', '#unfpa_worldwide .map-wrapper img');
    $image_page_location = $image->getAttribute('src');

    // Check the we have the right URL.
    if (empty($image_page_location)) {
      throw new \Exception("Please check if the map image is in the right location.");
    }
    // Visit the map image page.
    $this->getSession()->visit($image_page_location);

    // Check if the image exist.
    $this->iShouldHaveAccessToThePage();
  }

  /**
   * @Then I should have access to the job results
   */
  public function iShouldHaveAccessToTheJobResults() {
    $page = $this->getSession()->getPage();
    $contents = $page->findAll('css', '.view-job .view-content .view-content .views-field-title .field-content');
    $jobs_path = array();

    // Get the jobs url's.
    foreach ($contents as $job) {
      $jobs_path[] = $job->find('css', 'a')->getAttribute('href');
    }

    // Check if we get 200 OK from the jobs pages.
    foreach ($jobs_path as $path) {
      $this->getSession()->visit($this->locatePath($path));

      sprintf($this->getSession()->getCurrentUrl());
      $this->iShouldHaveAccessToThePage();
    }
  }

  /**
   * @Then I should see valid date
   */
  public function iShouldSeeValidDate() {
    $page = $this->getSession()->getPage();

    $dates = $page->findAll('css', '.calendar');

    foreach ($dates as $date) {
      $date_start = $date->find('css', '.date-display-single:first-child');
      $date_end = $date->find('css', '.date-display-single:nth-child(2)');
      print_r($date_start->getAttribute('content') . " - " . $date_end->getAttribute('content') . "\n");

      $startDate = new DateTime($date_start->getAttribute('content'));
      $endDate = new DateTime($date_end->getAttribute('content'));
      if ($startDate > $endDate) {
        throw new \Exception("not legal range {$date_start->getHtml()} > {$date_end->getHtml()}");
      }
    }
  }

/**
 * @Then I should see :arg1 events
 */
public function iShouldSeeEvents($events) {
  $page = $this->getSession()->getPage();

  $numberOfEvents = count($page->findAll('css', '.views-field-field-event-date .field-content.event-date .date-display-single'));

    if ($numberOfEvents != $events ) {
      throw new \Exception("Events block on homepage was not loaded correctly.");
    }
  }
}
