<?php
session_start();
    if(isset($_POST['register'])){
        
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        
       
        $_SESSION['login']=true;
        header('Location:index.php');
    }
   
    if(isset($_POST['login'])){
       
        echo "Welcome ".$_POST['name'];
        sleep(3);
        header('Location:hello.php');
        
               session_unset();
        session_destroy();
       
    }
     
    if(isset($_POST['logout'])){
       
       logout();
       if (ini_get("session.use_cookies")) {
       $arr = [1,2,3];
        setcookie('name', 'burhan', time() + (86400 * 30), "/"); // 86400 = 1 day
        setcookie('name1', implode($arr), time() + (86400 * 30), "/"); // 86400 = 1 day
        setcookie(session_name(), '', time() - 42000, '/');

         header("Location: hello.php");
    }
       
    }
    function logout(){
        session_unset();
        session_destroy();
        
    }
    
    //header('Location:index.php');
    
    ?>