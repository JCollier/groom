// <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// session_start(); //we need to call PHP's session object to access it through CI
// class UserAjax extends CI_Controller {

//     function __construct() {
//         parent::__construct();

//         $this->load->model( 'user', '', TRUE );

//         $this->page = $this->db->loadPageConfig();

//         $this->ini->default  = $this->db->loadInits( 'default' );
//         $this->ini->admin    = $this->db->loadInits( 'admin' );

//         $this->load->model( 'template', '', TRUE );
//     }

//     $show_users = intval( $_GET['su'] );

//     function show( $page, $limit = 10 ) {
//         var_dump( 'function showUsers' );
//     }

//     $this->show( 1, 10 );

//     $q = intval( $_GET['q'] );

//     /*
//     $con = mysqli_connect('localhost','peter','abc123','my_db');
//     if (!$con) {
//       die('Could not connect: ' . mysqli_error($con));
//     }
//     */

//     //mysqli_select_db($con,"ajax_demo");
//     $sql = "SELECT * FROM user WHERE id = '".$q."'";
//     //$result = mysqli_query($con,$sql);

//     $result = $sql;

//     var_dump( $result );

//     function index() {
//     //  $session_data = $this->session->userdata('logged_in');

//     //  $data['username']   = $session_data['username'];
//     //  $data['userid']     = $session_data['id'];

//     //  $user_name  = $data['username'];
//     //  $user_id    = $data['userid'];

//     //  if( $this->session->userdata( 'logged_in' ) ) {
//     //      if( $this->user->isUserAdmin( $user_id ) ) {
//     //          $data['base_url']       = $this->config->config['base_url'];
//     //          $data['js_global']      = $this->config->config['js_global'];
//     //          $data['assets']         = $this->_getAdminViewByType( 'assets' );
//     //          $data['head']           = $this->_getAdminViewByType( 'head' );
//     //          $data['links_header']   = $this->_getAdminViewByType( 'links_header' );

//     //          $this->load->view( 'admin_view', $data );
//     //      }
//     //      else {
//     //        redirect('login', 'refresh');
//     //      }
//     //  }
//     //  else {
//     //   //If no session, redirect to login page
//     //   redirect('login', 'refresh');
//     // }
//     }
// }
// ?>

