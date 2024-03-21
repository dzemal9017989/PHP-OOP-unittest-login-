<?php

use \PHPUnit\Framework\TestCase;
use Test\classes\User;

/* namespace VoorbeeldUnittest is gekoppeld aan de directory '/app' via composer.json
"autoload":{
        "psr-4":{
            "VoorbeeldUnittest\\": "app"
        }
*/

// de classname moet gelijk zijn aan de filenaam CalculatorTest.php
class LoginTest extends TestCase
{
    // Methods moeten starten met de naam test....

    public function testPassword(){
        $user = new User;
        $user->SetPassword("123");
        $this->assertEquals("123", $user->GetPassword() );

    }

    public function testLogout(){
        $user = new User;
        $this->assertTrue($user->Logout());
    }
    

    public function testValidateEmptyUser(){
        $user = new User;
        $user->username = "";
		$user->SetPassword("123");
        $errors = $user->ValidateUser();
        $this->assertContains("Invalid username", $errors );

    }

    public function testValidateUserToShort(){
        $user = new User;
        $user->username = "bo";
		$user->SetPassword("123");
        $errors = $user->ValidateUser();
        $this->assertContains("Username moet > 3 en < 50 tekens zijn.", $errors );

    }

}