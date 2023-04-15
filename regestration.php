
<html>

<body>

    <table style="margin:auto;">
        <form action="<?php $_PHP_SELF ?>" method="POST">
            <h1 style="margin-left:28%;display:inline-flex;"> User Registrtion Form</h1>
            <a href="home_page.php"><input style ="color:#FFFF;margin-left:10%;background-color:darkgreen;height:8%;width:10%;border-radius:10px;"
        type="button" value="Database" /></a>
        <a href="login.php"><input style ="color:#FFFF;background-color:darkgreen;height:8%;width:10%;border-radius:10px;"
        type="button" value="sign in" /></a>
            <hr style = "width:45%;">
            <p style="margin-left:28%;font-size:20px;">Please fill this form and submit to add user record to the database.</p>
            <tr>
                <td><label><b>Name</b></label></td>
            </tr>
            <tr>
                <td ><input style="height:30px;border-radius: 6px;" type="text" name="name" size="80px" Required ></td>
            </tr>
            <tr>
                <td><b>E-mail</b></td>
                
            </tr>
            <tr>
                <td><input style="height:30px;border-radius: 6px;" type="email" name="email" size ="80px" required>
                    </td>
            </tr>
            <tr>
                <td><b>Password</b></td>
                
            </tr>
            <tr>
                <td><input style="height:30px;border-radius: 6px;" type="password" name="password_id" size ="80px" required>
                    </td>
            </tr>
            <tr>
                <td><b>Gender</b></td>
                
            </tr>
            <tr>
            <td> <input type="radio" name="gender" value="Male" /><b>Male</b> <br>
                    <input type="radio" name="gender" value="Female" /><b>  Female</b>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" name="check"  value="1"><b>Resceive E-mails from us.</b></td>
                
              
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
     
        if(isset($_POST["submit"])){
           
            if( isset($_POST["name"]) &&  isset($_POST["email"])  && isset($_POST["password_id"])&& isset($_POST["gender"]) && (isset($_POST["check"]))){
                //insert data to TABLE
                $dbhost = 'localhost';
                $dbuser = 'root';
                $dbpass = '';
                $dbname ='user_database';
                $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
                
                if(! $conn ) {
                    die('Could not connect: ' . mysqli_error($conn));
                }
                
                
                //select
                mysqli_select_db( $conn,$dbname );
                //create table
                $sql = "INSERT INTO user(user_name,user_email,gender,mail_status,password_id) 
                VALUES ( '{$_POST["name"]}', '{$_POST["email"]}', '{$_POST["gender"]}','{$_POST["check"]}','{$_POST["password_id"]}')";
                //  $_POST["name"] = $_POST["email"] = $_POST["gender"] = $_POST["mailstatus"] = "";

                $retval = mysqli_query( $conn,$sql );
                
                if(! $retval ) {
                    die('Could not insert to table: ' . mysqli_error($conn));
                }
                mysqli_close($conn);

                header("location:regestration.php");
                exit;
            }else if( isset($_POST["name"]) &&  isset($_POST["email"])&&  isset($_POST["password_id"]) && isset($_POST["gender"]) && (empty($_POST["check"]))){
                //insert data to TABLE
                $dbhost = 'localhost';
                $dbuser = 'root';
                $dbpass = '';
                $dbname ='user_database';
                $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
                
                if(! $conn ) {
                    die('Could not connect: ' . mysqli_error($conn));
                }
                
                
                //select
                mysqli_select_db( $conn,$dbname );
                //create table
                $sql = "INSERT INTO user(user_name,user_email,gender,mail_status,password_id) 
                VALUES ( '{$_POST["name"]}', '{$_POST["email"]}', '{$_POST["gender"]}','{$_POST["check"]}','{$_POST["password_id"]}')";
                //  $_POST["name"] = $_POST["email"] = $_POST["gender"] = $_POST["mailstatus"] = "";

                $retval = mysqli_query( $conn,$sql );
                
                if(! $retval ) {
                    die('Could not insert to table: ' . mysqli_error($conn));
                }
                mysqli_close($conn);
                header("location:regestration.php");
                exit;
            }
        }   
?>
