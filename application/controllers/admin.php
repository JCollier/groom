<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Admin extends CI_Controller {

 function __construct()
 {
    parent::__construct();

    $this->load->model( 'user', '', TRUE );

    $this->page = $this->db->loadPageConfig();

    $this->ini->default  = $this->db->loadInits( 'default' );
    $this->ini->admin    = $this->db->loadInits( 'admin' );

    $this->load->model( 'template', '', TRUE );

 }

 function index()
 {
    $session_data = $this->session->userdata('logged_in');

    $data['username']   = $session_data['username'];
    $data['userid']     = $session_data['id'];

    $user_name  = $data['username'];
    $user_id    = $data['userid'];

    if( $this->session->userdata( 'logged_in' ) ) {
        if( $this->user->isUserAdmin( $user_id ) ) {
            $data['base_url']       = $this->config->config['base_url'];
            $data['js_global']      = $this->config->config['js_global'];
            $data['assets']         = $this->_getAdminViewByType( 'assets' );
            $data['head']           = $this->_getAdminViewByType( 'head' );

            $level = $this->user->getUserLevelById( $data['userid'] );

            $data['links_header']   = $this->_getAdminViewByType( 'links_header', $level );

            $this->load->view( 'admin_view', $data );
        }
        else {
          redirect('login', 'refresh');
        }
    }
    else {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

    protected function _getAdminViewByType( $type = null, $level = 0 ) {
        var_dump( $level );

        switch ( $type ) {
            case 'assets':
                return $this->template->loadAssets( array(
                                                    array( 'css' => array( 'main', 'global' ) ),
                                                    array( 'jpg' => array( 'sprite_global' ) ),
                                                )
                                            );
            case 'head':
                return '<head>test header</head>';
            case 'links_header':
                return $this->template->getHeaderLinks( 'admin', $level );
            default:
                return null;
        }
    }

    function logout() {
        $this->session->unset_userdata( 'logged_in' );
        session_destroy();
        redirect( 'home', 'refresh' );
    }
}

?>

