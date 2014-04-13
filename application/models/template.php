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

    public function getHeaderLinks( $page = null ) {
        if( isset( $page ) ) {
            $links_array = explode( ",", $this->_getLinksFromConfig( $page, 'header' ) );

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

    public function getFooterLinks( $page_type = null ) {
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
}
?>

