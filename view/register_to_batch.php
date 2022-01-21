<div class="mx-5 px-5 ">
<form 
  action="index.php"  
  method="post"

>
  <input type="hidden" name="function" value="insert_student_registration">
  <input type="hidden" name="student_id" value="<?php echo $data[0]['id'];?>">

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Id:<?php echo $data[0]['id'];?></label><br>

    
    <label for="exampleInputEmail1" class="form-label">Name: <?php echo $data[0]['name'];?></label><br>
    

    <label for="exampleInputEmail1" class="form-label">Email address:<?php echo $data[0]['email'];?></label><br>


    <select id="role" name="batch_id" class="form-control">
    <?php foreach($batch as $row){?>
      <option value="<?php echo $row['id'];?>"><?php echo $row['batch_number'];?></option>
      
      <?php } ?>
    </select><br>
    
    

  <button type="submit" class="btn btn-primary">Register to Batch</button>
</form>
</div>