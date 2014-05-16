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