   <?php
   /**
    * Created by PhpStorm.
    * User: drillix
    * Date: 9/22/2017
    * Time: 11:58 AM
    */



 $connect = mysqli_connect("localhost", "root", "", "mimi");
 if(isset($_POST["student_id"]))
 {  
      $query = "SELECT * FROM students WHERE id = '".$_POST["student_id"]."'";
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
