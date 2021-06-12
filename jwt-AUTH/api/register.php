<?php
// incclude db
include_once './config/database.php';

//  set the headers
header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// set register fileds
$firstName = '';
$lastName = '';
$email = '';
$password = '';
$conn = null;

// init database
$databaseService = new DatabaseService();
// init connection
$conn = $databaseService->getConnection();

//  set the input to data var
$data = json_decode(file_get_contents("php://input"));


$firstName = $data->first_name;
$lastName = $data->last_name;
$email = $data->email;
$password = $data->password;

$table_name = 'Users';

//  create query
$query = "INSERT INTO " . $table_name . "
                SET first_name = :firstname,
                    last_name = :lastname,
                    email = :email,
                    password = :password";

$stmt = $conn->prepare($query);

$stmt->bindParam(':firstname', $firstName);
$stmt->bindParam(':lastname', $lastName);
$stmt->bindParam(':email', $email);

$password_hash = password_hash($password, PASSWORD_BCRYPT);

$stmt->bindParam(':password', $password_hash);


if($stmt->execute()){
// return res status 200
    http_response_code(200);
    echo json_encode(array("message" => "User was successfully registered."));
}
else{
    // return res status 200
    http_response_code(400);
// set error message with json type
    echo json_encode(array("message" => "Unable to register the user."));
}
?>