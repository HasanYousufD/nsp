<h1 class="text-center bg-info">Enroll Course to student (Section)</h1>
<h4 class="text-center bg-secondary text-light"><span class="text-warning">Student's Name: </span><?php echo $student[0]['name'];?></h4>
<h4 class="text-center bg-secondary text-light"><span class="text-warning">Student's Email: </span><?php echo $student[0]['email'];?></h4>
<h4 class="text-center bg-secondary text-light"><span class="text-warning">Department: </span>
<?php //echo $semester_id;
  //geting data
  $sql="SELECT * FROM `department` where id='".$department_id."'";		
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
          <th scope="col">Teacher Name</th>
          <th scope="col">Course</th>
          <th scope="col">Semester</th>
          <th scope="col" class="text-center" colspan="3">Actions</th>

        </tr>
      </thead>
      <tbody>
        <?php foreach($section as $row){
          $sql="SELECT * FROM `enrollment` where student_id =".$student[0]['id']." and section_id=".$row['id'];
          //echo $sql; 
          $enrollment=$this->model->read_query($sql);
          
          if($enrollment){
          ?>
        <tr>
          <th scope="row"><?php echo $row['id'];?></th>
          <td><?php echo $row['section_name'];?></td>
          <td>
            <?php //echo $row['teacher_id'];
              $sql="SELECT * FROM `user` where id =".$row['teacher_id']; 
              $teacher=$this->model->read_query($sql);
              echo $teacher[0]['name'];
            ?>
          </td>
          <td>
            <?php //echo $row['course_id'];
              $sql="SELECT * FROM `course` where id =".$row['course_id']; 
              $course=$this->model->read_query($sql);
              echo $course[0]['course_name']." [".$course[0]['course_code']."]";

            ?>
          </td>
          <td>
            <?php
                $sql="SELECT * FROM `semester` where id =".$row['semester_id']; 
                $semester=$this->model->read_query($sql);
                echo $semester[0]['semester'];                 
                          
            ?>
          
          </td>

          <td><a href="<?php outline($row['id'],"outline"); ?>"><button type="button" class="btn btn-success">Outline</button></a></td>
          <td><a href="<?php material($row['id'],"material"); ?>"><button type="button" class="btn btn-secondary">Material</button></a></td>
          <td><a href="<?php exam($row['id'],"exam",$enrollment[0]["id"]); ?>"><button type="button" class="btn btn-warning">Exams</button></a></td>
          
          

        </tr>
        <?php 
          }
      }?>
      </tbody>
    </table>
</div>