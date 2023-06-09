<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo "Forbiden 403";
    }

    public function set_to($language)
    {
        if (strtolower($language) === 'english') {
            $lang = 'en';
        } else {
            $lang = 'id';
        }
        set_cookie(
            array(
                'name' => 'lang_is',
                'value' => $lang,
                'expire'  => '8650',
                'prefix'  => ''
            )
        );

        if ($this->input->server('HTTP_REFERER')) {
            redirect($this->input->server('HTTP_REFERER'));
        }
    }
}
