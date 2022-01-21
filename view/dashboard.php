
<div class="mx-auto w-50">


<a href="<?php route('home');?>"><img src="assets/logo/gs.png" style="width: 50px;"></a><br>
<?php back(); ?>

  
  <a href="<?php route('log_out');?>">
    <button type="button" class="btn btn-primary">Log Out</button>
</a>


      <H1>Welcome <?php echo $_SESSION['name'];?></H1>
<div class="mt-3">

    <table class="table table-success table-striped table-hover table-bordered border-dark ">
      <thead>
        <tr>
          <th scope="col">#sl</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Password</th>
          <th scope="col">Role</th>
          <th scope="col">Department</th>
          <th scope="col">Batch number</th>
          <th scope="col" class="text-center" colspan="2">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($data as $row){ 
          if($row['role']!="admin"){
          ?>
        <tr>
          <th scope="row"><?php echo $row['id'];?></th>
          <td><?php echo $row['name'];?></td>
          <td><?php echo $row['email'];?></td>
          <td><?php echo $row['password'];?></td>
          <td><?php echo $row['role'];?></td>
          <td>
            <?php
            
            //deleting data
            $sql="SELECT * FROM `department` WHERE id=".$row['department_id'];		
            $department=$this->model->read_query($sql);
            echo $department[0]['department_code'];
            //echo "<per>";
            //print_r($department);
          
            ?>
          </td>
          <td>
          <?php
            
            //deleting data
            $sql="SELECT * FROM `student_registration` WHERE student_id=".$row['id'];		
            $registry=$this->model->read_query($sql);
           
            if(!empty($registry))
            {
              //echo "registred";              
              $sql="SELECT * FROM `batch` WHERE id=".$registry[0]['batch_id'];              
              $batch=$this->model->read_query($sql);              
              echo convertNumberToWord($batch[0]['batch_number']);

            }else if($row['role']!="teacher"){
              //echo "Not Registered!";
              ?>
              <a href="<?php register($row['id']); ?>"><button type="button" class="btn btn-success">Register</button></a>
              <?php
            }
          
            ?>

          </td>
          <td><a href="<?php delete($row['id'],"user"); ?>"><button type="button" class="btn btn-danger">Delete</button></a></td>
          <td><a href="<?php edit($row['id'],"user"); ?>"><button type="button" class="btn btn-warning">Edit</button></a></td>

        </tr>
        <?php }
        }
        ?>
      </tbody>
    </table>

</div>
