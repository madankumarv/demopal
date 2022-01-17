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
  public function showCountries() {
    // Default settings.
    $config = \Drupal::config('world.settings');
    //Countries Count.
    $count = $config->get('world.count');
    $countries = $config->get('world.count');
    return [
      '#markup' => $count.":".$countries,
    ];
  }

}
