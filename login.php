<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">

<html>
<link rel="stylesheet" href="style/style.php" media="screen">
<center><h1><head>Login</head></h1></center>
        
            <form name="login" action="do_login.php" onsubmit="return validateForm()" method="post">
             <table width="274" border="0" align="center" cellpadding="2" cellspacing="0">
                <tr>
                   <td><div align="right">Username: </div></td>
                   <td><input type="text" name="username" maxlength ="12" required/></td>
               </tr>
               <tr>
                   <td><div align="right">Password: </div></td>
                   <td><input type="password" name="password" maxlength ="9" required/></td>
               </tr>
               <tr>
                    <td><div align="right"></div></td>
                    <td><input name="submit" type="submit" value="Log In" /></td>
               </tr>
               

        </table>
            </form>