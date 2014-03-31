<?php
    Class User extends CI_Model {
        function login( $username, $password ) {
            $this -> db -> select( 'id, username, password' );
            $this -> db -> from( 'users' );
            $this -> db -> where( 'username', $username );
            $this -> db -> where( 'password', MD5( $password ) );
            $this -> db -> limit( 1 );

            $query = $this -> db -> get();

            if( $query -> num_rows() == 1 ) {
                return $query->result();
            }
            else {
                return false;
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

        function getUserDataById( $id, $params = array() ) {



            // $this -> db -> select( 'id, username, password' );
            // $this -> db -> from( 'users' );
            // $this -> db -> where( 'id', $id );
            // $this -> db -> limit( 1 );

            // $query = $this -> db -> get();

            // if( $query -> num_rows() == 1 ) {
            //     var_dump( $query->result() );

            //     //return $query->result();
            // }

            $sql =  " SELECT `usertype` FROM groom_common.users WHERE " .
                      " `id`='${id}'" .
                      ";";

            $userdata = $this->db->query( $sql )->result_array();

            return $userdata[0];
        }

        function getUsertypeById( $id ) {
            $userdata = $this->getUserDataById( $id );

            return $userdata['usertype'];
        }

        function isUserAdmin( $id ) {
            $usertype = $this->getUsertypeById( $id );

            if( $usertype == 'useradmin' ) {
                return true;
            }
            else {
                return false;
            }
        }
    }
?>

