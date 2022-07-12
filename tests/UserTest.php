<?php
use PHPUnit\Framework\TestCase;

class UserTest extends  TestCase {


    public function testValidUserName()
    {
        $phpunit = $this;
        $expected = 'Donald';
        $user = new class('donald', 'Trump', 'abc@gmail.com') extends User {
            
            public function getFirstName(){

                return $this->first_name;

            }
        };
        $this->assertSame($expected, $user->getFirstName());
    }

    public function testValidUserName2() 
    {       
        // for protected properties we have to use ananymous class like below

        $user = new class('donald', 'Trump' , 'abc@gmail.com') extends User {
            public function getEmail()
            {
                return $this->email;
            }
        };
        $this->assertSame('abc@gmail.com', $user->getEmail());
    }

     public function testValidDataFormat() 
    {
        $user = new User('donald', 'Trump' , 'abc@gmail.com');
        $mockedDb = new class extends Database {

            public function getEmailAndLastName()
            {
                echo 'no real db touched!';
            }
        };

        $setUserClosure = function ()  use ($mockedDb){
            $this->db = $mockedDb;
        };
        $executeSetUserClosure = $setUserClosure->bindTo($user, get_class($user));
        $executeSetUserClosure();

        $this->assertSame('Donald Trump', $user->getFullName());
    }

    public function testPrivateMethod()
    {
        $phpunit = $this;
        $user = new User('donald', 'Trump' , 'abc@gmail.com');
        $expected = 'Donald';
        $assertClosure = function ()  use ($phpunit,$expected){
            $phpunit->assertSame($expected, $this->iAmPrivateMethod());
        };
        $executeAssertClosure = $assertClosure->bindTo($user, get_class($user));
        $executeAssertClosure();
    }


     public function testProtectedMethod()
    {
        $phpunit = $this;
        $expected = 'abc@gmail.com';
        $user = new class('donald', 'Trump', 'abc@gmail.com') extends User {
            
            public function callProtectedMethod(){

                return $this->iAmProtectedMethod();

            }
        };
        $this->assertSame($expected, $user->callProtectedMethod());
    }


}
