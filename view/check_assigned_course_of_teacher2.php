<h1 class="text-center bg-info">Check Assigned course of Teacher (Section)</h1>



<div class="mt-3 mx-auto w-50">

    <table class="table table-success table-striped table-hover table-bordered border-dark ">
      <thead>
        <tr>
          <th scope="col">#sl</th>
          <th scope="col">Section Name</th>
          <th scope="col">Teacher Name</th>
          <th scope="col">Course</th>
          <th scope="col">Semester</th>
          <th scope="col" class="text-center" colspan="2">Actions</th>

        </tr>
      </thead>
      <tbody>
        <?php foreach($section as $row){?>
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

          <td><a href="<?php delete($row['id'],"section"); ?>"><button type="button" class="btn btn-danger">Delete</button></a></td>
          

        </tr>
        <?php }?>
      </tbody>
    </table>
</div>