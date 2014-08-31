<?php
    Class Date extends CI_Model {
        protected $time_modifier = 11520;

        protected function setServerStartDate() 
        {
            $this->server_start_ts = strtotime('2014-08-27 00:00:00 UTC');
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

