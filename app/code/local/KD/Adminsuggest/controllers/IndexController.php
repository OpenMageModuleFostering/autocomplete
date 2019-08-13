<?php

  class KD_Adminsuggest_IndexController extends Mage_Core_Controller_Front_Action{

      function callAPI($method, $url, $data = false) {
          $curl = curl_init();

          switch ($method)
          {
              case "POST":
                  curl_setopt($curl, CURLOPT_POST, 1);

                  if ($data)
                      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                  break;
              case "PUT":
                  curl_setopt($curl, CURLOPT_PUT, 1);
                  break;
              default:
                  if ($data)
                      $url = sprintf("%s?%s", $url, http_build_query($data));
          }

          // Optional Authentication:
          curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
          curl_setopt($curl, CURLOPT_USERPWD, "username:password");

          curl_setopt($curl, CURLOPT_URL, $url);
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

          return curl_exec($curl);
      }

      public function indexAction(){
           $data = $_GET;
          $result = json_decode($this->callAPI("GET", "http://anywhere.ebay.com/services/suggest/", $data ));
          $this->getResponse()->setHeader('Content-type', 'application/json');
          $post_data = json_encode($result[1]);
          $this->getResponse()->setBody($post_data);
      }

  }


?>