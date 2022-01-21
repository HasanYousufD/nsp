<div class="mx-5 px-5 ">
<h1 class="text-center bg-info"><?php
if($_SESSION['role']=="student"){ 
header("Refresh:15");
}
date_default_timezone_set('Asia/Dhaka');
echo date("d/m/Y")." ";
echo date("h:i a") . "<br>";
//getting data of depatment
$sql="SELECT * FROM `course` where id =(select course_id from `section` where id=".$section_id.")";		
$course=$this->model->read_query($sql); 
echo $course[0]['course_name']." [".$course[0]['course_code']."]";
?> 
Exams</h1>
<?php
  if($_SESSION['role']!="student"){
?>
<form 
  action="index.php"  
  method="post"
  

>
  <input type="hidden" name="function" value="insert_exam">

  <div class="mb-3">
    
    <input type="hidden" name="section_id" value="<?php echo $section_id;?>">
    

    <label for="exampleInputEmail1" class="form-label">Exam Type:</label>


    <div class="form-check">
      <input class="form-check-input" type="radio" name="type" id="flexRadioDefault1" value="Class Test">
      <label class="form-check-label" for="flexRadioDefault1">
        Class Test
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="type" id="flexRadioDefault2" value="Assignment">
      <label class="form-check-label" for="flexRadioDefault2">
        Assignment
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="type" id="flexRadioDefault2" value="Mid Term">
      <label class="form-check-label" for="flexRadioDefault2">
        Mid Term
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="type" id="flexRadioDefault2" value="Final">
      <label class="form-check-label" for="flexRadioDefault2">
        Final
      </label>
    </div>

    <label for="exampleInputEmail1" class="form-label">Date [mm/dd/yyyy]:</label>
    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="date">

    <label for="exampleInputEmail1" class="form-label">Time:</label>
    <input type="time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="time">



    
  
                          
    
    
    
    
  </div>
  
  <button type="submit" class="btn btn-warning">Create Exam</button>
</form>
<?php 
  }
?>
</div>

<?php
    //table section 

   //geting data
   $sql="SELECT * FROM `exam` where section_id=".$section_id." order by id";		
   $exam=$this->model->read_query($sql);
  
  ?>
        




        <div class="mt-3 mx-auto w-50">

            <table class="table table-success table-striped table-hover table-bordered border-dark ">
              <thead>
                <tr>
                  <th scope="col">#sl</th>
                  <th scope="col">Type</th>
                  <th scope="col">Date [dd/mm/yyyy]</th>
                  <th scope="col">Time</th>
                  <th scope="col" class=" text-center" colspan="3">Actions</th>                  
                  

                </tr>
              </thead>
              <tbody>
                <?php foreach($exam as $row){?>
                <tr>
                  <th scope="row"><?php echo $row['id'];?></th>
                  <td><?php echo $row['type'];?></td>
                  <td><?php echo  date("d/m/Y", strtotime($row['date']));?></td>
                  <td><?php echo  date("h:i a", strtotime($row['time']));?></td>
                  
                  
                  <td>
                    <?php
                    
                    
                    if($_SESSION['role']!="student"){ 
                    ?>
                  <a href="<?php question($row['id'],"question"); ?>"><button type="button" class="btn btn-secondary">Create Questioin</button></a>
                      <?php

                    }else if(date("d/m/Y")==date("d/m/Y", strtotime($row['date']))&&date("h:i a")>=date("h:i a", strtotime($row['time']))){
                      ?>
                      <a href="<?php join_exam($row['id'],"join_exam",$_GET["enrollment_id"]); ?>"><button type="button" class="btn btn-success">Join <?php echo $row['type'];?></button></a>
                      <?php
                    }else{
                      ?>
                      <a href="#"><button type="button" class="btn btn-danger">Join <?php echo $row['type'];?></button></a>
                      <?php
                    }
                      ?>
                </td>
                <?php  
                    if($_SESSION['role']=="student"){ 
                      //geting data
                      $sql="SELECT SUM(mark) FROM `question` where exam_id=".$row["id"];		
                      $question=$this->model->read_query($sql);


                      //geting data
                      $sql="SELECT SUM(mark) FROM `answer` where question_id in (select id from `question` where exam_id=".$row["id"].") and enrollment_id in (select id from `enrollment` where student_id=".$_SESSION["id"].")";		
                      $answer=$this->model->read_query($sql);
                      if($row["publish"]=="on"){
                    ?>
                <td>
                  mark: <?php
                        echo $answer[0]["SUM(mark)"]." out of ".$question[0]["SUM(mark)"];
                       ?>
                </td>
                      <?php
                      }else{
                        ?>
                        <td>
                          Result not published!
                        </td>
                        <?php
                      }
                     
                    }
                      ?>
                
                    <?php  
                    if($_SESSION['role']!="student"){ 
                    ?>
                <td>
                  <a href="<?php answer_sheets($row['section_id'],"answer_sheets"); ?>"><button type="button" class="btn btn-dark">Answer Sheets</button></a>
                </td>
                      <?php
                    }
                      ?>

                
                
                    <?php
                    
                    
                    if($_SESSION['role']!="student"){ 
                      if($row["publish"]=="off"){
                    ?>
                <td>
                  <a href="<?php publish_on($_GET["id"],$row["id"]); ?>"><button type="button" class="btn btn-danger">Publish</button></a>
                </td>
                      <?php
                      }else{
                        ?>
                <td>
                      <a href="<?php publish_off($_GET["id"],$row["id"]); ?>"><button type="button" class="btn btn-success">Unpublish</button></a>
                </td>
                      <?php
                      }

                    }
                      ?>
                
                </tr>
                <?php } ?>
              </tbody>
            </table>
        </div>
  <?php
  

back();