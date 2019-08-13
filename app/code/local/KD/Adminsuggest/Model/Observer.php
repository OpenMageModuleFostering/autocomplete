<?php

  class KD_Adminsuggest_Model_Observer {
      public function addJS($observer){
          $controller = $observer->getAction();
          var_dump($controller);
          $layout = $controller->getLayout();
          var_dump($layout);
          $block = $layout->createBlock('core/text');
          $block->setText(
               ''
          );
          $layout->getBlock('js')->append($block);

      }
  }
?>