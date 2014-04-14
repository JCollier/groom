<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Home</title>
    <script src="<?php echo( $js_path['global'] ); ?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo( $css_path['global'] ); ?>">
<!--    <?php
        foreach( $assets as $asset ) {
            var_export( $asset );

            //echo( '<link rel="stylesheet" type="text/css" href="' . $asset . '">' );
        }
    ?> -->
   <!-- <link rel="stylesheet" type="text/css" href="mystyle.css"> -->
 </head>
 <body>
    <div class="bg-color-red height-header width-full pos-float-left">
        <div id="header_links" class="pos-float-right">
            Header Links:
            <?php 
                foreach( $links_header as $link ) {
                    echo( '<a href="' . $link['url'] . '">' . $link['label'] . '</a> ' );
                }
            ?>
        </div>
    </div>

    <div id="container-home" class="height-container-home bg-color-gray width-full pos-float-left">
        <h2>Userid: <?php echo $userid; ?></h2>
        <h2>Username: <?php echo $username; ?></h2>
    </div>


    <div class="height-footer width-full pos-float-left bg-color-blue-s">
        <div id="header_links" class="pos-float-right">
            Footer Links:

            <?php 
                foreach( $links_footer as $link ) {
                    echo( '<a href="' . $link['url'] . '">' . $link['label'] . '</a> ' );
                }
            ?>
        </div>
    </div>
</body>
</html>

