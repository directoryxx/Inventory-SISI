<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth {

    protected $CI;

    // We'll use a constructor, as you can't directly call a function
    // from a property definition.
    public function __construct() {
        // Assign the CodeIgniter super-object
        $this->CI = &get_instance();
        $this->CI->load->model('role_menu_m');
    }

    public function privilege_check($link,$action)
    {
        $access = $this->CI->role_menu_m->check_auth($link,$action);
        if ($access > 0){
            return true;
        }

        return false;
    }

    public function no_access()
    {
        $this->CI->template->load('no_access');
    }

    

}
