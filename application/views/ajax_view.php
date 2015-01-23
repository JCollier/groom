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

        <div style="height:89%; width:100%; margin:0 0 0 0;">
            <div style="width:42%; height:100%; margin:0 2% 0% 6%; float:left;">
                <div id="login-block" style="width:77%; height:54%; float:right;">
                    <?php echo validation_errors(); ?>
                    <?php echo form_open('verifylogin'); ?>
                        <div style="width:100%;">
                            <div style="width:100%; clear:left; padding:4% 0 4% 0;">
                                <div style="width:28%; float: left;">
                                    <label for="username" style="margin:2% 0 0 2%;">Username:</label>
                                </div>
                                <div style="width:72%; float:right;">
                                    <input type="username" size="20" id="username" name="username" style="float:right; width:100%;"/>
                                </div>
                            </div>

                            <div style="width:100%; clear:left; padding:4% 0 4% 0;">
                                <div style="width:28%; float: left;">
                                    <label for="password" style="margin:2% 0 0 2%;">Password:</label>
                                </div>
                                <div style="width:72%; float:right;">
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
                                        <div style="padding:0 0 0 2px; width:92%; text-align:right; float:right; min-height:300px;">
                                            <input class="btn btn-block" type="submit" value="Login" style="width:23%; height:100%; float:right;"/>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div style="width:77%; float:right;">
                    <div id="register-block" style="display:none;  height:43%; ">
                        <?php echo validation_errors(); ?>
                        <?php echo form_open('registeruserbasic'); ?>
                            <div style="width:100%; clear:left; padding:4% 0 4% 0;">
                                <div style="width:100%; clear:left;">
                                    <div style="width:28%; float: left;">
                                        <label for="username" style="margin:2% 0 0 2%;">Username:</label>
                                    </div>
                                    <div style="width:72%; float:right;">
                                        <input type="username" size="20" id="username" name="username" style="float:right; width:100%;"/>
                                    </div>
                                </div>

                                <div style="width:100%; clear:left; padding:4% 0 4% 0;">
                                    <div style="width:28%; float: left;">
                                        <label for="password" style="margin:2% 0 0 2%;">Password:</label>
                                    </div>
                                    <div style="width:72%; float:right;">
                                        <input type="password" size="20" id="password" name="password" style="float:right; width:100%;"/>
                                    </div>
                                </div>

                                <div style="width:100%; clear:left; padding:4% 0 4% 0;">
                                    <div style="width:28%; float: left;">
                                        <label for="username" style="margin:2% 0 0 2%;">Email:</label>
                                    </div>
                                    <div style="width:72%; float:right;">
                                        <input type="email" size="20" id="email" name="email" style="float:right; width:100%;"/>
                                    </div>
                                </div>
                            </div>

                            <div style="width:100%; clear:left; padding:4% 0 4% 0;">
                                <div style="width:100%; max-height:34px; float:left;">
                                    <div style="height:100%; min-height:20px; width:40%; float:left;"></div>
                                    <div style="width:60%; float:right; padding:1% 0 0 0;">
                                        <div style="padding:0 0 0 2px; width:8%; float:left">
                                        </div>
                                        <div style="padding:0 0 0 2px; width:92%; text-align:right; float:right;">
                                                <input type="submit" value="Login" style="float:right;"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div style="width:77%; height:39%; float:right; clear:left;">
                    <div style="width:100%; float:left; text-align:right;">
                        Forgot Password?
                        <a href="javascript:void(0);">Click here to reset password</a>
                    </div>
                    <div style="width:100%; float:left; text-align:right;">
                        New User?
                        <a href="javascript:void(0);" onclick="showRegister();">Click here to Register</a>
                    </div>
                </div>
            </div>

            <div style="width:46%; height:100%; margin:0 2% 0% 2%; float:left;">
                <div style="width:100%; clear:left; padding:4% 0 4% 0;">kdkdk</div>
            </div>
        </div>

    <? elseif ($show_item_about_us): ?>
        <div style="height:89%; width:80%; background-color:rgba(211,211,211,0.7); margin:0 0 0 10%;">
            <div style="width:96%; height:89%; padding:2% 0 0 2%;">
                Gfits aims to provide ipsum dolor sit amet, consectetur adipiscing elit.
                Mauris finibus, massa non commodo commodo, enim risus tincidunt ligula, at
                blandit orci risus vel quam. Mauris et arcu eu magna viverra scelerisque
                eget non turpis. Donec sit amet nibh dui. Interdum et malesuada fames ac
                ante ipsum primis in faucibus. Sed quis enim ut orci ultrices consequat
                vel in nisi. Duis id fermentum elit, a vulputate leo. Donec vulputate
                malesuada mauris a pharetra. Fusce at sem mattis, aliquet tortor sed,
                iaculis tellus.

                Sed varius, mauris sit amet pretium viverra, sem sapien tincidunt lectus,
                at bibendum urna ligula a nisi. Sed massa arcu, lobortis cursus mi at,
                dapibus semper libero. Cras sodales tempor justo, vel tempus felis
                efficitur eget. Nulla scelerisque facilisis fermentum. Cras scelerisque
                metus a enim fringilla consequat. Etiam tempor condimentum nulla, nec
                tincidunt sem posuere in. Donec at varius nisl, sed euismod ipsum.
                Aliquam id turpis at justo hendrerit rutrum a vitae justo. Vivamus
                fermentum libero et lorem tristique, a rutrum mauris laoreet. Nunc
                placerat enim vehicula, pharetra arcu ut, mollis ligula. Curabitur
                pulvinar a sapien nec pulvinar. Pellentesque viverra aliquet metus
                sodales luctus. Curabitur justo libero, tincidunt id porta suscipit,
                tempor dapibus elit. Fusce vulputate sit amet quam eleifend mattis.
                Aenean sapien turpis, condimentum dictum mauris non, volutpat imperdiet
                turpis. Ut at libero quis tellus laoreet lacinia eget in enim.
            </div>
        </div>
    <? elseif ($show_item_upload_block): ?>
        <div style="height:80%; width:80%; background-color:rgba(211,211,211,0.7);">get_item_upload_block</div>
    <? endif ?>

    <? if ($show_login_form || (1==1)): ?>
        <div style="height:400%; width:100%; margin:0 0 0 0; border:1px solid black;">
            kdkdkdkd

            <div id="container">
                <div id="imgtag">
                <?php
                    $sql    = "SELECT * FROM items WHERE id=9";
                    $qry    = mysql_query( $sql );
                    $rs     = mysql_fetch_array( $qry );

                    $file = 'htdocs/' . $rs[13] . $rs[11] . $rs[12];
                ?>
                <a href="javascript:void(0);" onclick="showTagger();" id="imgtag_2">jdjdjd</a>
                <img id="<?php echo $rs['id']; ?>" src="<?php echo $file;?>" style="max-width:1000px; width:100%; height:auto;"/>
                <div id="tagbox"></div>
                </div>
                <div id="taglist">
                    <ol></ol>
                </div>
            </div>
        </div>

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
                if (!empty($users)) {
                    foreach($users as $user) {
                        //$row = "<tr><td>" . $user['username'] . "</td></tr>";

                        $row = "<tr>";

                        foreach( $columns as $column ) {
                            $row .= "<td width='160px'>" . $user[$column] . "</td>";
                        }

                        $row .= "</tr>";

                        echo( $row );
                    }
                }
            ?>
        </table>
    </div>
<? endif; ?>