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

    public function _getHeaderLinksFromConfig( $page = null ) {
        if( !empty( $this->ini->{$page} ) && 
            !empty( $this->ini->{$page}['template'] ) && 
            !empty( $this->ini->{$page}['template']['header_links'] ) ) {
            return $this->ini->{$page}['template']['header_links'];
        }
        else {
            return $this->ini->default['template']['header_links'];
        }
    }

    public function _getHeaderLinks( $page = null ) {
       $config = $this->_getHeaderLinksFromConfig( $page );

       //var_dump( $config );

        if( isset( $page ) ) {
            if( $page == 'home' ) {
                $links_array = array(
                    'view_social',
                    'view_info',
                    'view_gifts',
                    'view_account',
                    'view_logout'
                );

                $links_header = array(
                  array( 
                    'url'   => 'home/social',
                    'label' => 'Community' ), 
                  array( 
                    'url'   => 'home/info',
                    'label' => 'How It Works' ), 
                  array( 
                    'url'   => 'home/gifts',
                    'label' => 'Profile' ), 
                  array( 
                    'url'   => 'home/account',
                    'label' => 'My Account' ), 
                  array( 
                    'url'   => 'home/logout',
                    'label' => 'Logout' )
                );
            }

            return $links_header;
        }
        else {
            return false;
        }
    }

    public function _getFooterLinks( $page_type = null ) {
        if( isset( $page_type ) ) {
            if( $page_type == 'home' ) {
                $links_header = array(
                  array( 
                    'url'   => 'about',
                    'label' => 'About Us' ), 
                  array( 
                    'url'   => 'contact',
                    'label' => 'Contact Us' ), 
                );
            }

            return $links_header;
        }
        else {
            return false;
        }
    }
}
?>

