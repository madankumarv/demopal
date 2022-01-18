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
    // Default settings.
    $config = \Drupal::config('world.settings');
    $count = $config->get('world.count');
    $countries = explode(',',$config->get('world.countries'));
    $table = '<table>';
    for($i=0; $i<$count; $i++) {
      $table .= '<tr><td>'.($i+1).'</td><td>'.$countries[$i].'</td></tr>';
    }
    $table .= '</table>';
    return [
      '#markup' => $table,
    ];
  }

}
