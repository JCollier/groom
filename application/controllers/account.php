<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Account extends CI_Controller {

 function __construct()
 {
   parent::__construct();

   $this->page = $this->db->loadPageConfig();

   $this->ini->default  = $this->db->loadInits( 'default' );
   $this->ini->home     = $this->db->loadInits( 'home' );

   $this->load->model( 'template', '', TRUE );
   $this->load->spark('Twiggy/0.8.5');
 }

 function index()
 {
    if($this->session->userdata('logged_in')) {
        $session_data = $this->session->userdata('logged_in');
        $data['username']   = $session_data['username'];
        $data['userid']     = $session_data['id'];

        $data['assets'] = $this->template->loadAssets(  array(
                                                        array(  'css' => array( 'main', 'global' ) ),
                                                        array(  'jpg' => array( 'sprite_global' ) ),
                                                    )
                                                );

        $data['base_url']             = $this->config->config['base_url'];
        $data['image_path']           = $this->config->config['image_path'];
        $data['js_path']['global']    = $this->config->config['js_global'];

        $data['css_path']['global']             = $this->config->config['css_global'];
        $data['css_path']['bootstrap']          = $this->config->config['css_bootstrap'];
        $data['css_path']['bootstrap_theme']    = $this->config->config['css_bootstrap_theme'];

        $data['links_header'] = $this->template->getHeaderLinks( 'home' );
        $data['links_footer'] = $this->template->getFooterLinks( 'home' );
        
        foreach( $data as $key => $param ) {
          $this->twiggy->set( $key, $param );
        }

        $data['template'] = $this->twiggy->template('account')->display();

        $this->load->view( 'account_view', $data );
    }
    else {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('home', 'refresh');
 }

}

?>

