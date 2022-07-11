<?php

class User
{
    private $first_name;
    private $last_name;
    protected $email;
 
    public function __construct($first_name, $last_name, $email)
    {
        $this->first_name = ucfirst($first_name);
        $this->last_name = ucfirst($last_name);
        $this->email = $email;
    }
 
    public function getFullName()
    {
        return $this->name.' '.$this->last_name;
    }
}
