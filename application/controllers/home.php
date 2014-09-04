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

            $end_string = "\t72\t25\t3";

            $regions = array(
                // 1
                array(
                    "x_start" => 80.00,
                    "y_start" => 42.00,
                ),
                array(
                    "x_start" => 77.50,
                    "y_start" => 42.00,
                    // "bg_color" => '#3333ff'
                ),
                array(
                    "x_start" => 75.00,
                    "y_start" => 42.00,
                    // "bg_color" => '#3333ff'
                ),



                // 2
                array(
                    "x_start" => 82.50,
                    "y_start" => 41.00,
                    // "bg_color" => '#333333'
                ),
                array(
                    "x_start" => 80.00,
                    "y_start" => 41.00,
                    // "bg_color" => '#ff3333'
                ),
                array(
                    "x_start" => 77.50,
                    "y_start" => 41.00,
                    // "bg_color" => '#333333'
                ),



                // 3
                array(
                    "x_start" => 85.00,
                    "y_start" => 40.00,
                    // "bg_color" => '#333333'
                ),
                array(
                    "x_start" => 82.50,
                    "y_start" => 40.00,
                    // "bg_color" => '#333333'
                ),
                array(
                    "x_start" => 80.00,
                    "y_start" => 40.00,
                    // "bg_color" => '#ff3333'
                ),


                // // 4
                // array(
                //     "x_start" => 92.50,
                //     "y_start" => 40.00,
                //     // "bg_color" => '#333333'
                // ),
                // array(
                //     "x_start" => 90.00,
                //     "y_start" => 40.00,
                //     // "bg_color" => '#333333'
                // ),
                // array(
                //     "x_start" => 87.50,
                //     "y_start" => 40.00,
                //     // "bg_color" => '#ff3333'
                // ),


                // 4
                array(
                    "x_start" => 85.00,
                    "y_start" => 39.00,
                    // "bg_color" => '#333333'
                ),
                array(
                    "x_start" => 82.50,
                    "y_start" => 39.00,
                    // "bg_color" => '#333333'
                ),
                array(
                    "x_start" => 80.00,
                    "y_start" => 39.00,
                    // "bg_color" => '#ff3333'
                ),


                // 5
                array(
                    "x_start" => 85.00,
                    "y_start" => 38.00,
                    // "bg_color" => '#333333'
                ),
                array(
                    "x_start" => 82.50,
                    "y_start" => 38.00,
                    // "bg_color" => '#333333'
                ),
                array(
                    "x_start" => 80.00,
                    "y_start" => 38.00,
                    // "bg_color" => '#ff3333'
                ),



                // 6
                array(
                    "x_start" => 85.00,
                    "y_start" => 37.00,
                    // "bg_color" => '#333333'
                ),
                array(
                    "x_start" => 82.50,
                    "y_start" => 37.00,
                    // "bg_color" => '#333333'
                ),
                array(
                    "x_start" => 80.00,
                    "y_start" => 37.00,
                    // "bg_color" => '#ff3333'
                ),


                // 7
                array(
                    "x_start" => 85.00,
                    "y_start" => 36.00,
                    // "bg_color" => '#333333'
                ),
                array(
                    "x_start" => 82.50,
                    "y_start" => 36.00,
                    // "bg_color" => '#333333'
                ),
                array(
                    "x_start" => 80.00,
                    "y_start" => 36.00,
                    // "bg_color" => '#ff3333'
                ),


                // // 8
                // array(
                //     "x_start" => 92.50,
                //     "y_start" => 39.00,
                //     // "bg_color" => '#333333'
                // ),
                // array(
                //     "x_start" => 90.00,
                //     "y_start" => 39.00,
                //     // "bg_color" => '#333333'
                // ),
                // array(
                //     "x_start" => 87.50,
                //     "y_start" => 39.00,
                //     // "bg_color" => '#333333'
                // ),



                // 7
                array(
                    "x_start" => 92.50,
                    "y_start" => 38.00,
                    // "bg_color" => '#333333'
                ),
                array(
                    "x_start" => 90.00,
                    "y_start" => 38.00,
                    // "bg_color" => '#333333'
                ),
                array(
                    "x_start" => 87.50,
                    "y_start" => 38.00,
                    // "bg_color" => '#333333'
                ),



                // 8
                array(
                    "x_start" => 92.50,
                    "y_start" => 37.00,
                    // "bg_color" => '#333333'
                ),
                array(
                    "x_start" => 90.00,
                    "y_start" => 37.00,
                    // "bg_color" => '#333333'
                ),
                array(
                    "x_start" => 87.50,
                    "y_start" => 37.00,
                    // "bg_color" => '#333333'
                ),



                // 9
                array(
                    "x_start" => 92.50,
                    "y_start" => 36.00,
                    // "bg_color" => '#333333'
                ),
                array(
                    "x_start" => 90.00,
                    "y_start" => 36.00,
                    // "bg_color" => '#333333'
                ),
                array(
                    "x_start" => 87.50,
                    "y_start" => 36.00,
                    // "bg_color" => '#333333'
                ),



                // 10
                array(
                    "x_start" => 92.50,
                    "y_start" => 35.00,
                    // "bg_color" => '#333333'
                ),
                array(
                    "x_start" => 90.00,
                    "y_start" => 35.00,
                    // "bg_color" => '#333333'
                ),
                array(
                    "x_start" => 87.50,
                    "y_start" => 35.00,
                    // "bg_color" => '#333333'
                ),


                // 10
                array(
                    "x_start" => 85.00,
                    "y_start" => 35.00,
                    // "bg_color" => '#333333'
                ),
                array(
                    "x_start" => 82.50,
                    "y_start" => 35.00,
                    // "bg_color" => '#333333'
                ),
                array(
                    "x_start" => 80.00,
                    "y_start" => 35.00,
                    // "bg_color" => '#333333'
                ),
            );

            $string_whole = "id\t0\t1\tPCT_Renter\tPCT_Owner\tPCT_Vacant\tPCT_Background\t PCT_Region_Id\n";

            $r = 1;
            $p = 1;
            $s = 1;

            $algo_colors = array(
                'c23d4b',
                '4387c7',
                '1d7d3d',
                'f1ca1c',
                '8177b7',
                'e16326',
            );

            $s = 1;

            $q = 0;

            foreach ($regions as $region) {
                $n = $region['x_start'];

                $r_mod = ($r % 3);

                // var_dump( $r_mod );

                $s_mod = ($r % 3);

                
                // Horizontal swathes of land
                // if (($r % 2) == 0) {
                //     $q = $q + 1;
                // }

                // if (($r % 6) == 0) {
                //     $q = $q + 1;
                // }

                $color_alt_value = ($s_mod > 0)
                    ? 'f'
                    : '0';

                // $q = $r;
                
                $q = ($q % 6);
                // var_dump( $q );

                // if ($q % 6) {
                //     $q_color = ((($q + rand(0, 500)) % 6) % 6);
                // } else {
                //     $q_color = $q;
                // }

                $q_color = $q;

                $r1 = $algo_colors[($q_color)][0];
                $r2 = $algo_colors[($q_color)][1];
                $g1 = $algo_colors[($q_color)][2];
                $g2 = $algo_colors[($q_color)][3];
                $b1 = $algo_colors[($q_color)][4];
                $b2 = $algo_colors[($q_color)][5];

                for ($k=1; $k<12; $k++) {
                    $n = $n - 0.25;
                    $y = $region['y_start'];

                    $colors = array($r1, $r2, $g1, $g2, $b1, $b2);

                        for ($i=1; $i<=6; $i++) {
                            $y = $y-0.27;
                            $x = $n - ($i*0.23);

                        $bg_color_new = "#" . $r1 . $r2 . $g1 . $g2 . $b1 . $b2; 

                        $bg_color = !empty($region['bg_color'])
                            ? $region['bg_color']
                            : $bg_color_new;

                        $region_id = !empty($region_id['region_id'])
                            ? $region_id['region_id']
                            : 0;

                        $string = 
                            $p . 
                            "\t" . 
                             "-" . 
                            money_format('%.2n', $x) . 
                            "\t" . 
                            money_format('%.2n', $y) . 
                            $end_string .
                            "\t" . 
                            $bg_color . 
                            "\t" . 
                            $region_id . 
                            "\n";

                        $string_whole .= $string;

                        $p = $p + 1;
                        // $s = $s + 1;
                    };

                    
                };

                $r = $r + 1;
                $s = $s + 1;
                $q = $q + 1;
            };

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



