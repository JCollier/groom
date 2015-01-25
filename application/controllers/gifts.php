<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Gifts extends CI_Controller {

 function __construct()
 {
   parent::__construct();

   $this->page = $this->db->loadPageConfig();

   $this->load->model( 'user', '', TRUE );
   $this->load->model( 'items', '', TRUE );

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
        $data['js_path']['jquery']    = $this->config->config['js_jquery'];

        $data['css_path']['global']             = $this->config->config['css_global'];
        $data['css_path']['bootstrap']          = $this->config->config['css_bootstrap'];
        $data['css_path']['bootstrap_theme']    = $this->config->config['css_bootstrap_theme'];

        $level = $this->user->getUserLevelById( $data['userid'] );

        $data['links_header'] = $this->template->getHeaderLinks( 'home', $level );
        $data['links_footer'] = $this->template->getFooterLinks( 'home' );
        
        $data['item_count'] = intval( $this->items->getUsersItemCount( $data['userid'] ) );
        $data['per_page']   = 8;
        $data['page_count'] = ceil( $data['item_count'] / $data['per_page'] );

        $item_count = intval( $this->items->getUsersItemCount( $data['userid'] ) );

        $per_page = 16;

        var_dump( $data['item_count'] / $data['page_count'] );

        $data['item_count_per_page'] = intval( $this->items->getUsersItemCount( $data['userid'] ) ) / 16;        

        foreach( $data as $key => $param ) {
          $this->twiggy->set( $key, $param );
        }

        $data['template'] = $this->twiggy->template('gifts')->display();

        $this->load->view( 'gifts_view', $data );
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

