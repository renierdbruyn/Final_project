<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Email extends CI_Controller
{
    function __construct()
    {
        parent:: __construct();
       
    }
    
    function index()
    {
        
        $config = Array(
            'protocal' =>'smtp',
            'smtp_host' => 'itstudents.dut.ac.za',
            'smtp_port' => 25,
            'smtp_user' => 'group8@dut.ac.za', 
            'smtp_pass' => '2uVuphEr',
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1',
            'crlf' => "\r\n",
            'newline'=>"\r\n",


        );
        
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        
        $this->email->from('group8@dut.ac.za', 'ITSOLUTIONS
            ');
        $this->email->to('renierdbruyn@hotmail.com');
        $this->email->subject('This is an email test');
        $this->email->message('It is working. Great!');
        
        if($this->email->send())
        {
            echo 'Your email was sent fool....';
            echo $this->email->print_debugger();
        }
        else 
        {
            show_error($this->email->print_debugger());
        }
    }
}




?>
