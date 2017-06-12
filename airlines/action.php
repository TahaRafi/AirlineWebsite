<?php
include('db_connect.php');



$name=$_POST['name'];
$email=$_POST['email'];
$message=$_POST['textarea'];


$result = "INSERT INTO contact(name,email,message) VALUES ('$name','$email','$message')";




mysqli_query($connection,$result);
 if( $result )
 {
	
header( 'Location: http://localhost/airlines/contacts.html' );


 }	 
        
      else
        echo "";
	
	
   
//echo '<script type="text/javascript">
  //      window.location = "http://localhost/usmanAirline/contact.php"
    //  </script>';
	  
	 

?>