<div class="mx-5 px-5 ">
<h1 class="text-center bg-info">Assign course to Teacher</h1>
<form 
  action="index.php"  
  method="post"

>
  <input type="hidden" name="function" value="assign_course_to_teacher3">

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Select Semester</label>
    <select id="role" name="semester_id" class="form-control">
    <?php foreach($semester as $row){?>
        <option value="<?php echo $row['id'];?>"><?php echo $row['semester'];?></option>
        
      <?php } ?>
    </select>


    <label for="exampleInputEmail1" class="form-label">Select Section Name</label>
    <select id="role" name="section_name" class="form-control">
    
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="D">D</option>        
      
    </select>
    
    

    <label for="exampleInputEmail1" class="form-label">Select Course</label>
    <select id="role" name="course_id" class="form-control">
    <?php foreach($course as $row){?>
        <option value="<?php echo $row['id'];?>"><?php echo $row['course_name']." (".$row['course_code'].")";?></option>
        
      <?php } ?>
    </select>

    <label for="exampleInputEmail1" class="form-label">Select Teacher</label>
    <select id="role" name="teacher_id" class="form-control">
    <?php foreach($teacher as $row){?>
        <option value="<?php echo $row['id'];?>"><?php echo $row['name']." [".$row['email']."]";?></option>
        
      <?php } ?>
    </select>
    
    
  </div>
  
  <button type="submit" class="btn btn-primary">Next</button>
</form>
</div>