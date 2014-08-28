<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clock extends CI_Controller {


    function __construct() {
        parent::__construct();

        $this->load->model('user');
        $this->load->model('items');
        $this->load->model('date', '', TRUE);
    }

    protected function getUserIdFromSession() 
    {
        $session_data = $this->session->userdata('logged_in');

        return $session_data['id'];
    }

    function get_users() {
        $user_level = 5;

        parse_str( $_SERVER['QUERY_STRING'], $params_get_users );

        $page   = $params_get_users['p'];
        $limit  = $params_get_users['n'];
        $sort   = $params_get_users['s'];

        $data['users'] = $this->user->listUsersFromParams( $page, $limit, $sort );

        //var_dump( $data );

        // $this->load->view( 'clock_view', $data );

        return $data;
    }

    function getDateSettings()
    {
        parse_str($_SERVER['QUERY_STRING'], $query);

        $date   = $this->date->getDateSettings();
        // $key    = $query['p'][1];



        foreach ($query['p'] as $key => $value ) {
            $setting = $date[$value];
        }

        $result = "$setting";

        //var_dump($result);

        echo $result;
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
}
