<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('template','',TRUE);
 }

 function index()
 {
    if($this->session->userdata('logged_in')) {
        $session_data = $this->session->userdata('logged_in');
        $data['username']   = $session_data['username'];
        $data['userid']     = $session_data['id'];

        $data['assets'] = $this->template->loadAssets(  array(
                                                        array(  'css' => array( 'main', 'global' ) ),
                                                        array(  'jpg' => array( 'sprite_global' ) ),
                                                    )
                                                );


        $data['head'] = '<head>test header</head>';

        $this->load->view( 'home_view', $data );
    }
    else {
     //If no session, redirect to login page
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

