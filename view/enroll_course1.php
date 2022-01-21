<div class="mx-5 px-5 ">
<h1 class="text-center bg-info">Enroll course to Student</h1>
<form 
  action="index.php"  
  method="post"

>
  <input type="hidden" name="function" value="enroll_course2">

  <div class="mb-3">
    
    <label for="exampleInputEmail1" class="form-label">Student Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="student_email">
    
    

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