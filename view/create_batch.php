<h1 class="text-center bg-info">Create Semester</h1>
<div class="mx-5 px-5 ">
<form 
  action="index.php"  
  method="post"

>
  <input type="hidden" name="function" value="insert_batch">

  <div class="mb-3">
    
  <label for="exampleInputEmail1" class="form-label">Batch number</label>
  <input type="number" name="batch_number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    
    
  <label for="exampleInputEmail1" class="form-label">Select Department</label>
    <select id="role" name="department_id" class="form-control">
    <?php foreach($departments as $row){?>
        <option value="<?php echo $row['id'];?>"><?php echo $row['department_name']." (".$row['department_code'].")";?></option>
        
        <?php } ?>
    </select>

  <label for="exampleInputEmail1" class="form-label">Select Semester</label>
    <select id="role" name="semester_id" class="form-control">
    <?php foreach($semesters as $row){?>
        <option value="<?php echo $row['id'];?>"><?php echo $row['semester'];?></option>
        
        <?php } ?>
    </select>



    
    
    

    
    
    

    
    
  </div>
  
  <button type="submit" class="btn btn-primary">Create Batch</button>
</form>
</div>