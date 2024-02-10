<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Header
{
    public function loadHeader()
    {
        $CI = &get_instance();
        $CI->load->controller('Header');
    }
}