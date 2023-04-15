<?php
session_start();

if (!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("Location: login.php");
}

?>
<html>
<body>

 <?php 
echo"<span style ='font-size: 50px;'>"."Hi,"."<b>".$_SESSION['username']."</b>"." welcome to our website"."</span>"; ?>
<div>
    <img width=100%; height=70%; style="border-radius:10px;" src="indexPage.jpg">
    <a href="logout.php"><input style ="color:#FFFF;background-color:darkred;margin-top:30px;height:8%;width:10%;border-radius:10px;"
        type="button" value="Sign out" />
    </a>  
</div>
</body>
</html>    
