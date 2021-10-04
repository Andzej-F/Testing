<?php

class Database
{
    public function getPersonByID($id)
    {
        // do some stuff in the db to get a person by their ID
        return "SELECT * FROM `person` WHERE `id`=$id LIMIT 1;";
    }
}
