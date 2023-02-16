<?php

namespace MyComposerPlugin\Api;

class TestController
{
  public string $namespace;
  public string $resource_name;

  // Here initialize our api namespace and resource name.
  public function __construct()
  {
    $this->namespace = 'my-composer-plugin/v1';
    $this->resource_name = 'test';
  }

  public function register_routes()
  {
    register_rest_route($this->namespace, '/' . $this->resource_name, array(
      array(
        'methods' => 'GET',
        'callback' => array($this, 'get_items'),
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
    $data = [
      ["Author" => "Kalleby"],
      ["Author" => "Joe"],
      ["Author" => "Bar"],
    ];

    var_dump($request);

    // Return all of our comment response data.
    return wp_send_json_success($data);
  }
}
