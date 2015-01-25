<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cron extends CI_Controller {


    function __construct() {
        parent::__construct();

        // // $this->load->model( 'user', '', TRUE );

        // // $this->page = $this->db->loadPageConfig();

        // // $this->ini->default  = $this->db->loadInits( 'default' );
        // // $this->ini->admin    = $this->db->loadInits( 'admin' );

        // // $this->load->model( 'template', '', TRUE );
        // $this->load->model( 'user' );
        // $this->load->model( 'items' );
    }

    function test_cron() 
    {
        var_dump( "success!" );
    }   
}
