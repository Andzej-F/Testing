<?php

class Person
{
    public $db = NULL;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function greeting($id)
    {
        $friend = $this->db->getPersonByID($id);
        $friendName = $friend->name;
        return "Hello $friendName";
    }
}
