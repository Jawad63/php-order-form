<?php

   // This line makes PHP behave in a more strict way
      declare(strict_types=1);
      ini_set('display_errors', '1');
      ini_set('display_startup_errors', '1');
      error_reporting(E_ALL);
   // We are going to use session variables so we need to enable sessions
      session_start();

   // Use this function when you need to need an overview of these variables
      function whatIsHappening() {
      echo '<pre>';
      echo '<h2>$_GET</h2>';
      var_dump($_GET);
      echo '<h2>$_POST</h2>';
      var_dump($_POST);
      echo '<h2>$_COOKIE</h2>';
      var_dump($_COOKIE);
      echo '<h2>$_SESSION</h2>';
      var_dump($_SESSION);
      echo '</pre>';
   }

   //whatIsHappening();
   $products = [
      ['name' => 'Playstation 5', 'price' => 499],
      ['name' => 'Xbox Series X', 'price' => 499],
      ['name' => 'Playstation 4 pro', 'price' => 349],
      ['name' => 'Xbox Series S', 'price' => 299]
   ];


   $totalValue = 0;

   function validate() {

      // This function will send a list of invalid fields back
      $errors = [];

      if (empty($_POST['email'])) {
         $errors[] = 'email';
      }
      if (empty($_POST['street'])) {
         $errors[] = 'street';
      }
      if (empty($_POST['streetnumber'])) {
         $errors[] = 'streetnumber';
      }
      if (empty($_POST['city'])) {
         $errors[] = 'city';
      }
      if (empty($_POST['zipcode']) or !is_numeric($_POST['zipcode'])) {
         $errors[] = 'zipcode';
      }
      return $errors;
   }


   function handleForm($products, &$totalValue) {
   //     & changes the original value

   // Validation (step 2)
   $invalidFields = validate();
   if (!empty($invalidFields)) {
      $message = '';
      foreach ($invalidFields as $invalidField) {
         $message .= "Please provide your {$invalidField}.";
         $message .= '<br>';
      }
      return [
         'errors' => true,
         'message' => $message
      ];
   } 
   
   else {

        $productNumbers = array_keys($_POST['products']);
        $productNames = [];

        foreach ($productNumbers as $productNumber) {
            $productNames[] = $products[$productNumber]['name'];
            $totalValue = $totalValue + $products[$productNumber]['price'];
         }

        $message = 'Products : ' . implode(', ', $productNames);
        $message .= '<br>';
        $message .= 'Your email address : ' . $_POST['email'];
        $_SESSION['email'] = $_POST['email'];
        $message .= '<br>';
        $message .= 'Your address : ' . $_POST['street'] . ' ' . $_POST['streetnumber'] . ', ' . $_POST['zipcode'] . ' ' . $_POST['city'];
        $_SESSION['street'] = $_POST['street'];
        $_SESSION['streetnumber'] = $_POST['streetnumber'];
        $_SESSION['zipcode'] = $_POST['zipcode'];
        $_SESSION['city'] = $_POST['city'];

         return [
            'errors' => false,
            'message' => $message,
            'totalValue' => $totalValue
         ];
      }
   }

   $formSubmitted = !empty($_POST);
   $result = [];

   if ($formSubmitted) {
      $result = handleForm($products, $totalValue);
   }

   require 'form-view.php';