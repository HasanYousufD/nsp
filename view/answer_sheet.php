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
Exam's Question<span class="bg-warning"> </span></h3>

</div>

<?php
    //table section 
    //geting data
   $sql="SELECT * FROM `user` where id=(select student_id from `enrollment` where id='".$_GET["enrollment_id"]."')";		
   $student=$this->model->read_query($sql);
   echo "<h4 class='text-center'>".$student[0]["name"]." >> ".$student[0]["email"]."</h4>";
  

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
          <div class="bg-light m-5 p-3">

            
            <h5><?php echo $sl.":- ".$row['question']." [Mark: ".$row['mark']."]";?>  </h5>                  
            <?php
                $row['id'];
                if($row['type']=="mcq_question"){
                //geting data
                $sql="SELECT * FROM `mcq_question` where question_id=".$row["id"]." order by id";		
                $mcq_question=$this->model->read_query($sql);


                //getting question id
                $sql="select * from `answer` where enrollment_id='".$_GET["enrollment_id"]."' and question_id='".$row["id"]."'";                
                $answers=$this->model->read_query($sql);
                  if($answers){
                 //getting question id
                 $sql="select * from `mcq_answer` where answer_id='".$answers[0]["id"]."'";                
                 $mcq_answer=$this->model->read_query($sql);
                }
                echo "<h5> a. ".$mcq_question[0]["a"]."</h5>";
                echo "<h5> b. ".$mcq_question[0]["b"]."</h5>";
                echo "<h5> c. ".$mcq_question[0]["c"]."</h5>";
                echo "<h5> d. ".$mcq_question[0]["d"]."</h5>";
                //echo "<h3> answer. ".$mcq_question[0]["answer"]."</h3>";


                
                if($answers){
                  echo "<h3>Answer: ".$mcq_answer[0]["answer"]." Mark: ".$answers[0]["mark"]."</h3>";
                ?>
                  
                
                  <!--/MCQ form-->
                  <?php
                }

               
                }else if($row['type']=="written_question"){
                  //geting data
                $sql="SELECT * FROM `written_question` where question_id=".$row["id"]." order by id";		
                $written_question=$this->model->read_query($sql);
                ?>
                Read This file:
                <a href="<?php echo "assets/pdf/".$written_question[0]['file']; ?>"><button type="button" class="btn btn-secondary">Download</button></a>
                      <?php
                      $sql="select * from `answer` where enrollment_id='".$_GET["enrollment_id"]."' and question_id='".$row["id"]."'";
                
                      $answers=$this->model->read_query($sql);
                    //print_r($answers);
                    if($answers){
                      //getting question id
                      $sql="select * from `written_answer` where answer_id='".$answers[0]["id"]."'";                
                      $written_answer=$this->model->read_query($sql);
                      //print_r($written_answer);
                      if($written_answer){
                        echo "<h3>Answer: ".$written_answer[0]["answer"]." Mark: ".$answers[0]["mark"]."</h3>";
                      ?>
                      <!--Written form-->
                      <a href="<?php echo "assets/pdf/".$written_answer[0]['file']; ?>"><button type="button" class="btn btn-success">Download Answer</button></a>


                      <form 
                      action="index.php"  
                      method="post"
                      >
                      <input type="hidden" name="function" value="insert_written_mark">
                      <input type="hidden" name="exam_id" value="<?php echo $exam_id;?>">
                      <input type="hidden" name="question_id" value="<?php echo $row["id"];?>">
                      <input type="hidden" name="enrollment_id" value="<?php echo $_GET["enrollment_id"];?>">
                      
                      <div class="mb-3">            
                          
                        
                        
                        <label for="exampleInputEmail1" class="form-label">Mark:</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="mark" min="0" max="<?php echo $row['mark']; ?>">

                        
                      </div>
                      
                      <button type="submit" class="btn btn-warning">Submit Mark</button>
                    </form>
                    <!--/Written form-->                

                <?php
                      }
                      }
                }
             ?>
             </div> 
                              
          <?php
          }
          ?>     

               
        </div>
  <?php

back();