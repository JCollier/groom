<?php
Class Template extends CI_Model {
    protected $_asset_init  = false;
    protected $_assets      = array();

    private function _initAssets() {
        $this->_assets      = array();
        $this->_asset_init  = true;

        return true;
    }

    private function _assetExists( $filename, $type ) {
        if( $type == 'css' ) {
            $folder = 'css';
        }
        elseif( in_array( $type, array( 'png', 'gif', 'jpg' ) ) ) {
            $folder = 'images';
        }

        $asset = APPPATH . 'assets/'.$folder.'/'.$filename.'.'.$type.'';

        if( file_exists( $asset ) ) {
            return $asset;
        }
        else {
            return false;
        }
    }

    function loadAssets( $assets ) {
        foreach( $assets as $asset_set ) {
            foreach( $asset_set as $type => $set ) {
                foreach( $set as $filename ) {
                    $asset = $filename . '.' . $type;

                    $this->_loadAsset( $filename, $type );
                }
            }
        }

        $assets = $this->_assets;

        return $this->_assets;
    }

    private function _loadAsset( $filename, $type ) {
        if( $this->_asset_init != true ) {
            $this->_initAssets();
        }

        if( $this->_assetExists( $filename, $type ) ) {
            $this->_assets[] = $this->_assetExists( $filename, $type );
        }

        return true;
    }

    protected function _getLinksFromConfig( $page = null, $type = 'footer' ) {
        $name = $type . '_links';

        if( !empty( $this->ini->{$page} ) && 
            !empty( $this->ini->{$page}['template'] ) && 
            !empty( $this->ini->{$page}['template'][$name] ) ) {

            return $this->ini->{$page}['template'][$name];
        }
        else {
            return $this->ini->default['template'][$name];
        }
    }

    public function getHeaderLinks( $page = null, $user_level = 0 ) {
        if( isset( $page ) ) {
            $links_array = explode( ",", $this->_getLinksFromConfig( $page, 'header' ) );

            $links_header = array();

            // var_dump( $user_level );
            // var_dump( $links_array );

            foreach( $this->page as $key => $page_data ) {
                $page_name = $page_data['page'];

                if( in_array( $page_data['page'], $links_array ) && 
                    $user_level >= $page_data['permissions'] ) {
                    $links_header[] = array(
                        'page'      => $page_name,
                        'url'       => $this->page[$page_name]['path'],
                        'label'     => strtoupper( $this->page[$page_name]['label'] ),
                    );
                }
            }

            if( !empty( $links_header ) ) {
                return $links_header;
            }
        }

        return array( array( 'url' => 'home/logout', 'label' => 'logout' ) );
    }

    public function getFooterLinks( $page = null ) {
        if( isset( $page ) ) {
            $links_array = explode( ",", $this->_getLinksFromConfig( $page, 'footer' ) );

            $links_header = array();

            foreach( $this->page as $key => $page_data ) {
                $page_name = $page_data['page'];

                if( in_array( $page_data['page'], $links_array ) ) {
                    $links_header[] = array(
                        'page'      => $page_name,
                        'url'       => $this->page[$page_name]['path'],
                        'label'     => $this->page[$page_name]['label'],
                    );
                }
            }

            if( !empty( $links_header ) ) {
                return $links_header;
            }
        }

        return array( array( 'url' => 'home/logout', 'label' => 'logout' ) );
    }

    public function buildTemplateFromData($data, $page = 'home') 
    {
        foreach ($data as $key => $param) {
            $this->twiggy->set($key, $param);
        }

        return $this->twiggy->template($page)->display();
    }

    public function getStaticFromDb($page, $template) 
    {
        $sql =  "SELECT `static_content` FROM groom_common.statics " .
                "WHERE `page`='{$page}' AND `template`='{$template}';";
        $static = $this->db->query( $sql )->result_array();

        return $static[0]['static_content'];
    }

    public function loadViewData($page = 'home')
    {
        $session_data       = $this->session->userdata('logged_in');
        $data['username']   = $session_data['username'];
        $data['userid']     = $session_data['id'];
        $level              = $this->user->getUserLevelById($data['userid']);

        $data['assets'] = $this->template->loadAssets(  
            array(
                array('css' => array('main', 'global')),
                array('jpg' => array('sprite_global')),
            )
        );

        $data['base_url']                       = $this->config->config['base_url'];
        $data['image_path']                     = $this->config->config['image_path'];
        $data['js_path']['global']              = $this->config->config['js_global'];
        $data['css_path']['global']             = $this->config->config['css_global'];
        $data['css_path']['bootstrap']          = $this->config->config['css_bootstrap'];
        $data['css_path']['bootstrap_theme']    = $this->config->config['css_bootstrap_theme'];
        $data['links_header']                   = $this->template->getHeaderLinks($page, $level);
        $data['links_footer']                   = $this->template->getFooterLinks($page);

        if ($page == 'home') {
            $data['bg_portrait'] = $data['base_url'] . 'htdocs/images_1/default/bg_img_3.jpg';
        }

        return $data;
    }
}
?>

