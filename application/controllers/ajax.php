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
        $this->load->model( 'items' );
    }

    protected function getUserIdFromSession() 
    {
        $session_data = $this->session->userdata('logged_in');

        return $session_data['id'];
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

    function get_user_items() {
        $this->getUserIdFromSession();

        $this->load->spark('Twiggy/0.8.5');

        parse_str( $_SERVER['QUERY_STRING'], $params_get_user_items );

        $page   = $params_get_user_items['p'];
        $limit  = $params_get_user_items['n'];
        $sort   = $params_get_user_items['s'];

        $user_id = $this->getUserIdFromSession();

        if( $user_id > 0 ) {
            $data['items'] = $this->items->getItemsByUserId(    
                                                                $user_id, 
                                                                $page, 
                                                                $limit, 
                                                                'value'
                                                            );
        }
        else {
            $data['items'] = null;
        }

        $base_url = $this->config->config['base_url'];

        foreach( $data['items'] as $key => $item ) {
            $data['items'][$key]['href'] =  $base_url .
                                            'htdocs/' .  
                                            $item['img_folder'] . 
                                            $item['img_path']   . 
                                            $item['img_name'];

            $data['items'][$key]['description_1'] = $item['title'] .  ' - $' . $item['value_estimated'];
            $data['items'][$key]['description_2'] = $item['description'];

            $data['items'][$key]['image']['display']['width']   = '90';
            $data['items'][$key]['image']['display']['height']  = 'auto';

            $data['items'][$key]['item']['display']['width']   = '480';
            $data['items'][$key]['item']['display']['height']  = '160';
            $data['items'][$key]['item']['display']['span']    = '6';
        }

        foreach( $data as $key => $param ) {
          $this->twiggy->set( $key, $param );
        }

        $data['template'] = $this->twiggy->template( 'user_items' )->display();

        $this->load->view( 'ajax_items_view', $data );

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