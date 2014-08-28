<?php
    Class Date extends CI_Model {
        protected $time_modifier = 11520;

        // function login( $username, $password ) {
        //     $this -> db -> select( 'id, username, password' );
        //     $this -> db -> from( 'users' );
        //     $this -> db -> where( 'username', $username );
        //     $this -> db -> where( 'password', MD5( $password ) );
        //     $this -> db -> limit( 1 );

        //     $query = $this -> db -> get();

        //     if( $query -> num_rows() == 1 ) {
        //         return $query->result();
        //     }
        //     else {
        //         return false;
        //     }
        // }

        // function checkUsernameExists( $username ) {
        //     $user_exists = $this->db->get_where( 'users', 
        //                                             array( 'username' => $username ) 
        //                             )->result();

        //     $user_exists = (Array)$user_exists;

        //     if( !empty( $user_exists ) ) {
        //         $user_exists    = (Array)$user_exists;
        //         $username       = $user_exists[0]->username;
        //     }

        //     if( !empty( $user_exists ) ) {
        //         return true;
        //     }
        //     else {
        //         return false;
        //     }
        // }

        // function checkEmailExists( $email ) {
        //     $email_exists = $this->db->get_where( 'users', 
        //                                             array( 'email' => $email ) 
        //                             )->result();

        //     $email_exists = (Array)$email_exists;

        //     if( !empty( $email_exists ) ) {
        //         $email_exists   = (Array)$email_exists;
        //         $email          = $email_exists[0]->email;
        //     }

        //     if( !empty( $email_exists ) ) {
        //         return true;
        //     }
        //     else {
        //         return false;
        //     }
        // }

        // function getUserDataById( $id, $params = array() ) {
        //     $sql =  " SELECT * FROM vesper_common.users WHERE " .
        //               " `id`='${id}'" .
        //               ";";

        //     $userdata = $this->db->query( $sql )->result_array();

        //     return $userdata[0];
        // }

        // function getUsertypeById( $id ) {
        //     $userdata = $this->getUserDataById( $id );

        //     return $userdata['usertype'];
        // }

        // function getUserLevelById( $id ) {
        //     $userdata = $this->getUserDataById( $id );

        //     return $userdata['userlevel'];
        // }

        // function isUserAdmin( $id ) {
        //     $usertype = $this->getUsertypeById( $id );

        //     if( $usertype == 'admin' ) {
        //         return true;
        //     }
        //     else {
        //         return false;
        //     }
        // }

        // public function getUserProfileImgSrcByUserId($user_id) {
        //     $base_url = $this->config->config['base_url'];

        //     return '';
        // }

        // public function getUserProfileImgSrc($img_folder = 'profile', $img_path, $img_name) {
        //     $base_url = $this->config->config['base_url'] . 'htdocs/';

        //     return $base_url . $img_folder . $img_path . $img_name;;
        // }

        

        // public function getUsersExtraDisplay($limit = 4, $order_by = 'total_received') {
        //     $users = array();

        //     // $donators = $this->getUsersExtraDisplay($limit, $order_by);
        //    $users['donators'] = $this->getUsersExtraDisplayInfo($limit, $order_by);

        //     foreach( $users['donators'] as $key => $donator ) {
        //         $user_data = $this->getUserDataById($donator['id']);

        //         $users['donators'][$key]['username']        = $user_data['username'];

        //         $users['donators'][$key]['profile_id']      = $user_data['id'];
        //         $users['donators'][$key]['profile_public']  = false;

        //         $users['donators'][$key]['total_donated']   = $donator['total_donated'] . '.00';
        //         $users['donators'][$key]['profile_img_src'] = $this->getUserProfileImgSrc(
        //                                                                                     'profile', 
        //                                                                                     $donator['profile_img_path'], 
        //                                                                                     $donator['profile_img_name']
        //                                                                                 );
        //     }
            
        //     // $users['donators'] = array('1','2','3','5');

        //     //var_dump( $users );

        //     return $users;

        //     // return $users;
        // }

        // public function getUsersExtraDisplayInfo(  
        //                                         $limit      = 4, 
        //                                         $order_by   = 'total_donated',
        //                                         $visibility = 'public',
        //                                         $sort       = 'DESC' 
        //                                     ) 
        // {
        //     $limit = ($limit > 16) 
        //         ? 16
        //         : $limit;

        //     $sort = strtoupper($sort);

        //     $sql =  "SELECT * FROM vesper_common.users_extra ";
        //     $sql .= "WHERE `profile_visibility`='${visibility}' ";
        //     $sql .= "ORDER BY ${order_by} $sort ";
        //     $sql .= "LIMIT ${limit} ";

        //     return $this->db->query( $sql )->result_array();
        // }

        // public function getUserFromUsersExtraById($user_id)
        // {
        //     $sql =  "SELECT * FROM vesper_common.users_extra ";
        //     $sql .= "WHERE `user_id`='{$user_id}' ";
        //     $sql .= "LIMIT 1";

        //     return $this->db->query( $sql )->result_array();
        // }

        // public function listUsersFromParams( $page, $limit, $order = 'id' ) {
        //     if( $limit > 1000 ) {
        //         echo( '' );
        //     }
        //     else {
        //         $offset = ( intval( $page ) - 1 ) * intval( $limit );

        //         $sql =  " SELECT * FROM vesper_common.users" . 
        //                 " LIMIT ${offset},${limit};";

        //         return $this->db->query( $sql )->result_array();
        //     }
        // }

        // public function returnUsers() {
        //     return 'testing ajax returnUsers() function';
        // }

        // public function insertUserIntoUserExtra($user, $options = array()) 
        // {
        //     $user       = array('user_id' => 106);
        //     $options    = array('charity_type' => 'donor');

        //     $params = array(
        //         'user_id'               => $user['user_id'],
        //         'profile_visibility'    => (isset($options['profile_visibility'])) ? $options['profile_visibility'] : 'private',
        //         'favorite_users'        => '',
        //         'charity_type'          => (isset($options['charity_type'])) ? $options['charity_type'] : 'recipient',
        //         'favorite_items'        => '',
        //         'total_donated'         => 100,
        //         'total_received'        => 0,
        //         'profile_img_path'      => '/',
        //         'profile_img_name'      => 'default.gif'
        //     );

        //     if (!$this->getUserFromUsersExtraById($user['user_id'])) {
        //         $table      = 'users_extra';
        //         $database   = 'vesper_common';

        //         return $this->db->insertWithParams($database, $table, $params);
        //     } else {
        //         return false;
        //     }
        // }

        // public function isUserInvitedByEmail($email)
        // {
        //     $sql =  "SELECT `value` FROM vesper_common.inits " . 
        //             "WHERE `page`='global' AND `section`='user' ".
        //             "AND `key`='invited_users'";

        //     $result = $this->db->query( $sql )->result_array();

        //     return in_array($email, explode(" ", $result[0]['value'] ));
        // }

        protected function setServerStartDate() 
        {
            $this->server_start_ts = strtotime('2014-08-22 00:00:00 UTC');
        }

        protected function setServerTimestamp() 
        {
            $server_date = getDate();

            $this->server_current_ts = $server_date['0'];
        }

        protected function setAppTimeElapsedTimestamp() 
        {
            $this->app_time_elapsed_ts = 
                $this->server_current_ts - 
                $this->server_start_ts;
        }

        protected function setAppStartDate()
        {
            $this->app_start_date = '0540-01-01';
        }

        protected function normalizeDate($date) 
        {
            $normalized_date = array();

            $years_elapsed_float    = ((($date['day'] - 1)/30)/12);
            $years_elapsed_whole    = floor($years_elapsed_float);
            $years_elapsed_dec      = $years_elapsed_float - $years_elapsed_whole;

            $months_elapsed_float   = $years_elapsed_dec * 12;
            $months_elapsed_whole   = floor($months_elapsed_float);
            $months_elapsed_dec     = $months_elapsed_float - $months_elapsed_whole;

            $days_elapsed_float = $months_elapsed_dec * 30;
            $days_elapsed_whole = floor($days_elapsed_float);
            $days_elapsed_dec   = $days_elapsed_float - $days_elapsed_whole;

            $normalized_year    = $date['year']     + $years_elapsed_whole;
            $normalized_month   = $date['month']    + $months_elapsed_whole;
            $normalized_day     = 1                 + $days_elapsed_whole;

            $normalized_date['year']    = str_pad(strval($normalized_year), 4, "0", STR_PAD_LEFT);
            $normalized_date['month']   = str_pad(strval($normalized_month), 2, "0", STR_PAD_LEFT);
            $normalized_date['day']     = str_pad(strval($normalized_day), 2, "0", STR_PAD_LEFT);

            return $normalized_date;
        }

        protected function getCurrentDateArray($start_date, $game_time_elapsed_days) 
        {
            $current_date_array['year']     = $start_date['year'];
            $current_date_array['month']    = $start_date['month'];
            $current_date_array['day']      = str_pad(
                ($start_date['day'] + $game_time_elapsed_days), 
                2, 
                "0", 
                STR_PAD_LEFT
            );

            return $this->normalizeDate($current_date_array);
        }

        protected function setAppCurrentDate() {
            //var_dump( $this->time_modifier );

            $game_time_elapsed = $this->app_time_elapsed_ts * $this->time_modifier;

            $current_timestamp          = $this->server_start_ts + $game_time_elapsed;
            $game_time_elapsed_days     = ($game_time_elapsed/60/60/24);
            $game_time_elapsed_hours    = ($game_time_elapsed/60/60/24);

            $start_date = explode( "-", $this->app_start_date);

            $start_date['year']     = $start_date[0];
            $start_date['month']    = $start_date[1];
            $start_date['day']      = $start_date[2];            

            unset($start_date[0]);
            unset($start_date[1]);
            unset($start_date[2]);

            $current_date = implode(
                "-", $this->getCurrentDateArray($start_date, $game_time_elapsed_days)
            );

            $this->app_current_date = $current_date;
        }        

        public function initDateSettings() 
        {
            $this->setServerStartDate();
            $this->setServerTimestamp();            
            $this->setAppTimeElapsedTimestamp();
            $this->setAppStartDate();
            $this->setAppCurrentDate();
        }

        public function getDateSettings()
        {
            $this->initDateSettings();

            $date_settings                                  = array();
            $date_settings['server_start_ts']               = $this->server_start_ts;
            $date_settings['server_start_date']             = gmdate("Y-m-d H:i:s", $this->server_start_ts);
            $date_settings['server_current_ts']             = $this->server_current_ts;
            $date_settings['server_current_date']           = gmdate("Y-m-d H:i:s", $this->server_current_ts);
            $date_settings['app_time_elapsed_since_start']  = $this->app_time_elapsed_ts;
            $date_settings['app_start_date']                = $this->app_start_date;
            $date_settings['app_current_date']              = $this->app_current_date;

            //var_dump( $date_settings );

            return $date_settings;
        }
    }
?>

