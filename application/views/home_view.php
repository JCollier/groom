<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <script type="text/javascript">
        // document.getElementsByTagName("head")[0].appendChild(script);
        console.log( 'testJS!' ); 
    </script>

 <head>
   <title>Home</title>
<!--    <?php
        foreach( $assets as $asset ) {
            var_export( $asset );

            //echo( '<link rel="stylesheet" type="text/css" href="' . $asset . '">' );
        }
    ?> -->
   <!-- <link rel="stylesheet" type="text/css" href="mystyle.css"> -->
 </head>
 <body>

    <br>
    Header Links:

    <?php 
        foreach( $links_header as $link ) {
            echo( '<a href="' . $link['url'] . '">' . $link['label'] . '</a> ' );
        }
    ?>
    <br>

    <h2>Userid: <?php echo $userid; ?></h2>
    <h2>Username: <?php echo $username; ?></h2>

    <br>

    Footer Links:

    <?php 
        foreach( $links_footer as $link ) {
            echo( '<a href="' . $link['url'] . '">' . $link['label'] . '</a> ' );
        }
    ?>

</body>
</html>

