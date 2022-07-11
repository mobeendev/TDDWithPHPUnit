<?php
use PHPUnit\Framework\TestCase;

class UserTest extends  TestCase {


    public function testValidUserName()
    {
        $phpunit = $this;
        $user = new User('donald', 'Trump' , 'abc@gmail.com');
        $expected = 'Donald';
        $assertClosure = function ()  use ($phpunit,$expected){
            $phpunit->assertSame($expected, $this->first_name);
        };
        $executeAssertClosure = $assertClosure->bindTo($user, get_class($user));
        $executeAssertClosure();
        // $this->assertSame($expected, $user->name);
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

}
