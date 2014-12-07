<? if ($method == 'get_users'): ?>
<div>
    Users:
    <table>
        <tr>
        <?php
            $columns = array( 'id', 'username', 'email', 'confirmed', 'usertype' );
        ?>
        <?php
            foreach( $columns as $column ) {
                $row = "<td width='160px'>" . $column . "</td>";
                echo( $row );
            }
        ?>
        </tr>

        <?php
            foreach( $users as $user ) {
                //$row = "<tr><td>" . $user['username'] . "</td></tr>";

                $row = "<tr>";

                foreach( $columns as $column ) {
                    $row .= "<td width='160px'>" . $user[$column] . "</td>";
                }

                $row .= "</tr>";

                echo( $row );
            }
        ?>
    </table>
</div>
<? endif; ?>

<!-- get_item_upload_block -->
<? if ($method == 'get_item_upload_block'): ?>
    <? if ($show_item_upload_block): ?>
        <div style="height:80%; width:80%; background-color:#d3d3d3;">get_item_upload_block</div>
    <? endif ?>
    <div>
        Users:
        <table>
            <tr>
            <?php
                $columns = array( 'id', 'username', 'email', 'confirmed', 'usertype' );
            ?>
            <?php
                foreach( $columns as $column ) {
                    $row = "<td width='160px'>" . $column . "</td>";
                    echo( $row );
                }
            ?>
            </tr>

            <?php
                foreach( $users as $user ) {
                    //$row = "<tr><td>" . $user['username'] . "</td></tr>";

                    $row = "<tr>";

                    foreach( $columns as $column ) {
                        $row .= "<td width='160px'>" . $user[$column] . "</td>";
                    }

                    $row .= "</tr>";

                    echo( $row );
                }
            ?>
        </table>
    </div>
<? endif; ?>