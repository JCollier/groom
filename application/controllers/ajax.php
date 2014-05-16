<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {


    function __construct() {
        parent::__construct();

        // $this->load->model( 'user', '', TRUE );

        // $this->page = $this->db->loadPageConfig();

        // $this->ini->default  = $this->db->loadInits( 'default' );
        // $this->ini->admin    = $this->db->loadInits( 'admin' );

        // $this->load->model( 'template', '', TRUE );
        $this->load->model( 'user' );
    }

    // function index()
    // {   
    //     $data = array();

    //     $this->load->view( 'ajax_view', $data );
    // }

        // public function listUsersFromParams( $page, $limit, $order = 'id' ) {
        //     if( $limit > 1000 ) {
        //         echo( '' );
        //     }
        //     else {
        //         $offset = ( 1 - intval( $page ) ) * intval( $limit );

        //         $sql =  " SELECT * FROM groom_common.users" . 
        //                 " LIMIT ${offset},${limit};";

        //         return $this->db->query( $sql )->result_array();
        //     }
        // }

    function get_users() {
        $user_level = 5;

        parse_str( $_SERVER['QUERY_STRING'], $params_get_users );

        $page   = $params_get_users['p'];
        $limit  = $params_get_users['n'];
        $sort   = $params_get_users['s'];

        $data['users'] = $this->user->listUsersFromParams( $page, $limit, $sort );

        $this->load->view( 'ajax_view', $data );

        return $data;
    }

    // public function index()
    // {
    //     $this->load->view('welcome_message');
    // }

    // public function test( $param ) {
    //   echo $param;
    // }

    // public function login( $username ) {
    //   echo $param;
    // }   
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */