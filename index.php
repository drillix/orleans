<?php
session_start();
$db = mysqli_connect("localhost","root","","mimi");


if ( !isset($_SESSION['user_id']) ) {

    header('location:login.php');

}?>

<?php
 $connect = mysqli_connect("localhost", "root", "", "mimi");
 $query = "SELECT * FROM students ORDER BY id DESC";
 $result = mysqli_query($connect, $query);  
 ?>

 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Students</title>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
          <link href="assets/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

          <!-- DataTables Responsive CSS -->
          <link href="assets/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
      </head>  
      <body>  
           <br /><br />
           <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
               <div class="navbar-header">

                   <a class="navbar-brand" href="index.php">Students manager</a>

               </div>

               <a class="btn btn-default btn-sm pull-right" href="logout.php" style="margin-top: 12px;margin-right: 10px;">logout</a>
           </nav>
           <br>
           <br>
           <div class="container" style="width: 75%;">

                <div class="table-responsive">  
                     <div align="right">  
                          <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning"> Add Student</button>
                     </div>  
                     <br />  
                     <div id="student_table">
                          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                             <thead>
                             <tr>
                                 <th >Name</th>

                                 <th >Phone</th>
                                 <th >Gender</th>
                                 <th >Course</th>
                                 <th >Age</th>
                                 <th >Edit</th>
                                 <th >View</th>
                                 <th >Delete</th>
                             </tr>
                             </thead>

                               <?php  
                               while($row = mysqli_fetch_array($result))  
                               {  
                               ?>  
                               <tr>  
                                    <td><?php echo $row["name"]; ?></td>

                                   <td><?php echo $row["phone"]; ?></td>
                                   <td><?php echo $row["gender"]; ?></td>
                                   <td><?php echo $row["course"]; ?></td>
                                   <td><?php echo $row["age"]; ?></td>
                                   <td><input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-primary btn-xs edit_data" /></td>
                                    <td><input type="button" name="view" value="view" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_data" /></td>
                                   <td><input type="button" name="delete" value="delete" data-id = '<?php echo $row["id"];?>' data-name = '<?php echo $row["name"];?>' id="<?php echo $row["id"]; ?>" class="btn btn-danger btn-xs delete_data" /></td>

                               </tr>
                               <?php  
                               }  
                               ?>  
                          </table>  
                     </div>  
                </div>  
           </div>  
      </body>  
 </html>  
 <div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Student View</h4>
                </div>  
                <div class="modal-body" id="student_detail">
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Add Student</h4>
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">  
                          <label>Enter Student Name</label>
                          <input type="text" name="name" id="name" class="form-control" />  
                          <br />
                         <label>Enter Phone Number</label>
                         <input type="text" name="phone" id="phone" class="form-control" />
                         <br />
                          <label>Select Gender</label>  
                          <select name="gender" id="gender" class="form-control">  
                               <option value="Male">Male</option>  
                               <option value="Female">Female</option>  
                          </select>  
                          <br />  
                          <label>Enter Course</label>
                          <input type="text" name="course" id="course" class="form-control" />
                          <br />  
                          <label>Enter Age</label>  
                          <input type="text" name="age" id="age" class="form-control" />  
                          <br />  
                          <input type="hidden" name="student_id" id="student_id" />
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-sm btn-success" />

                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>

<div id="delete_data_Modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delete Student</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="delete_form">

                    <br />
                    <p >Are you sure, you want to delete <input type="text" readonly id="student" style="border: 0px; color: #0075b0;"> </input></p>



                    <br />
                    <input type="hidden" name="delete_id" id="delete_id" />
                    <input type="submit" name="delete" id="delete" value="delete" class="btn btn-sm btn-primary" />

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script src="assets/datatables/js/jquery.dataTables.min.js"></script>
<script src="assets/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="assets/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });

    </script>
<script>
    $(document).ready(function() {
        $('#dataTables-example1').DataTable({
            responsive: true
        });
    });

</script>
 <script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
      $(document).on('click', '.edit_data', function(){  
           var student_id = $(this).attr("id");
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{student_id:student_id},
                dataType:"json",  
                success:function(data){  
                     $('#name').val(data.name);  
                     $('#phone').val(data.phone);
                     $('#gender').val(data.gender);  
                     $('#course').val(data.course);
                     $('#age').val(data.age);  
                     $('#student_id').val(data.id);
                     $('#insert').val("Update");
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      });
     $(document).on('click', '.delete_data', function(){

         var name = $(this).data('name');
         var id = $(this).data('id');

                 $('#student').val(name);
                 $('#delete_id').val(id);
                 $('#delete').val("Yes");

         $('#delete_data_Modal').modal('show');

     });
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#name').val() == "")  
           {  
                alert("Name is required");  
           }  
           else if($('#phone').val() == '')
           {  
                alert("phone is required");
           }  
           else if($('#course').val() == '')
           {  
                alert("course is required");
           }  
           else if($('#age').val() == '')  
           {  
                alert("Age is required");  
           }  
           else  
           {  
                $.ajax({  
                     url:"insert.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#student_table').html(data);
                     }  
                });  
           }  
      });

     $('#delete_form').on("submit", function(event){
         event.preventDefault();

             $.ajax({
                 url:"delete.php",
                 method:"POST",
                 data:$('#delete_form').serialize(),
                 beforeSend:function(){
                     $('#delete').val("Deleting");
                 },
                 success:function(data){
                     $('#delete_form')[0].reset();
                     $('#delete_data_Modal').modal('hide');
                     $('#student_table').html(data);
                 }
             });

     });
     $(document).on('click', '.view_data', function(){
           var student_id = $(this).attr("id");
           if(student_id != '')
           {  
                $.ajax({  
                     url:"select.php",  
                     method:"POST",  
                     data:{student_id:student_id},
                     success:function(data){  
                          $('#student_detail').html(data);
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });


 });  
 </script>
<?php ob_flush()?>
