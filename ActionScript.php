<?php

/**
*
*You need to add the following two lines in your controller
*
*/

  public function testAction()
  {
     $dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
     $form = new NewscontentForm ($dbAdapter);
  
  }
