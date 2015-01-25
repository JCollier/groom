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
    <? if ($show_login_form): ?>
        <div style="height:89%; width:80%; background-color:#d3d3d3; margin:0 0 0 10%;">
            <div style="width:30%; height:89%;">
                Login
                <?php echo validation_errors(); ?>
                <?php echo form_open('verifylogin'); ?>
                    <div style="width:100%;">
                        <div style="width:100%; clear:left;">
                            <div style="width:34%; float: left;">
                                <label for="username" style="margin:2% 0 0 2%;">Username:</label>
                            </div>
                            <div style="width:66%; float:right;">
                                <input type="username" size="20" id="username" name="username" style="float:right; width:100%;"/>
                            </div>
                        </div>

                        <div style="width:100%; clear:left; padding:4% 0 4% 0;">
                            <div style="width:34%; float: left;">
                                <label for="password" style="margin:2% 0 0 2%;">Password:</label>
                            </div>
                            <div style="width:66%; float:right;">
                                <input type="password" size="20" id="password" name="password" style="float:right; width:100%;"/>
                            </div>
                        </div>

                        <div style="width:100%; clear:left; padding:4% 0 4% 0;">
                            <div style="width:100%; max-height:34px; float:left;">
                                <div style="height:100%; min-height:20px; width:40%; float:left;"></div>
                                <div style="width:60%; float:right; padding:1% 0 0 0;">
                                    <div style="padding:0 0 0 2px; width:8%; float:left">
                                        <input type="checkbox" value="forever" id="rememberme" name="checkbox" style="float:right;"/>
                                    </div>
                                    <div style="padding:0 0 0 2px; width:92%; text-align:right; float:right;">
                                        Remember me <input type="submit" value="Login" style="float:right;"/>
                                    </div>
                                </div>
                            </div>
                            <div style="width:100%; float:left; text-align:right;">
                                Forgot Password?
                                <a href="">Click here to reset password</a>
                            </div>
                            <div style="width:100%; float:left; display:none;">New User?</div>
                        </div>
                    </div>
                </form>
            </div>
            <br><br>
            <div>
                <div id="register-block" style="display:none;">
                    <?php echo validation_errors(); ?>
                    <?php echo form_open('registeruserbasic'); ?>
                    <label for="username">Username:</label>
                    <input type="text" size="20" id="username" name="username"/>
                    <br/>
                    <label for="password">Password:</label>
                    <input type="password" size="20" id="password" name="password"/>
                    <br/>
                    <label for="email">Email:</label>
                    <input type="email" size="20" id="email" name="email"/>
                    <br/>
                    <input type="submit" value="Login"/>
                    </form>
                </div>
            </div>
        </div>
    <? elseif ($show_item_upload_block): ?>
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