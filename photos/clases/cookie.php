<?php

require_once("database.php");

class Cooker
{
    public $signed_in = false;
    public $user_id;
    private $expiration = 180 * 24 * 60 * 60;// Increase the cookie expiration to 6 months (180 days)
    //private $encryption_key = bin2hex(random_bytes(32)) ; // Generates a 32-byte (256-bit) key

    function __construct()
    {
        $this->check_the_login();
    }

    public function is_signed_in()
    {
        return $this->signed_in;
    }

    public function login($user)
    {
        if ($user) {
            $this->user_id = $user->id;
            setcookie('user_id', $this->user_id, time() + $this->expiration);
            /*
            // Set the user_id cookie with the Secure and HttpOnly flags
            setcookie('user_id', $this->encryptCookie($this->user_id), time() + $this->expiration, '/', '', true, true);
            */
            $user->islogged = true;
            $this->signed_in = true;
            $user->update();
        }
    }

    public function logout(){
        $user = User::find_by_id($this->user_id);
        $user->islogged = false;
        $this->signed_in = false;
        //without secure httponly flags
        setcookie('user_id', '', time() - $this->expiration);
        // Delete the user_id cookie with the Secure and HttpOnly flags
        //setcookie('user_id', '', time() - $this->expiration, '/', '', true, true);
        $user->update();
        unset($this->user_id);
    }

    private function check_the_login()
    {
        // Check for existing cookies
        if (isset($_COOKIE['user_id'])) {
            //with encryption
            //$this->user_id = decryptCookie($_COOKIE['user_id']);
            $this->user_id = $_COOKIE['user_id'];
            $this->signed_in = true;
        } else {
            $this->signed_in = false;
            unset($this->user_id);
        }
    }

    /*
    private function encryptCookie($value)
    {
        return openssl_encrypt($value, 'aes-256-cbc', $this->encryption_key, 0, $this->encryption_key);
    }

    private function decryptCookie($value)
    {
        return openssl_decrypt($value, 'aes-256-cbc', $this->encryption_key, 0, $this->encryption_key);
    }
    */
}

$cooker = new Cooker();
?>
