<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Email_Controller extends Admin_Controller {

    public function __construct() {
        parent:: __construct();
    }

    public function index() {
        $this->load->view('email_form');
    }

    function send_mail() {
        $from = "mvhoangcnttictu@gmail.com";
        $to = 'mvhoangcntt@gmail.com';
        if(sendMail('', $to,'ưer','contact','')) echo "string";
        else echo "err";
    }
}