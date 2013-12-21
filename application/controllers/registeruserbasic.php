<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RegisterUserBasic extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('user','',TRUE);
    }

    function index() {
        //This method will have the credentials validation
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

        if( $this->form_validation->run() == FALSE ) {
            //Field validation failed.  User redirected to login page
            $this->load->view('login_view');
        }
        else{
            //Go to private area
            redirect('home', 'refresh');
        }
    }

    function checkUsernameExists( $username ) {
        $user_exists = $this->db->get_where( 'users', 
                                                array( 'username' => $username ) 
                                )->result();

        $user_exists = (Array)$user_exists;

        if( !empty( $user_exists ) ) {
            $user_exists    = (Array)$user_exists;
            $username       = $user_exists[0]->username;
        }

        if( !empty( $user_exists ) ) {
            return true;
        }
        else {
            return false;
        }
    }

    function checkEmailExists( $email ) {
        $email_exists = $this->db->get_where( 'users', 
                                                array( 'email' => $email ) 
                                )->result();

        $email_exists = (Array)$email_exists;

        if( !empty( $email_exists ) ) {
            $email_exists   = (Array)$email_exists;
            $email          = $email_exists[0]->email;
        }

        if( !empty( $email_exists ) ) {
            return true;
        }
        else {
            return false;
        }
    }

    function check_database( $password ) {
        $username    = $this->input->post( 'username' );
        $email       = $this->input->post( 'email' );
        $confirmed   = 'not_confirmed';

        $user_exists    = $this->checkUsernameExists( $username );
        $email_exists   = $this->checkEmailExists( $email );

        if( $user_exists ) {
          echo( 'Username has been taken!' );
          return false;
        }
        else if( $email_exists ) {
          echo( 'Email address is already in use!' );
          return false;
        }
        else {
            $sql =  "insert into users (username, email, password) " .
                    "values ( '" 
                    . $username         . "','" 
                    . $email            . "','" 
                    . md5( $password )  . "' );";
            $query = $this->db->query( $sql );

            if( $query ) {
                echo( 'Registration Successful!' );
                return true;
            }
            else {
                return false;
            }
        }
    }
}
?>
