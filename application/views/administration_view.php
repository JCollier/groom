<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <script>
        function getUsers( p, n, s ) {
            console.log( 'loaded!' );

            if( p == "" ) {
                document.getElementById( "txtHint" ).innerHTML = "";
                return;
            }

            if( window.XMLHttpRequest ) { // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } 
            else { // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function() {
                if( xmlhttp.readyState == 4 && xmlhttp.status == 200 ) {
                    document.getElementById( "users-block" ).innerHTML = xmlhttp.responseText;
                }
            }

    //'<?php echo base_url(); ?>index.php/match/list_dropdown
            var url = "";
        
            xmlhttp.open( "GET","../groom/ajax/get_users?p=" + p + 
                                                       "&n=" + n + 
                                                       "&s=" + s, true ) ;
            xmlhttp.send();
        }

        window.onload = getUsers( 1, 5, 'id' );
    </script>

    <script type="text/javascript">
        // document.getElementsByTagName("head")[0].appendChild(script);
        console.log( 'testJS!' ); 
    </script>
    <title>Administration</title>
    <script src="<?php echo( $js_path['global'] ); ?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo( $css_path['global'] ); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo( $css_path['bootstrap'] ); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo( $css_path['bootstrap_theme'] ); ?>">
<!--    <?php
        foreach( $assets as $asset ) {
            var_export( $asset );

            //echo( '<link rel="stylesheet" type="text/css" href="' . $asset . '">' );
        }
    ?> -->
   <!-- <link rel="stylesheet" type="text/css" href="mystyle.css"> -->
 </head>
 <body>
    Header Links:

    <?php 
        foreach( $links_header as $link ) {
            echo( '<a href="' . $link['url'] . '">' . $link['label'] . '</a> ' );
        }
    ?>
    <br>

    userid: <?php echo $userid; ?><br>
    Username: <?php echo $username; ?><br>

    <?php echo( '<img src="' . $base_url . 'htdocs/assets/images/90.jpeg' . '">'); ?>


    <br>

<!--     array (size=8)
      'id' => string '9' (length=1)
      'username' => string 'test8' (length=5)
      'password' => string '5e40d09fa0529781afd1254a42913847' (length=32)
      'email' => string 'test8@test.com' (length=14)
      'confirmed' => string 'not_confirmed' (length=13)
      'usertype' => string 'userbasic' (length=9)
      'zip_code' => null
      'phone_num' => null -->



    <div id="users-block"><div><b>Users info will be listed here.</b></div></div>

    <div id="admin-nav-users-pagination">
        <a onclick="getUsers( 1, 5, 'id' );"><u>1</u></a>
        <a onclick="getUsers( 2, 5, 'id' );"><u>2</u></a>
        <a onclick="getUsers( 3, 5, 'id' );"><u>3</u></a>
        <a onclick="getUsers( 4, 5, 'id' );"><u>4</u></a>
    </div>
    
    <div id="var-getusers-limit" style="display:none">5</div>
    <div id="var-getusers-order" style="display:none">id</div>

    <div>
        some-footer
    </div>

 </body>
</html>


