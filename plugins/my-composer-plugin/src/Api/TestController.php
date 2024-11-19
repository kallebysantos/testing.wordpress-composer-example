<?php

namespace MyComposerPlugin\Api;
use League\Plates\Engine;
use MyComposerPlugin\Extensions\ControllerExtension;
use Illuminate\Database\Capsule\Manager as Capsule;

class TestController extends \WP_REST_Controller
{
  use ControllerExtension;

  private Engine $templates;

  // Here initialize our api namespace and resource name.
  public function __construct()
  {
    $this->namespace = 'my-composer-plugin/v1';
    $this->rest_base = 'test';

    $this->templates = new Engine(PLUGIN_DIR . 'templates/admin');

    error_log("select:".Capsule::connection()->scalar('select 1'));
  }

  public function register_routes()
  {
    register_rest_route($this->namespace, '/' . $this->rest_base, array(
      array(
        'methods' => 'GET',
        'callback' => array($this, 'get_items'),
        //     'permission'
      ),
    ));
  }

  /**
   * Grabs the five most recent posts and outputs them as a rest response.
   *
   * @param WP_REST_Request $request Current request.
   */
  public function get_items($request)
  {
    $authors = [
      ["name" => "Kalleby"],
      ["name" => "Joe"],
      ["name" => "Bar"],
    ];

    $html = $this->templates->render('dashboard', data: ["authors" => $authors]);

    return $this->send_view($html);
  }
}
