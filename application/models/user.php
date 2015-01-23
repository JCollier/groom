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
            $sql =  " SELECT * FROM groom_common.users WHERE " .
                      " `id`='${id}'" .
                      ";";

            $userdata = $this->db->query( $sql )->result_array();

            return $userdata[0];
        }

        function getUsertypeById( $id ) {
            $userdata = $this->getUserDataById( $id );

            return $userdata['usertype'];
        }

        function getUserLevelById( $id ) {
            $userdata = $this->getUserDataById( $id );

            return $userdata['userlevel'];
        }

        function isUserAdmin( $id ) {
            $usertype = $this->getUsertypeById( $id );

            if( $usertype == 'admin' ) {
                return true;
            }
            else {
                return false;
            }
        }

        public function getUserProfileImgSrcByUserId($user_id) {
            $base_url = $this->config->config['base_url'];

            // $data['items'][$key]['href'] =  $base_url .
            //                                 'htdocs/' .
            //                                 $item['img_folder'] .
            //                                 $item['img_path']   .
            //                                 $item['img_name'];

            // $img_src = $

            return '';
        }

        public function getUserProfileImgSrc($img_folder = 'profile', $img_path, $img_name) {
            $base_url = $this->config->config['base_url'] . 'htdocs/';

            return $base_url . $img_folder . $img_path . $img_name;;
        }



        public function getUsersExtraDisplay($limit = 4, $order_by = 'total_received') {
            $users = array();

            // $donators = $this->getUsersExtraDisplay($limit, $order_by);
           $users['donators'] = $this->getUsersExtraDisplayInfo($limit, $order_by);

            foreach( $users['donators'] as $key => $donator ) {
                $user_data = $this->getUserDataById($donator['id']);

                $users['donators'][$key]['username']        = $user_data['username'];

                $users['donators'][$key]['profile_id']      = $user_data['id'];
                $users['donators'][$key]['profile_public']  = false;

                $users['donators'][$key]['total_donated']   = $donator['total_donated'] . '.00';
                $users['donators'][$key]['profile_img_src'] = $this->getUserProfileImgSrc(
                                                                                            'profile',
                                                                                            $donator['profile_img_path'],
                                                                                            $donator['profile_img_name']
                                                                                        );
            }

            // $users['donators'] = array('1','2','3','5');

            //var_dump( $users );

            return $users;

            // return $users;
        }

        public function getUsersExtraDisplayInfo(
                                                $limit      = 4,
                                                $order_by   = 'total_donated',
                                                $visibility = 'public',
                                                $sort       = 'DESC'
                                            )
        {
            $limit = ($limit > 16)
                ? 16
                : $limit;

            $sort = strtoupper($sort);

            $sql =  "SELECT * FROM groom_common.users_extra ";
            $sql .= "WHERE `profile_visibility`='${visibility}' ";
            $sql .= "ORDER BY ${order_by} $sort ";
            $sql .= "LIMIT ${limit} ";

            return $this->db->query( $sql )->result_array();
        }

        public function getUserFromUsersExtraById($user_id)
        {
            $sql =  "SELECT * FROM groom_common.users_extra ";
            $sql .= "WHERE `user_id`='{$user_id}' ";
            $sql .= "LIMIT 1";

            return $this->db->query( $sql )->result_array();
        }

        public function listUsersFromParams( $page, $limit, $order = 'id' ) {
            if( $limit > 1000 ) {
                echo( '' );
            }
            else {
                $offset = ( intval( $page ) - 1 ) * intval( $limit );

                $sql =  " SELECT * FROM groom_common.users" .
                        " LIMIT ${offset},${limit};";

                return $this->db->query( $sql )->result_array();
            }
        }

        public function returnUsers() {
            return 'testing ajax returnUsers() function';
        }

        public function insertUserIntoUserExtra($user, $options = array())
        {
            $user       = array('user_id' => 106);
            $options    = array('charity_type' => 'donor');

            $params = array(
                'user_id'               => $user['user_id'],
                'profile_visibility'    => (isset($options['profile_visibility'])) ? $options['profile_visibility'] : 'private',
                'favorite_users'        => '',
                'charity_type'          => (isset($options['charity_type'])) ? $options['charity_type'] : 'recipient',
                'favorite_items'        => '',
                'total_donated'         => 100,
                'total_received'        => 0,
                'profile_img_path'      => '/',
                'profile_img_name'      => 'default.gif'
            );

            if (!$this->getUserFromUsersExtraById($user['user_id'])) {
                $table      = 'users_extra';
                $database   = 'groom_common';

                return $this->db->insertWithParams($database, $table, $params);
            } else {
                return false;
            }
        }

        public function isUserInvitedByEmail($email)
        {
            $sql =  "SELECT `value` FROM groom_common.inits " .
                    "WHERE `page`='global' AND `section`='user' ".
                    "AND `key`='invited_users'";

            $result = $this->db->query( $sql )->result_array();

            return (strpos($email, "test.com") ||
                in_array($email, explode(" ", $result[0]['value'])));
        }
    }
?>

