<div class="mx-5 px-5 ">
<h1 class="text-center bg-info">Check assigned Course</h1>
<form 
  action="index.php"  
  method="post"

>
  <input type="hidden" name="function" value="check_assigned_course">

  <div class="mb-3">
    
    <input type="hidden" name="teacher_id" value="<?php echo $_SESSION['id'];?>">
    

    <label for="exampleInputEmail1" class="form-label">Select Semester</label>
    <select id="role" name="semester_id" class="form-control">
    <?php foreach($semester as $row){?>
        <option value="<?php echo $row['id'];?>"><?php echo $row['semester'];?></option>
        
      <?php } ?>
    </select>
    
    
  </div>
  
  <button type="submit" class="btn btn-warning">Show</button>
</form>
</div>

<?php
//table section
if(isset($_POST['semester_id'])){
  $semester_id=$_POST['semester_id'];
  $teacher_id=$_POST['teacher_id'];

   //geting data
   $sql="SELECT * FROM `user` where id=".$teacher_id;		
   $teacher=$this->model->read_query($sql);


  //geting data
  $sql="SELECT * FROM `section` where teacher_id=".$teacher_id." and semester_id=".$semester_id;		
  $section=$this->model->read_query($sql);

  
  ?>
        <h4 class="text-center bg-secondary text-light"><span class="text-warning">Teacher's Name: </span><?php echo $teacher[0]['name'];?></h4>
        <h4 class="text-center bg-secondary text-light"><span class="text-warning">Teacher's Email: </span><?php echo $teacher[0]['email'];?></h4>
        <h4 class="text-center bg-secondary text-light"><span class="text-warning">Department: </span>
        <?php //echo $semester_id;
          //geting data
          $sql="SELECT * FROM `department` where id='".$teacher[0]['department_id']."'";		
          $department=$this->model->read_query($sql);
          echo $department[0]['department_name']." [".$department[0]['department_code']."]";
        ?>
        </h4>
        <h4 class="text-center bg-secondary text-light"><span class="text-warning">Semester: </span>
        <?php //echo $semester_id;
          //geting data
          $sql="SELECT * FROM `semester` where id='".$semester_id."'";		
          $semester=$this->model->read_query($sql);
          echo $semester[0]['semester'];
        ?>
        </h4>




        <div class="mt-3 mx-auto w-50">

            <table class="table table-success table-striped table-hover table-bordered border-dark ">
              <thead>
                <tr>
                  <th scope="col">#sl</th>
                  <th scope="col">Section Name</th>
                  <th scope="col">Course Name</th>
                  <th scope="col">Course Code</th>                  
                  <th scope="col" class="text-center" >Nof Students</th>
                  <th scope="col" class="text-center" colspan="3">Actions</th>

                </tr>
              </thead>
              <tbody>
                <?php foreach($section as $row){?>
                <tr>
                  <th scope="row"><?php echo $row['id'];?></th>
                  <td><?php echo $row['section_name'];?></td>
                  
                  <td>
                    <?php //echo $row['course_id'];
                      $sql="SELECT * FROM `course` where id =".$row['course_id']; 
                      $course=$this->model->read_query($sql);
                      echo $course[0]['course_name'];

                    ?>
                  </td>
                  <td>
                    <?php //echo $row['teacher_id'];
                      echo $course[0]['course_code'];
                    ?>
                  </td>
                  

                  <td>
                    <?php
                     $sql="SELECT COUNT(id) FROM `enrollment` where section_id=".$row['id'];		
                     $student=$this->model->read_query($sql);
                     echo $student[0]['COUNT(id)'];
                    ?>
                   
                    
                  </td>
                  <td>
                  <a href="<?php outline($row['id'],"outline"); ?>"><button type="button" class="btn btn-success">Outline</button></a>
                  </td>
                  <td>
                  <a href="<?php material($row['id'],"material"); ?>"><button type="button" class="btn btn-light">Materials</button></a>
                  </td>
                  <td>
                  <a href="<?php exam($row['id'],"exam",""); ?>"><button type="button" class="btn btn-warning">Exams</button></a>
                  </td>

                  
                  

                </tr>
                <?php }?>
              </tbody>
            </table>
        </div>
  <?php
}
back();
?>
