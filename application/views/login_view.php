<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Simple Login with CodeIgniter</title>
    </head>
    <body>
        <div>
<!--             <h1>Simple Login with CodeIgniter</h1> -->
            <?php echo validation_errors(); ?>
            <?php echo form_open('verifylogin'); ?>
            <label for="username">Username:</label>
            <input type="text" size="20" id="username" name="username"/>
            <br/>
            <label for="password">Password:</label>
            <input type="password" size="20" id="password" name="password"/>
            <br/>
            <input type="submit" value="Login"/>
            </form>
        </div>
        <br><br>
        <div>
            <a href="#">Register</a>
<!--             <h1>Simple Login with CodeIgniter</h1> -->
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
    </body>
</html>

