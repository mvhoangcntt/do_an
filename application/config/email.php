<?php defined('BASEPATH') OR exit('No direct script access allowed');
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'ssl://smtp.googlemail.com';
$config['smtp_user'] = 'mvhoangcnttictu@gmail.com';
$config['smtp_pass'] = 'pxupkgoszuvjsnxw';
$config['smtp_port'] = 465;
$config['charset'] = 'utf-8';
$config['mailtype'] = 'html';
$config['newline'] = "\r\n";
$config['crlf'] = "\r\n";
// $this->load->library('email'); chỉ dùng cho trường hợp này nó tự load