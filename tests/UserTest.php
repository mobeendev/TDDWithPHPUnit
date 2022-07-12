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

//            $phpunit->assertSame($expected, $this->first_name);
        };
        // $executeAssertClosure = $assertClosure->bindTo($user, get_class($user));


        $this->assertSame($expected, $user->getFirstName());

        // $this->assertSame($expected, $assertClosure->getFirstName());
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


}
