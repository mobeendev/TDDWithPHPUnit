<?php

class Database {

    public function getEmailAndLastName()
    {
        echo 'real db touched';
    }
}

class User
{
    protected $first_name;
    protected $last_name;
    protected $email;
 
    public function __construct($first_name, $last_name, $email)
    {
        $this->first_name = ucfirst($first_name);
        $this->last_name = ucfirst($last_name);
        $this->email = $email;
    }
 
    public function getFullName()
    {
        return $this->first_name.' '.$this->last_name;
    }

 
    private function iAmPrivateMethod()
    {
        return $this->first_name;
 
    }

    protected function iAmProtectedMethod()
    {
        return $this->email;
    }


}
