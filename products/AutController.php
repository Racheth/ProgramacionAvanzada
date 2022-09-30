<?php
if(isset($_POST["action"])){
    switch($_POST['action']){
        case 'access':
        $email =strip_tags($_POST["email"]);
        $paswword=strip_tags($_POST["paswword"]);
        $autController = new AutController();


        break;
    }
    
}

Class AutController{
 public function login($email,$paswword){
    $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://crud.jonathansoto.mx/api/login',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('email' => 'luispabloe_19@alu.uabcs.mx','password' => '8F08!6t#sDyI%u'),
));

$response = curl_exec($curl);

curl_close($curl);

$response =json_decode($response);
echo $response -> data;
if(isset($response -> code) && $response -> code >0){
session_start();
$_SESSION['id'] = $response -> data ->id;
$_SESSION['name'] = $response -> data ->name;
$_SESSION['lastname'] = $response -> data ->lastname;
$_SESSION['avatar'] = $response -> data ->avatar;
$_SESSION['role'] = $response -> data ->role;
$_SESSION['token'] = $response -> data ->token;
}

 }



}
?>