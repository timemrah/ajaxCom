<?php //PHP 7.2+

require 'dist/ajaxCom.php';


$dbUsername = 'admin';
$dbPassword = '123456';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';




//Username Validation
if( 50 < strlen($username) || strlen($username) < 4 ){
    ajaxCom::isInvalidDOM('#usernameInput','#usernameHelper','The username can be between 4 and 50 characters at most!');
} elseif($username !== $dbUsername){
    ajaxCom::isInvalidDOM('#usernameInput','#usernameHelper','The username is incorrect.');
} else{
    ajaxCom::isValidDOM('#usernameInput','#usernameHelper');
}

//Password Validation
if( 32 < strlen($password) || strlen($password) < 6 ){
    ajaxCom::isInvalidDOM('#passwordInput','#passwordHelper','The password can be at least 6 and at most 32 characters!');
} elseif($password !== $dbPassword){
    ajaxCom::isInvalidDOM('#passwordInput','#passwordHelper','The password is incorrect.');
} else{
    ajaxCom::isValidDOM('#passwordInput','#passwordHelper');
}




if(ajaxCom::$isError){

    //Set to show the message on any DOM element
    //ajaxCom::addHtml('#ajaxCom-alert', 'Please check the form');

    //Echo json data with alert
    //ajaxCom::false('anyCode', 'Browser Alert -> Please check the form');

    //Echo json data without alert
    //ajaxCom::quietFalse('anyFalseCode');

} else{

    //Set to show the message on any DOM element
    //ajaxCom::addHtml('#ajaxCom-alert', 'Login successful');

    //Set direct
    ajaxCom::direct('login-success.html');

    //Echo json data with alert
    ajaxCom::true('anyCode', 'Login successful', ['username' => $username]);

    //Echo json data without alert
    //ajaxCom::quietTrue('anyCode', null, ['username' => $username]);

}