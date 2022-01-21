<div class="mx-5 px-5 ">
<form 
  action="index.php"  
  method="post"

>
  <input type="hidden" name="function" value="update_department">
  <input type="hidden" name="id" value="<?php echo $data[0]['id'];?>">

  <div class="mb-3">
    
    
    <label for="exampleInputEmail1" class="form-label">Department Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="department_name" value="<?php echo $data[0]['department_name'];?>">
    

    <label for="exampleInputEmail1" class="form-label">Department Code</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="department_code" value="<?php echo $data[0]['department_code'];?>">
    

    <label for="exampleInputEmail1" class="form-label">Description</label>
    <textarea  class="form-control" id="exampleInputEmail1"   name="description" ><?php echo $data[0]['description'];?></textarea>    

    
    

    
    
  </div>
  
  <button type="submit" class="btn btn-primary">Update Department</button>
</form>
</div>