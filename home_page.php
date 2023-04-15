<style>
.styled-table {
    border-collapse: collapse;
    margin: auto;
    width:80%;
    height:40%;
    font-size: 0.9em;
    font-family: sans-serif;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
   
    
}
.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}
.styled-table th,
.styled-table td{
    padding: 12px 15px;
    border: 1px solid #d6d4d4;
    text-align: left;

}
h1{
    padding: 12px 15px;
    margin-left:120px;
    text-align: left;
    font-size:.5in;
}
hr{
    margin-bottom:40px;
    width:80%;
}
.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}



</style>
<?php
#6
//select==get from to TABLE
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname ='user_database';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysqli_error($conn));
   }
   
   
  
   $sql = 'SELECT user_id, user_name, user_email,gender ,mail_status FROM user';
   mysqli_select_db($conn,$dbname);
   $result = mysqli_query($conn,$sql );
   
   if(! $result ) {
      die('Could not get data: ' . mysqli_error($conn));
   }


      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        echo '<h1 style ="display:inline-flex;">Users Details</h1>';
        echo '<a href="regestration.php"><input style ="color:#FFFF;margin-left:50%;background-color: darkgreen;height:8%;width:10%;border-radius:10px;"
        type="button" value="Add new user" /></a>';
        echo '<hr>';

        echo '<table class="styled-table" >';
        echo'<thred class="styled-table thead tr">';
          echo '<tr>' 
          .'<th><h3>id</h3></th>'.
          '<th><h3>Name</h3></th>'.
          '<th><h3>Email</h3></th>'.
          '<th><h3>Gender</h3></th>'.
          '<th><h3>MailStatus</h3></th>'.
           '</tr>';
        echo'</thred>';
       
          foreach ($result as $resultArr) {
                echo '<tr>';
                
              foreach($resultArr as $value){
                if($value==0){
                    echo '<td >' . "<h4>no</h4>" . '</td>';
                    
                    
                }elseif($value==1){
                  if($resultArr['user_id']==1){
                    echo '<td >'.'<h4>'.$resultArr['user_id']='1'.'</h4>'. '</td>';
                  }else{
                     echo '<td >'.'<h4>'.$resultArr['mail_status']='yes'.'</h4>'. '</td>';
                    
                  }}
                else{
                
                      echo '<td >' . "<h4>$value </h4>" . '</td>';
                    }
                    
                }
              
              
            
          }
        
         
          echo '</tr>';  
            
      echo '</table>';
      
    } else {
      echo "0 results";
    }
   
   mysqli_close($conn);
?>
