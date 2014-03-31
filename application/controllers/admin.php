<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Admin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('template','',TRUE);
   $this->load->model('user','',TRUE);
 }

 function index()
 {

// var_dump( $this->session->userdata );

    if($this->session->userdata('logged_in')) {
        $session_data = $this->session->userdata('logged_in');

        $data['username']   = $session_data['username'];
        $data['userid']     = $session_data['id'];

        $user_name  = $data['username'];
        $user_id    = $data['userid'];

        $data['assets'] = $this->template->loadAssets(  array(
                                                        array(  'css' => array( 'main', 'global' ) ),
                                                        array(  'jpg' => array( 'sprite_global' ) ),
                                                    )
                                                );

        $data['head'] = '<head>test header</head>';

        if( $this->user->isUserAdmin( $user_id ) ) {
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

 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('home', 'refresh');
 }

}

?>

