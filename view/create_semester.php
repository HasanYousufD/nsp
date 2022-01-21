<h1 class="text-center bg-info">Create Semester</h1>
<div class="mx-5 px-5 ">
<form 
  action="index.php"  
  method="post"

>
  <input type="hidden" name="function" value="insert_semester">

  <div class="mb-3">
    
    
    
    <label for="exampleInputEmail1" class="form-label">Select Semester Name</label>
    <select id="role" name="semester_name" class="form-control">
    
    <option value="SPRING">SPRING</option>
    <option value="SUMMER">SUMMER</option>
    <option value="FALL">FALL</option>
    </select>



    <label for="exampleInputEmail1" class="form-label">Select Semester Name</label>
    <select id="role" name="semester_year" class="form-control">
    
    <option value="2022">2022</option>
    <option value="2023">2023</option>
    <option value="2024">2024</option>   
    </select>
    
    

    
    
    

    
    
  </div>
  
  <button type="submit" class="btn btn-primary">Create Semester</button>
</form>
</div>