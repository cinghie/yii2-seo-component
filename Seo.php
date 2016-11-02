<?php

namespace cinghie\seo;

use Yii;
use yii\base\Component;

class Seo extends Component 
{
  public $_description;
  public $_keywords;
  
  public function init()
  {
    $this->_description = "Test Description";
    $this->_keywords = "Test Keywords";
  }
    
}
