<?php
class BaseController
{
  protected $folder; 
  function render($file = 'index', $data = array())
  {
    $view_file = 'app/views/' . $this->folder . '/' . $file . '.php';
    if (is_file($view_file)) {
      extract($data);
      ob_start();
      require_once($view_file);
      $content = ob_get_clean();
      require_once('app/views/base.php');
    } else {
      header('Location: index.php?controller=home&action=error');
      echo getcwd() . "\n";
      echo $view_file . "\n";
    }
  }
}
?>