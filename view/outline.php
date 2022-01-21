<div class="mx-5 px-5 ">
<h1 class="text-center bg-info">Course Outline</h1>
<?php
  if($_SESSION['role']!="student"){
?>
<form 
  action="index.php"  
  method="post"

>
  <input type="hidden" name="function" value="insert_outline">

  <div class="mb-3">
    
    <input type="hidden" name="section_id" value="<?php echo $section_id;?>">
    

    <label for="exampleInputEmail1" class="form-label">Enter Course Detail:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="course_detail">

    <label for="exampleInputEmail1" class="form-label">Schedule:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="schedule">
    
    
    
    
  </div>
  
  <button type="submit" class="btn btn-warning">Add Outline</button>
</form>
<?php 
  }
?>
</div>

<?php
    //table section 

   //geting data
   $sql="SELECT * FROM `outline` where section_id=".$section_id." order by id";		
   $outline=$this->model->read_query($sql);
  
  ?>
        




        <div class="mt-3 mx-auto w-50">

            <table class="table table-success table-striped table-hover table-bordered border-dark ">
              <thead>
                <tr>
                  <th scope="col">#sl</th>
                  <th scope="col">Course Details</th>
                  <th scope="col">Course Schdule</th>                  
                  

                </tr>
              </thead>
              <tbody>
                <?php foreach($outline as $row){?>
                <tr>
                  <th scope="row"><?php echo $row['id'];?></th>
                  <td><?php echo $row['course_detail'];?></td>
                  
                  <td>
                    <?php //echo $row['course_id'];                      
                      echo $row['schedule'];
                    ?>
                  </td>
                  
                  

                
                 
                  
                  

                </tr>
                <?php }?>
              </tbody>
            </table>
        </div>
  <?php

back();