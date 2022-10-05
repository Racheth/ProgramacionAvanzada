<?php
session_start();
if (isset($_POST['action'])) {
  switch ($_POST['action']) {
    case 'access':
      $name = strip_tags($_POST['name']);
      $slug = strip_tags($_POST['slug']);
      $description = strip_tags($_POST['description']);
      $features = strip_tags($_POST['features']);
      $brand_id = strip_tags($_POST['brand_id']);
      $img = strip_tags($_POST['img']);
      $productController = new ProductsController();
      $productController->createProduct(
        $name,
        $slug,
        $description,
        $features,
        $brand_id,
        $img
      );
      break;
  }
}
class ProductsController
{
  public function getProducts()
  {


    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $_SESSION['token'],
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $response = json_decode($response);
    if (isset($response->code) && $response->code > 0) {
      return $response->data;
    }
  }

public function details($slug){

  $curl = curl_init();
  curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/slug/'.$slug,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
      'Authorization: Bearer '.$_SESSION['token'],  
  ),
  ));

$response = curl_exec($curl);

curl_close($curl);

$response = json_decode($response);
if (isset($response->code) && $response->code > 0) {
  return $response->data;
}
}



  public function createProduct(
    $name,
    $slug,
    $description,
    $features,
    $brand_id,
    $img
  ) {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array(
        'name' => $name,
        'slug' => $slug,
        'description' => $description,
        'features' => $features,
        'brand_id' => $brand_id,
        'cover' => $img,
      ),
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $_SESSION['token'],
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    
    $response = json_decode($response);
    if( isset($response->code) &&  $response->code > 0) 
    {
        header ("location:../product");
    } 
   
  }
}
