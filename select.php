<?php

/**
 * Created by PhpStorm.
 * User: drillix
 * Date: 9/22/2017
 * Time: 11:58 AM
 */


 if(isset($_POST["student_id"]))
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "mimi");
      $query = "SELECT * FROM students WHERE id = '".$_POST["student_id"]."'";
      $result = mysqli_query($connect, $query);
      $output .= '  
      <div class="table-responsive">  
           <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example1">
                             <thead> ';
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><label>Name</label></td>  
                     <td width="70%">'.$row["name"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>phone</label></td>  
                     <td width="70%">'.$row["phone"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Gender</label></td>  
                     <td width="70%">'.$row["gender"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>course</label></td>  
                     <td width="70%">'.$row["course"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Age</label></td>  
                     <td width="70%">'.$row["age"].' Years</td>  
                </tr>  
           ';  
      }  
      $output .= ' 
  </thead>
           </table>  
      </div>  
      ';  
      echo $output;  
 }  
 ?>