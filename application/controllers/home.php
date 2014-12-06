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
        $this->load->model( 'template', '', TRUE );
        $this->load->spark('Twiggy/0.8.5');
    }

    function index()
    {
        if ($this->session->userdata('logged_in')) {
            $logged_in = ($this->session->userdata('logged_in'));

            $this->load->helper(array('form'));
            $data = $this->template->loadViewData('home', $logged_in);

            $data['logged_in']          = $logged_in;
            $data['validation_errors']  = validation_errors();
            $data['login_form']         = form_open('verifylogin');
            $data['home_rows']          = $this->getHomeRows('habits', 'habits');

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

            $data['template'] = $this->template->buildTemplateFromData($data, 'home');

            $this->load->view('home_view', $data);
        } else {
            redirect('login', 'refresh');
        }
    }

    function getHomeRows($home_row_div_type, $home_row_subdiv_type)
    {
        $home_rows = array();

        // if ($home_row_subdiv_type == 'habits') {
        //     $home_rows = array_fill($home_rows, 16);
        // }

        return array();
    }

    function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('home', 'refresh');
    }
}



