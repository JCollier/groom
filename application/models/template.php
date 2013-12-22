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
}
?>

