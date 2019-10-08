<?php //PHP 7.2+

require 'ajaxCom.php';


$dbUsername = 'admin';
$dbPassword = '123456';


$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';




//USERNAME VALIDATION
if( 50 < strlen($username) || strlen($username) < 4 ){
    ajaxCom::isInvalidDOM('#usernameInput','#usernameHelper','The username can be between 4 and 50 characters at most!');
} elseif($username !== $dbUsername){
    ajaxCom::isInvalidDOM('#usernameInput','#usernameHelper','The username is incorrect.');
} else{
    ajaxCom::isValidDOM('#usernameInput','#usernameHelper');
}

if( 32 < strlen($password) || strlen($password) < 6 ){
    ajaxCom::isInvalidDOM('#passwordInput','#passwordHelper','The password can be at least 6 and at most 32 characters!');
} elseif($password !== $dbPassword){
    ajaxCom::isInvalidDOM('#passwordInput','#passwordHelper','The password is incorrect.');
} else{
    ajaxCom::isValidDOM('#passwordInput','#passwordHelper');
}




if(ajaxCom::$isError){

    ajaxCom::false('anyCode', 'Please check the form', 'anyData');
    //ajaxCom::quietFalse('anyCode', 'Please check the form', 'anyData');

} else{

    //ajaxCom::direct('login-success.html');
    ajaxCom::true('anyCode', 'Login successful', ['username' => $username]);
    //ajaxCom::quietTrue('anyCode', 'Login successful', ['username' => $username]);

}