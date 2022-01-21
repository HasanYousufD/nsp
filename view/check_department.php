<h1 class="text-center bg-info">check department details</h1>



<div class="mt-3 mx-auto w-50">

    <table class="table table-success table-striped table-hover table-bordered border-dark ">
      <thead>
        <tr>
          <th scope="col">#sl</th>
          <th scope="col">Department Name</th>
          <th scope="col">Department Code</th>
          <th scope="col">Description</th>
          <th scope="col">Courses</th>
          <th scope="col" class="text-center" colspan="2">Actions</th>

        </tr>
      </thead>
      <tbody>
        <?php foreach($data as $row){?>
        <tr>
          <th scope="row"><?php echo $row['id'];?></th>
          <td><?php echo $row['department_name'];?></td>
          <td><?php echo $row['department_code'];?></td>
          <td><?php echo $row['description'];?></td>
          <td>
            <?php
                $sql="SELECT * FROM `course` where department_id =".$row['id']; 
                $courses=$this->model->read_query($sql);
                
                foreach ($courses as $course ){
                  
                          
          ?>
          <a href="<?php delete($row['id'],"department"); ?>"><button type="button" class="btn btn-info m-3" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $course['course_name']." [".$course['type']."]";?>">
            <?php
                echo $course['course_code']." ".$course['course_credit'];
            ?>
          </button></a>
          <?php
          }
          ?>
          </td>

          <td><a href="<?php delete($row['id'],"department"); ?>"><button type="button" class="btn btn-danger">Delete</button></a></td>
          <td><a href="<?php edit($row['id'],"department"); ?>"><button type="button" class="btn btn-warning">Edit</button></a></td>

        </tr>
        <?php }?>
      </tbody>
    </table>
</div>