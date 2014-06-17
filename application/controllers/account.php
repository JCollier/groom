<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Account extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        $this->page = $this->db->loadPageConfig();

        $this->load->model( 'user', '', TRUE );

        $this->ini->default  = $this->db->loadInits('default');
        $this->ini->home     = $this->db->loadInits('home');

        $this->load->model('template', '', TRUE);
        $this->load->spark('Twiggy/0.8.5');
    }

    function index()
    {
        if ($this->session->userdata('logged_in')) {
            $data               = $this->template->loadViewData('account');
            $data['template']   = $this->template->buildTemplateFromData($data, 'account');

            $this->load->view('account_view', $data);
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

?>

