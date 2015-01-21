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

        $data['method'] = 'get_users';
        $data['users'] = $this->user->listUsersFromParams( $page, $limit, $sort );

        $this->load->view( 'ajax_view', $data );

        return $data;
    }


            /**
     * the demo for file upload tutorial on codesamplez.com
     * @return view
     */
    function file_upload_demo()
    {
        try
        {
            if (1==2){

            //if ($this->input->post("submit")){
                // $this->load->library("app/uploader");
                // $this->uploader->do_upload();
            }

            //return $this->view();
            return null;
        } catch(Exception $err) {
            // log_message("error",$err->getMessage());
            // return show_error($err->getMessage());
        }
    }

    function get_item_upload_block()
    {
        $user_level = 5;

        parse_str( $_SERVER['QUERY_STRING'], $params_get_users );

        $page   = $params_get_users['p'];
        $limit  = $params_get_users['n'];
        $sort   = $params_get_users['s'];

        $data['method'] = 'get_item_upload_block';

        $logged_in = $this->session->userdata('logged_in');



        $valid_pages = array(
            '1' => 'more_info',
            '2' => 'about',
            '3' => 'gifts',
            '4' => 'upload'
        );

        $show_login_form = true;
        $show_about_us = false;

        $show_login_form    = (!($logged_in) && in_array($valid_pages[$page], array('upload','gifts')));
        $show_about_us      = in_array($valid_pages[$page], array('about'));
        $show_learn_more    = in_array($valid_pages[$page], array('more_info'));
        $show_upload        = in_array($valid_pages[$page], array('gifts'));
        $show_gifts         = in_array($valid_pages[$page], array('upload'));

        if ($logged_in) {
            $show_login_form = false;
            $data['users'] = $this->user->listUsersFromParams( $page, $limit, $sort );
        }

        $data['show_login_form']        = $show_login_form;
        $data['show_item_upload_block'] = $show_login_form;
        $data['show_item_about_us']     = $show_about_us;
        $data['show_learn_more']        = $show_learn_more;
        $data['show_upload']            = $show_upload;
        $data['show_gifts']             = $show_gifts;

        $this->file_upload_demo();

        $this->load->helper(array('form'));


        if ($page == '4') {
            $data['item_uploader'] = $this->items->renderItemUploader( $page, $limit, $sort );
        }

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

            $data['items'][$key]['description_1'] = strtoupper( substr( $item['description'], 0, 16 ) .  ' - $' . $item['value_estimated'] );

            $data['items'][$key]['description_2'] = substr( $item['description'], 0, 84 );

            $data['items'][$key]['image']['display']['width']   = '232';
            $data['items'][$key]['image']['display']['height']  = '200';

            $data['items'][$key]['item']['display']['width']   = '234px';
            // $data['items'][$key]['item']['display']['width']   = '22%';
            $data['items'][$key]['item']['display']['height']  = '264';
            $data['items'][$key]['item']['display']['span']    = '4';
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
