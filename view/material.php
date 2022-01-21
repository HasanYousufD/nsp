<div class="mx-5 px-5 ">
<h1 class="text-center bg-info">Course Materials</h1>
<?php
  if($_SESSION['role']!="student"){
?>
<form 
  action="index.php"  
  method="post"
  enctype="multipart/form-data"

>
  <input type="hidden" name="function" value="insert_material">

  <div class="mb-3">
    
    <input type="hidden" name="section_id" value="<?php echo $section_id;?>">
    

    <label for="exampleInputEmail1" class="form-label">Enter Material Name:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="material_name">

    <label for="exampleInputEmail1" class="form-label">File [.pdf]:</label>
    <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="link">

    
  
                          
    
    
    
    
  </div>
  
  <button type="submit" class="btn btn-warning">Add Material</button>
</form>
<?php 
  }
?>
</div>

<?php
    //table section 

   //geting data
   $sql="SELECT * FROM `material` where section_id=".$section_id." order by id";		
   $material=$this->model->read_query($sql);
  
  ?>
        




        <div class="mt-3 mx-auto w-50">

            <table class="table table-success table-striped table-hover table-bordered border-dark ">
              <thead>
                <tr>
                  <th scope="col">#sl</th>
                  <th scope="col">Material Name</th>
                  <th scope="col" colspan="2">Link</th>                  
                  

                </tr>
              </thead>
              <tbody>
                <?php foreach($material as $row){?>
                <tr>
                  <th scope="row"><?php echo $row['id'];?></th>
                  <td><?php echo $row['material_name'];?></td>
                  
                  
                  <td>
                  <a href="<?php echo "assets/pdf/".$row['link']; ?>"><button type="button" class="btn btn-secondary">Download</button></a>
                  </td>

                </tr>
                <?php }?>
              </tbody>
            </table>
        </div>
  <?php

back();