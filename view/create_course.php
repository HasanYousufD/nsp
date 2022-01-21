<div class="mx-5 px-5 ">
<form 
  action="index.php"  
  method="post"

>
  <input type="hidden" name="function" value="insert_course">

  <div class="mb-3">
    
    
    <label for="exampleInputEmail1" class="form-label">Course Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="course_name">

    <label for="exampleInputEmail1" class="form-label">Course Code</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="course_code">

    <label for="exampleInputEmail1" class="form-label">Course Credit</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="course_credit">

    <label for="exampleInputEmail1" class="form-label">Select Department</label>
    <select id="role" name="department_id" class="form-control">
    <?php foreach($data as $row){?>
        <option value="<?php echo $row['id'];?>"><?php echo $row['department_name']." (".$row['department_code'].")";?></option>
        
        <?php } ?>
    </select>
    
    
    
    
    
    
    <label for="exampleInputEmail1" class="form-label">Select Department</label>
    <select id="role" name="type" class="form-control">
    
    <option value="theory">THEORY</option>
    <option value="theory + Lab">THEORY + Lab</option>
        
        
    </select>
    
    

    <label for="exampleInputEmail1" class="form-label">Description</label>
    <textarea  class="form-control" id="exampleInputEmail1"   name="description"></textarea>    

    
    

    
    
  </div>
  
  <button type="submit" class="btn btn-primary">Create Course</button>
</form>
</div>