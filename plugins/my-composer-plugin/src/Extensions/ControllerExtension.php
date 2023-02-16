<?php

namespace MyComposerPlugin\Extensions;

trait ControllerExtension
{
  public static function send_view(string $html)
  {
    header('Content-Type: text/html');
    echo $html;
    exit();
  }
}
