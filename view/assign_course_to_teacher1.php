<div class="mx-5 px-5 ">
<h1 class="text-center bg-info">Assign course to Teacher</h1>
<form 
  action="index.php"  
  method="post"

>
  <input type="hidden" name="function" value="assign_course_to_teacher2">

  <div class="mb-3">
    
    
    

    <label for="exampleInputEmail1" class="form-label">Select Department</label>
    <select id="role" name="department_id" class="form-control">
    <?php foreach($data as $row){?>
        <option value="<?php echo $row['id'];?>"><?php echo $row['department_name']." (".$row['department_code'].")";?></option>
        
      <?php } ?>
    </select>
    
    
  </div>
  
  <button type="submit" class="btn btn-primary">Next</button>
</form>
</div>