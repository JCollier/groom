<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Userhome extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        $this->load->model( 'user', '', TRUE );

        $this->page = $this->db->loadPageConfig();

        $this->ini->default  = $this->db->loadInits( 'default' );
        $this->ini->admin    = $this->db->loadInits( 'admin' );

        $this->load->model( 'template', '', TRUE );
        $this->load->spark('Twiggy/0.8.5');
    }

    function index()
    {
        $session_data = $this->session->userdata('logged_in');

        $data['username']   = $session_data['username'];
        $data['userid']     = $session_data['id'];

        $user_name  = $data['username'];
        $user_id    = $data['userid'];

        if($this->session->userdata('logged_in')) {
            $level = $this->user->getUserLevelById($data['userid']);
        }
        else {
            $user_id    = 0;
            $level      = 0;
        }

        $data['base_url']       = $this->config->config['base_url'];
        $data['js_global']      = $this->config->config['js_global'];

        $data['base_url']             = $this->config->config['base_url'];
        $data['image_path']           = $this->config->config['image_path'];
        $data['js_path']['global']    = $this->config->config['js_global'];
        $data['js_path']['jquery']    = $this->config->config['js_jquery'];

        $data['css_path']['global']             = $this->config->config['css_global'];
        $data['css_path']['bootstrap']          = $this->config->config['css_bootstrap'];
        $data['css_path']['bootstrap_theme']    = $this->config->config['css_bootstrap_theme'];

        $data['assets']         = $this->_getAdminViewByType( 'assets' );
        $data['head']           = $this->_getAdminViewByType( 'head' );

        $data['links_header']   = $this->_getAdminViewByType( 'links_header', $level );
        $data['users']          = $this->user->listUsersFromParams( 1, 5 );
        $data['bg_portrait']    = $data['base_url'] . 'htdocs/images_1/default/bg_img_4.jpg';
        $data['template']       = $this->template->buildTemplateFromData($data, 'userhome');

        $this->load->view( 'userhome_view', $data );
    }

    protected function _getAdminViewByType( $type = null, $level = 0 ) {
        switch ( $type ) {
            case 'assets':
                return $this->template->loadAssets(
                        array(
                        array( 'css' => array( 'main', 'global' ) ),
                        array( 'jpg' => array( 'sprite_global' ) ),
                    )
                );
            case 'head':
                return '<head>test header</head>';
            case 'links_header':
                return $this->template->getHeaderLinks('admin', $level);
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

