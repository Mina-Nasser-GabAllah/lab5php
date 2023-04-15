<?php session_start();

?>
<html>

<body>

    <table style="margin:auto;">
        <form action="<?php $_PHP_SELF ?>" method="POST">
            <h1 style="margin-left:28%;display:inline-flex;"> User Login</h1>
            <a href="regestration.php"><input style ="color:#FFFF;margin-left:25%;background-color:darkgreen;height:8%;width:10%;border-radius:10px;"
        type="button" value="Sign Up" /></a>
            <hr style = "width:45%;">
            <p style="margin-left:28%;font-size:20px;">Please enter user name and password to login.</p>
            <tr>
                <td><label><b>User Name</b></label></td>
            </tr>
            <tr>
                <td ><input style="height:30px;border-radius: 6px;" type="text" name="name" size="80px" Required ></td>
            </tr>
            <tr>
                <td><b>Password</b></td>
                
            </tr>
            <tr>
                <td><input style="height:30px;border-radius: 6px;" type="password" name="password_id" size ="80px" required>
                    </td>
            </tr>
            <tr>
                <td><input style ="color:#FFFF;background-color: #038eb4;width:15%;border-radius:10px;" type="submit" name="submit" >
                <input style ="color:#FFFF;background-color: red;width:15%;border-radius:10px;" type="button" name="exit" value="Cancel" ></td>
                
            </tr>
            
        </form>

    </table>
</body>

</html>

<?php
         $conn = mysqli_connect('localhost', 'root', '','user_database') ;
         if(! $conn ) {
             die('Could not connect: ' . mysqli_error($conn));
         }     
        if(isset($_POST["submit"])){
            if( isset($_POST["name"]) &&  isset($_POST["password_id"])){   
                $userName = $_POST['name'];
                $userPassword=$_POST['password_id'];
                $query = "SELECT  * FROM user where user_name='$userName' AND password_id='$userPassword'" ;
                $result = mysqli_query( $conn,$query );
                $count = mysqli_num_rows($result);
                if ($count > 0){
                    $_SESSION['username'] = $userName;
                    header("Location: login_sucsses.php");
                  
                }else{
                    
                    header("Location: login.php?msg=Login_Failed");
                    
                }
                mysqli_close($conn);
               
            }
        }   
        
?>