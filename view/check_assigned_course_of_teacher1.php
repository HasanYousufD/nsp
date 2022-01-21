<div class="mx-5 px-5 ">
<h1 class="text-center bg-info">Check Assigned course of Teacher (Section)</h1>
<form 
  action="index.php"  
  method="post"

>
  <input type="hidden" name="function" value="check_assigned_course_of_teacher2">

  <div class="mb-3">
    
    
    

    <label for="exampleInputEmail1" class="form-label">Select Department</label>
    <select id="role" name="department_id" class="form-control">
    <?php foreach($department as $row){?>
        <option value="<?php echo $row['id'];?>"><?php echo $row['department_name']." (".$row['department_code'].")";?></option>
        
      <?php } ?>
    </select>


    <label for="exampleInputEmail1" class="form-label">Select Semester</label>
    <select id="role" name="semester_id" class="form-control">
    <?php foreach($semester as $row){?>
        <option value="<?php echo $row['id'];?>"><?php echo $row['semester'];?></option>
        
      <?php } ?>
    </select>
    
    
  </div>
  
  <button type="submit" class="btn btn-primary">Next</button>
</form>
</div>