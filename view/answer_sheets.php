
<div class="mx-auto w-50">


<div class="mt-3">

    <table class="table table-success table-striped table-hover table-bordered border-dark ">
      <thead>
        <tr>
          <th scope="col">#sl</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
                  
          <th scope="col" class="text-center" colspan="1">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($student as $row){ 
          if($row['role']!="admin"){
          ?>
        <tr>
          <th scope="row"><?php echo $row['id'];?></th>
          <td><?php echo $row['name'];?></td>
          <td><?php echo $row['email'];?></td>
          
          
            <?php
            
            //deleting data
            $sql="SELECT * FROM `exam` WHERE section_id=".$section_id;

            $exam=$this->model->read_query($sql);
            $exam_id=$exam[0]["id"];
            
            //print_r($department);

            //deleting data
            $sql="SELECT * FROM `enrollment` WHERE section_id=".$section_id." and student_id=".$row["id"] ;

            $enrollment=$this->model->read_query($sql);

            
            $enrollment_id=$enrollment[0]["id"];
          
            ?>

          
          
          
          <td><a href="<?php answer_sheet($exam_id,$enrollment_id); ?>"><button type="button" class="btn btn-info">answer sheet</button></a></td>
         

        </tr>
        <?php }
        }
        ?>
      </tbody>
    </table>

</div>
