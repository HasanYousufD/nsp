<div class="mx-5 px-5 ">
<h3 class="text-center bg-info"><?php
//getting data
$sql="SELECT * FROM `course` where id =(select course_id from `section` where id=(select section_id from `exam` where id='".$exam_id."'))";		
$course=$this->model->read_query($sql); 
echo $course[0]['course_name']." [".$course[0]['course_code']."]";
//getting data
$sql="SELECT * FROM `exam` where id =".$exam_id."";		
$exam=$this->model->read_query($sql); 
echo $exam[0]['type'];
?> 
Exam's Question<span class="bg-warning"> [Create Question]</span></h3>
<?php
  if($_SESSION['role']!="student"){
?>


<div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
      MCQ Questioin
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
        <!--MCQ form-->
      <form 
          action="index.php"  
          method="post">
          <input type="hidden" name="function" value="insert_mcq_question">
          <div class="mb-3">            
            <input type="hidden" name="exam_id" value="<?php echo $exam_id;?>">  
            
            <label for="exampleInputEmail1" class="form-label">Question: [?]</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="question" placeholder="Type Question">

            <label for="exampleInputEmail1" class="form-label">a:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="a" placeholder="Option a">

            <label for="exampleInputEmail1" class="form-label">b:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="b" placeholder="Option b">

            <label for="exampleInputEmail1" class="form-label">c:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="c" placeholder="Option c">

            <label for="exampleInputEmail1" class="form-label">d:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="d" placeholder="Option d">


            <label for="exampleInputEmail1" class="form-label">Answer:</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="answer" id="flexRadioDefault1" value="a">
              <label class="form-check-label" for="flexRadioDefault1">
              a
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="answer" id="flexRadioDefault2" value="b">
              <label class="form-check-label" for="flexRadioDefault2">
              b
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="answer" id="flexRadioDefault2" value="c">
              <label class="form-check-label" for="flexRadioDefault2">
              c
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="answer" id="flexRadioDefault2" value="d">
              <label class="form-check-label" for="flexRadioDefault2">
              d
              </label>
            </div>

            <label for="exampleInputEmail1" class="form-label">Mark:</label>
            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="mark" placeholder="Mark of this question">


          </div>
          
          <button type="submit" class="btn btn-warning">Create MCQ Question</button>
        </form>
        <!--/MCQ form-->


      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
        Written Question
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
          <!--Written form-->
      <form 
          action="index.php"  
          method="post"
          enctype="multipart/form-data">
          <input type="hidden" name="function" value="insert_written_question">
          <div class="mb-3">            
            <input type="hidden" name="exam_id" value="<?php echo $exam_id;?>">  
            
            <label for="exampleInputEmail1" class="form-label">Question: [?]</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="question" placeholder="Type Question">

            <label for="exampleInputEmail1" class="form-label">File:</label>
            <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="file" placeholder="Select a pdf file">

            <label for="exampleInputEmail1" class="form-label">Mark:</label>
            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="mark" placeholder="Mark of this question">

          </div>
          
          <button type="submit" class="btn btn-warning">Create Written Question</button>
        </form>
        <!--/Written form-->
      </div>
    </div>
  </div>
</div>



<?php 
  }
?>
</div>

<?php
    //table section 

   //geting data
   $sql="SELECT * FROM `question` where exam_id=".$exam_id." order by id";		
   $question=$this->model->read_query($sql);
  
  ?>
        




        <div class="mt-3 mx-auto w-50">
          <?php
          $sl=0;

          foreach($question as $row) {
            $sl++;
          ?>

            
            <h5><?php echo $sl.":- ".$row['question']." [Mark: ".$row['mark']."]";?>  <a href="<?php delete_question($row["id"],$exam_id,$row["type"]); ?>"><span class="text-danger">Delete</span></a></h5>                  
            <?php
                $row['id'];
                if($row['type']=="mcq_question"){
                //geting data
                $sql="SELECT * FROM `mcq_question` where question_id=".$row["id"]." order by id";		
                $mcq_question=$this->model->read_query($sql);
                echo "<h5> a. ".$mcq_question[0]["a"]."</h5>";
                echo "<h5> b. ".$mcq_question[0]["b"]."</h5>";
                echo "<h5> c. ".$mcq_question[0]["c"]."</h5>";
                echo "<h5> d. ".$mcq_question[0]["d"]."</h5>";
                echo "<h3> answer. ".$mcq_question[0]["answer"]."</h3>";
               
                }else if($row['type']=="written_question"){
                  //geting data
                $sql="SELECT * FROM `written_question` where question_id=".$row["id"]." order by id";		
                $written_question=$this->model->read_query($sql);
                ?>
                Reqired File:
                <a href="<?php echo "assets/pdf/".$written_question[0]['file']; ?>"><button type="button" class="btn btn-secondary">Download</button></a>
                <?php
                }
             ?>                  
          <?php
          }
          ?>     

               
        </div>
  <?php

back();