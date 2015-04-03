<!DOCTYPE html>

<html>
    <head>
         <meta charset="UTF-8">
         <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=yes">
         <meta http-equiv="Pragma" content="no-cache">
         <meta http-equiv="Expires" content="-1">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         
        <title>Sign in to SAFE</title>
        
        <!--jquery library-->
        <link rel="stylesheet" href="../assets/javascripts/jquery-2.1.3.js" type="text/javascript">
        
        <!--css-->
        <link rel="stylesheet" href="../assets/stylesheets/dashboard.css" type="text/css">
        
        <!--font awesome-->
        <link rel="stylesheet" href="../assets/stylesheets/font-awesome.min.css" type="text/css">
        <!--<link rel="stylesheet" href="../assets/stylesheets/font-awesome.css" type="text/css">-->
        
    </head>
    
    <body>
        <div id="background">  
            <div id="image">
                <img src="../assets/img/illustration.jpg">
            </div>
           
            <div id="loginpanel" style="background-color: #F9F9F9">
                <div id="safe" style="margin-left: 55px; margin-top: 90px">
                   <h3>SAFE</h3>
                 </div>
                
                <div id="label" style="margin-top: 130px; margin-left: 60px; margin-bottom: 40px">
                     <p>Sign in with details provided by admin</p>
                </div>
                
                <form action="index.php" method="POST" enctype="application/x-www-form-urlencoded">
                    <input type="text" placeholder="username" required="" id="forminput" name="username" value="" autocomplete="off">
                    <input type="password" placeholder="password" required="" id="forminput" name="password">
                    <input type="submit" value="Login" id="loginbutton">
                </form>
                
                <div id="loginstatus" style="text-align: center; margin-top: 260px">
                  
                </div>
                
            </div>
        </div>
        
     
        
        <?php
            if ( isset ( $_POST ['username'] ) & isset ( $_POST ['password'] ) )
            {
                include '../models/login_model.php';
                $login = new Login ( );
                $username = $_POST ['username'];
                $password = $_POST ['password'];
                $row = $login->user_login ( $username, $password );
                if ( !$row )
                {
                    echo "Failed to log in"; 
                }
                else
                {
                     session_start ( );
                     $user_type = $row['user_type'];
                    if ( $user_type == 'admin' )
                    {
                        $_SESSION ['user_type'] = $user_type;
                        echo "loggin as admin";
                        echo $_SESSION ['user_id'] = $row['user_id'];
                        header("Location: home.php");
                        exit ( );
                    }
                    else if ( $user_type == 'regular')
                    {
                        $_SESSION ['user_type'] = $user_type;
                        echo "loggin as regular";
                        echo $_SESSION ['user_id'] = $row['user_id'];
                        header("Location: regular.php");
                        exit ( );
                    }
                   
                }
            }
        ?>
    </body>
    
</html>