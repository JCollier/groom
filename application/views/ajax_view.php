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
<? if ($method == 'get_item_upload_block' || $method == 'savetag' || $method == 'taglist' || (1==1)): ?>
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

    <? if ($show_savetag): ?>
        <?php
            if( !empty( $_POST['type'] ) && $_POST['type'] == "insert" || 1==1) {

                $_POST = $_GET;

                $_POST['pic_id']    = 5;
                $_POST['type']      = 'insert';
                $_POST['title']     = 'n/a';

                $id     = $_POST['pic_id'];
                $title  = $_POST['title'];
                $pic_x  = $_POST['pic_x'];
                $pic_y  = $_POST['pic_y'];

                $sql =
                    "INSERT INTO item_tag (pic_id,title,pic_x,pic_y) VALUES ($id, '$title', $pic_x, $pic_y)" .
                    "ON DUPLICATE KEY UPDATE `pic_x`={$pic_x},`pic_y`={$pic_y};";
                echo($sql);

                $qry = mysql_query($sql);
            }
        ?>
    <? elseif ($show_taglist): ?>
        <?php
            $sql    = "SELECT * FROM item_tag WHERE pic_id=5";
            $qry    = mysql_query( $sql );
            $rs     = mysql_fetch_array( $qry );

            //$file = 'http://192.168.220.160/groom/htdocs/' . $rs[13] . $rs[11] . $rs[12];

            $data['boxes'] = '';
            $data['lists'] = '';

            if ($rs){
                do {
                    $data['boxes'] .= '<div class="tagview" style="position:relative; width:200px; height:200px; border:4px solid black; left:' . $rs['pic_x'] . 'px;top:' . $rs['pic_y'] . 'px;" id="view_'.$rs['pic_id'].'">';
                    $data['boxes'] .= '<div class="square"></div>';
                    $data['boxes'] .= '<div class="person" style="left:' . $rs['pic_x'] . 'px;top:' . $rs['pic_y']  . 'px;">' . $rs[ 'title' ] . '</div>';
                    $data['boxes'] .= '</div>';

                    $data['lists'] .= '<li id="'.$rs['pic_id'].'"><a>' . $rs['title'] . '</a> (<a class="remove">Remove</a>)</li>';

                } while($rs = mysql_fetch_array($qry));
            }

            echo json_encode($data);
        ?>
    <? elseif ($show_login_form || (1==1)): ?>
        <script src="http://192.168.220.160/groom/htdocs/assets/js/jquery.min.js"></script>
        <script type="text/javascript">
            function viewtag( pic_id ) {
                  // get the tag list with action remove and tag boxes and place it on the image.
                  // $.post( "get_item_upload_block" ,  "?taglist&pic_id=" + pic_id, function( data ) {
                  //   $('#taglist ol').html(data.lists);
                  //    $('#tagbox').html(data.boxes);
                  // }, "json");

                $.ajax({
                    type: "POST",
                    url: "http://192.168.220.160/groom/ajax/get_item_upload_block?p=4&n=5&s=id&m=taglist&pic_id=100",
                    // data: "pic_id=" + id + "&name=" + name + "&pic_x=" + mouseX + "&pic_y=" + mouseY + "&type=insert",
                    cache: false,
                    success: function(data){
                        data = JSON.parse(data);


                        $('#taglist ol').html(data.lists);
                        $('#tagbox').html(data.boxes);

                        console.log(data.lists);

                        console.log(document.getElementById( "taglist" ));

                        alert('done!');

                        return data;
                    }
                });
            }

            $(document).ready(function(){
                var counter = 0;
                var mouseX = 0;
                var mouseY = 0;
                var imgid = 0;
                var str = '';

                $("#imgtag img").click(function(e) { // make sure the image is click
                    var imgtag = $(this).parent(); // get the div to append the tagging list

                    //imgid = $(this).attr( "id" ); if you need to fetch tags by specific images

                    mouseX = ( e.pageX - $(imgtag).offset().left ) - 50; // x and y axis
                    mouseY = ( e.pageY - $(imgtag).offset().top ) - 50;

                    var height = $("#imgtag").height();
                    var width = $("#imgtag").width();

                    console.log(width);
                    console.log(height);

                    $( '#tagit' ).remove( ); // remove any tagit div first
                    $( imgtag ).append( '<div id="tagit"><div class="box"></div><div class="name"><div class="text">Type any name or tag</div><input type="text" name="txtname" class="search" id="tagname" /><div id="result"></div><input type="button" name="btnsave" value="Save" id="btnsave" /><input type="button" name="btncancel" value="Cancel" id="btncancel" /></div></div>' );
                    $( '#tagit' ).css({ top:mouseY, left:mouseX });

                    $('#tagname').focus();
                });

                $(document).ready(function(){
                    viewtag( 5 );
                });

                $( document ).on( 'click',  '#tagit #btnsave', function(){
                    name = $('#tagname').val();

                    console.log(name);

                    var img = $('#imgtag').find( 'img' );
                    var id = $( img ).attr( 'id' );

                    console.log(mouseX);
                    console.log(mouseY);

                    alert('savetag!');

                    var url = "http://192.168.220.160/groom/ajax/get_item_upload_block?p=4&n=5&s=id&m=savetag&type=insert";
                        url += '&title=' + 'title'
                        url += '&pic_x=' + mouseX;
                        url += '&pic_y=' + mouseY;

                    $.ajax({
                        type: "POST",
                        url: url,
                        // data: "pic_id=" + id + "&name=" + name + "&pic_x=" + mouseX + "&pic_y=" + mouseY + "&type=insert",
                        cache: true,
                        success: function(data){
                            viewtag( id );
                            $('#tagit').fadeOut();
                        }
                    });
                });

                // mouseover the tagboxes that is already there but opacity is 0.
                $( '#tagbox' ).on( 'mouseover', '.tagview', function( ) {
                    var pos = $( this ).position();
                    $(this).css({ opacity: 1.0 }); // div appears when opacity is set to 1.
                }).on( 'mouseout', '.tagview', function( ) {
                    $(this).css({ opacity: 0.4 }); // hide the div by setting opacity to 0.
                });
            });
        </script>
        <div id="container" style="position:absolute;">
            <div id="imgtag" style="border: 2px solid black;">
            <?php
                $sql    = "SELECT * FROM items WHERE id=9";
                $qry    = mysql_query( $sql );
                $rs     = mysql_fetch_array( $qry );

                $file = 'http://192.168.220.160/groom/htdocs/' . $rs[13] . $rs[11] . $rs[12];
            ?>
            <img id="<?php echo $rs['id']; ?>" src="<?php echo $file;?>" style="max-width:1000px; width:100%; height:auto;"/>
            <div id="tagbox" style="position:absolute; top:0px; left:0px;"></div>
            </div>
            <div id="taglist">
                <ol></ol>
            </div>
        </div>
    <? endif ?>
<? endif; ?>