<?php
Class Items extends CI_Model {
    public function getItemsByUserId( $user_id, $page = 1, $limit = 20, $sort = 'id' ) {
        $limit = ( $limit > 32 ) 
                    ? 32
                    : $limit; 

        $offset = ( $page - 1 ) * $limit;

        $sql =  "SELECT * FROM groom_common.items " . 
                "WHERE `user_id`={$user_id} ";

        if( $sort == 'value' ) {
            $sql .= "ORDER BY `value_estimated` DESC ";
        }

        $sql .= "LIMIT {$offset},{$limit};";

        $items = $this->db->query( $sql )->result_array();

        return $items;
    }

    public function getUsersItemCount( $user_id ) 
    {
        $sql =  "SELECT COUNT(*) as `num` ".
                "FROM groom_common.items " . 
                "WHERE `user_id`='{$user_id}';";

        $result = $this->db->query( $sql )->result_array();

        $count = ( $result > 0 ) 
                    ? $result[0]['num']
                    : 0;

        return $count;
    }

        // $data['user_images'] = $this->images->getImagesByUserId(    
        //                                                     $user_id, 
        //                                                     $page = 1, 
        //                                                     $limit = 20, 
        //                                                     $sort = 'value' 
        //                                                 );

}
?>

