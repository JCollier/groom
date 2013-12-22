<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <script type="text/javascript">
        // document.getElementsByTagName("head")[0].appendChild(script);
        console.log( 'testJS!' );
    </script>

 <head>
   <title>Simple Login with CodeIgniter - Private Area</title>
   <?php
        foreach( $assets as $asset ) {
            var_export( $asset );

            //echo( '<link rel="stylesheet" type="text/css" href="' . $asset . '">' );
        }
   ?>
   <!-- <link rel="stylesheet" type="text/css" href="mystyle.css"> -->
 </head>
 <body>
   <h1>Home</h1>
   <h2>Welcome <?php echo $username; ?>!</h2>
   <a href="home/logout">Logout</a>
 </body>
</html>

