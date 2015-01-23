<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();

	   $this->page = $this->db->loadPageConfig();

	   $this->ini->default  = $this->db->loadInits( 'default' );
	   $this->ini->home     = $this->db->loadInits( 'home' );

	   $this->load->model( 'template', '', TRUE );
	   $this->load->spark('Twiggy/0.8.5');
    }

    function index() {
        $data['assets'] = $this->template->loadAssets(
             array(
                array('css' => array('main', 'global')),
                array('jpg' => array('sprite_global')),
            )
        );

        $data['base_url']             = $this->config->config['base_url'];
        $data['image_path']           = $this->config->config['image_path'];
        $data['js_path']['global']    = $this->config->config['js_global'];

        $data['css_path']['global']             = $this->config->config['css_global'];
        $data['css_path']['bootstrap']          = $this->config->config['css_bootstrap'];
        $data['css_path']['bootstrap_theme']    = $this->config->config['css_bootstrap_theme'];

        $this->load->helper( array( 'form' ) );
        $this->load->view( 'login_view', $data );
    }

}

?>

