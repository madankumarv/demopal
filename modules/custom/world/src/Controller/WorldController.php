<?php
namespace Drupal\world\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Provides route responses for the Example module.
 */
class WorldController extends ControllerBase {

  /**
   * Returns a countries list.
   *
   * @return array
   *   A simple renderable array.
   */
  public function countries() {
    return [
      '#markup' => 'India,Nepal,Bhutan,Pakistan,Srilanka,Bangladesh,China,Mangolia,Burma,South Korea,North Korea,Singapore,Malaysia,Indonesia,Combodia,Honkong,Japan',
    ];
  }

}
