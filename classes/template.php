<?php
/*
*  Template Class
*  Creates a template/view object
*/
class template {
  //Path to template
  protected $template;
  //Variables
  protected $vars = array();

  /*
  * Class Constructor
  */
  public function __construct($template){
    $this->template = DOCROOT . 'templates' . DIRECTORY_SEPARATOR . $template;
  }

  /* __get() and __set() are run when writing data to inaccessible properties.
  * Get template variables
  */
  public function __get($key){
    return $this->vars[$key];
  }

  /*
  * Set template variables
  */
  public function __set($key, $value){
    $this->vars[$key] = $value;
  }

  /*
  * Convert Object To String
  */
  public function __toString(){
    extract($this->vars); // extract our template variables ex: $value
    // print_r($this->vars ) ;  testing
    chdir(dirname($this->template));
    ob_start(); // store as internal buffer

    include basename($this->template);  // include the template into our file

    return ob_get_clean();
  }
}
