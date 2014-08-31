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

// -77.00  41.00   72  25  3
// -76.75  41.00   72  25  3
// -76.25  41.00   72  25  3
// -76.00  41.00   72  25  3

            $end_string = "\t72\t25\t3\n";

            $regions = array(
                array(
                    "x_start" => 80.00,
                    "y_start" => 42.00,
                ),
                array(
                    "x_start" => 77.50,
                    "y_start" => 42.00,
                    "bg_color" => 'blue'
                ),
                array(
                    "x_start" => 75.00,
                    "y_start" => 42.00,
                ),
            );

            $string_whole = "0\t1\tPCT_Renter\tPCT_Owner\tPCT_Vacant\n";

            foreach ($regions as $region) {
                $n = $region['x_start'];

                for ($k=1; $k<12; $k++) {
                    $n = $n - 0.25;
                    $y = $region['y_start'];

                    $bg_color = !empty($region['bg_color'])
                        ? $region['bg_color']
                        : 'black';

                    for ($i=1; $i<=6; $i++) {
                        $y = $y-0.27;
                        $x = $n - ($i*0.23);

                        $string = 
                             "-" . 
                            money_format('%.2n', $x) . 
                            "\t" . 
                            money_format('%.2n', $y) . 
                            "\t" . 
                            $bg_color . 
                            $end_string;

                        $string_whole .= $string;
                    }
                }
            }

            echo($string_whole);

            $filepath   = dirname(__FILE__) . '/../../';
            $filename   = $filepath . 'us_housing_simplified_generated.tsv';
            $result = file_put_contents($filename, $string_whole);

            die();

            // $n = 92.00;



            // $n = 82.00;

            // for ($k=1; $k<16; $k++) {
            //     $n = $n - 0.25;
            //     $y = 44.00;

            //     for ($i=1; $i<=8; $i++) {
            //         $y = $y-0.27;
            //         $x = $n - ($i*0.23);

            //         echo(
            //             "-" . 
            //             money_format('%.2n', $x) . 
            //             "  " . 
            //             money_format('%.2n', $y) . 
            //             $end_string
            //         );
            //     }
            // }

            die();

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



