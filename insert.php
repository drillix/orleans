  <?php

  /**
   * Created by PhpStorm.
   * User: drillix
   * Date: 9/22/2017
   * Time: 11:58 AM
   */




  $connect = mysqli_connect("localhost", "root", "", "mimi");
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $name = mysqli_real_escape_string($connect, $_POST["name"]);  
      $phone = mysqli_real_escape_string($connect, $_POST["phone"]);
      $gender = mysqli_real_escape_string($connect, $_POST["gender"]);  
      $course = mysqli_real_escape_string($connect, $_POST["course"]);
      $age = mysqli_real_escape_string($connect, $_POST["age"]);  
      if($_POST["student_id"] != '')
      {  
           $query = "  
           UPDATE students   
           SET name='$name',   
           phone='$phone',   
           gender='$gender',   
           course = '$course',   
           age = '$age'   
           WHERE id='".$_POST["student_id"]."'";
           $message = 'Data Updated';  
      }  
      else  
      {  
           $query = "  
           INSERT INTO students(name, phone, gender, course, age)  
           VALUES('$name', '$phone', '$gender', '$course', '$age');  
           ";  
           $message = 'Data Inserted';  
      }  
      if(mysqli_query($connect, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM students ORDER BY id DESC";
           $result = mysqli_query($connect, $select_query);  
           $output .= '  
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example1">
                             <thead> 
                     <tr>  
                          <th > Name</th>  
                           <th >phone</th>
                           <th>Gender</th>
                              <th >Course</th>
                           <th>Age</th>
                          <th >Edit</th>  
                          <th >View</th> 
                           <th >Delete</th> 
                     </tr>  
                     </thead>
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>' . $row["name"] . '</td> 
                           <td>' . $row["phone"] . '</td> 
                           <td>' . $row["gender"] . '</td> 
                           <td>' . $row["course"] . '</td>
                           <td>' . $row["age"] . '</td> 
                           <td><input type="button" name="edit" value="Edit" id="'.$row["id"] .'" class="btn btn-primary btn-xs edit_data" /></td>  
                          <td><input type="button" name="view" value="view" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data" /></td>  
                           <td><input type="button" name="delete" data-id ="'.$row["id"].'" data-name = "'.$row["name"].'" value="delete" id=" '.  $row["id"].'" class="btn btn-danger btn-xs delete_data" /></td>

                     </tr>  
                ';  
           }  
           $output .= '</table>';  
      }  
      echo $output;  
 }  
 ?>