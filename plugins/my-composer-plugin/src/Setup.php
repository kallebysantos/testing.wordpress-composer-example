<?php

namespace MyComposerPlugin;

use MyComposerPlugin\Api\TestController;

class Setup
{
  public static function init_rest_controllers()
  {
    $controllers = [
      new TestController(),
    ];

    foreach ($controllers as $controller) {
      $controller->register_routes();
    }
  }
}
