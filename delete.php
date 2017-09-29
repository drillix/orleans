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
     $result = '';


     if($_POST["delete_id"] != '')
     {
         $query = " DELETE FROM students WHERE  id = '" . $_POST["delete_id"] . "'";
         $result =  mysqli_query($connect, $query);
         $message = 'Data Deleted';

     }

     if($result)
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
                           <td><input type="button" data-id ="'.$row["id"].'" data-name = "'.$row["name"].'" value="delete" id=" '.  $row["id"].'" class="btn btn-danger btn-xs delete_data" /></td>

                     </tr>  
                ';
         }
         $output .= '</table>';
     }
     echo $output;
 }
 ?>