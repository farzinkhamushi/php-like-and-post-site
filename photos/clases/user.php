<?php


class User extends Obj
{
    protected static $table = "users";
    protected static $table_fields = array('bio','profile','username', 'password', 'first_name', 'last_name','islogged','isadmin');
    public $id;
    public $bio;
    public $profile;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $islogged = false;
    public $isadmin = false;
}
?>