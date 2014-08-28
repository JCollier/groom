<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {
    function __construct()
    {
        parent::__construct();

        $this->page = $this->db->loadPageConfig();

        $this->ini->default  = $this->db->loadInits('default');
        $this->ini->home     = $this->db->loadInits('home');

        $this->load->model('user', '', TRUE);
        $this->load->model('template', '', TRUE);
        $this->load->model('date', '', TRUE);
        $this->load->spark('Twiggy/0.8.5');
    }

    function index()
    {
        if ($this->session->userdata('logged_in')) {
            $data = $this->template->loadViewData('home');

            //$this->user->insertUserIntoUserExtra(1, array()); will make  use of this later
            $data['display_params']['users'] = $this->user->getUsersExtraDisplay(4);
            $data['display_params']['infos'] = array(
                array(
                    'title'         => 'some title 1',
                    'description'   => 'some title 1some title 1some title 1some title 1some title 1some title 1some title 1some title 1',
                    'img_src'       => 'info_1.jpg'
                ),
                array(
                    'title'         => 'some title 2',
                    'description'   => 'some title 1some title 1some title 1some title 1some title 1some title 1some title 1some title 1',
                    'img_src'       => 'info_2.jpg'
                ),
                array(
                    'title'         => 'some title 3',
                    'description'   => 'some title 1some title 1some title 1some title 1some title 1some title 1some title 1some title 1',
                    'img_src'       => 'info_3.jpg'
                ),
                array(
                    'title'         => 'some title 4',
                    'description'   => 'some title 1some title 1some title 1some title 1some title 1some title 1some title 1some title 1',
                    'img_src'       => 'info_4.jpg'
                )
            );

            // $data['app_info']['server_time'] = $this->date->getServerTime();
    
            $data['app_info']['date']       = $this->date->getDateSettings();
            $data['app_info']['version']    = "v" . $this->config->config['app_info']['version'] 
                ?: "n/";
            
            var_dump( $data['app_info'] );

            $data['template'] = $this->template->buildTemplateFromData($data, 'home');

            $this->load->view('home_view', $data);
        } else {
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



