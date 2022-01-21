<?php
class GS_GUI_Controller{
	function __construct(){
		include('model/db.php');//database
		include('controller/supporters.php');
		$this->model=new GS_Model();//model class
		
	}
	function home(){

		//adding css framework
		$css_framework=add_css_framework("bootstrap5");
		$css_framework_js=add_css_framework_js("bootstrap5");

		//Home page
		include(getURL('header'));
		include(getURL('home'));
		include(getURL('footer'));
		
	}
	function sign_up(){
		//adding css framework
		$css_framework=add_css_framework("bootstrap5");
		$css_framework_js=add_css_framework_js("bootstrap5");

		
		//getting data of depatment
		$sql="SELECT * FROM `department`";		
		$data=$this->model->read_query($sql);

		//Home page
		include(getURL('header'));
		include(getURL('sign_up'));
		include(getURL('footer'));
	}
	function sign_in(){
		//adding css framework
		$css_framework=add_css_framework("bootstrap5");
		$css_framework_js=add_css_framework_js("bootstrap5");

		//Home page
		include(getURL('header'));
		include(getURL('sign_in'));
		include(getURL('footer'));
	}
	function manage_student(){

		//adding css framework
		$css_framework=add_css_framework("bootstrap5");
		$css_framework_js=add_css_framework_js("bootstrap5");

		//checking session and include dashboard
		check_session();

		//Student Dashboard page
		include(getURL('header'));
		include(getURL('manage_student'));
		include(getURL('footer'));
	}
	function student_dashboard(){

		//adding css framework
		$css_framework=add_css_framework("bootstrap5");
		$css_framework_js=add_css_framework_js("bootstrap5");

		//checking session and include dashboard
		check_session();

		//Student Dashboard page
		include(getURL('header'));
		include(getURL('student_dashboard'));
		include(getURL('footer'));
	}
	function teacher_dashboard(){

		//adding css framework
		$css_framework=add_css_framework("bootstrap5");
		$css_framework_js=add_css_framework_js("bootstrap5");

		//checking session and include dashboard
		check_session();

		//Student Dashboard page
		include(getURL('header'));
		include(getURL('teacher_dashboard'));
		include(getURL('footer'));
	}
	function admin_dashboard(){

		//adding css framework
		$css_framework=add_css_framework("bootstrap5");
		$css_framework_js=add_css_framework_js("bootstrap5");

		//checking session and include dashboard
		check_session();

		//Student Dashboard page
		include(getURL('header'));
		include(getURL('admin_dashboard'));
		include(getURL('footer'));
	}
	function insert_department(){
		//geting post values from create department page
		$department_name=$_POST['department_name'];
		$department_code=$_POST['department_code'];
		$description=$_POST['description'];
		
		//making sql and execute it
		$sql="INSERT INTO `department`(`department_name`, `department_code`, `description`) VALUES ('".$department_name."','".$department_code."','".$description."')";
		
		$this->model->execute_query($sql);

		//redirect to home page
		location('admin_dashboard');
	}
	function insert_course(){
		//geting post values from create department page
		$course_name=$_POST['course_name'];
		$course_code=$_POST['course_code'];
		$course_credit=$_POST['course_credit'];
		$department_id=$_POST['department_id'];
		$type=$_POST['type'];
		$description=$_POST['description'];
		
		//making sql and execute it
		$sql="INSERT INTO `course`(`course_name`, `course_code`, `course_credit`, `department_id`, `type`, `description`) VALUES ('".$course_name."','".$course_code."','".$course_credit."','".$department_id."','".$type."','".$description."')";
		
		$this->model->execute_query($sql);

		//redirect to home page
		location('admin_dashboard');
	}
	function insert_semester(){
		//geting post values from create department page
		$semester_name=$_POST['semester_name'];
		$semester_code=$_POST['semester_year'];
		$semester=$semester_name." ".$semester_code;
		
		
		//making sql and execute it
		$sql="INSERT INTO `semester`(`semester`) VALUES ('".$semester."')";
		
		$this->model->execute_query($sql);

		//redirect to home page
		location('admin_dashboard');
	}
	function insert_batch(){
		//geting post values from create department page
		$batch_number=$_POST['batch_number'];
		$department_id=$_POST['department_id'];
		$semester_id=$_POST['semester_id'];
		
		
		
		
		//making sql and execute it
		$sql="INSERT INTO `batch`(`batch_number`, `department_id`, `semester_id`) VALUES ('".$batch_number."','".$department_id."','".$semester_id."')";
		$this->model->execute_query($sql);

		//redirect to home page
		location('check_batch');
	}
	function create_department(){

		//adding css framework
		$css_framework=add_css_framework("bootstrap5");
		$css_framework_js=add_css_framework_js("bootstrap5");

		//checking session and include dashboard
		check_session();

		//Student Dashboard page
		include(getURL('header'));
		include(getURL('create_department'));
		include(getURL('footer'));
	}
	function create_course(){

		//adding css framework
		$css_framework=add_css_framework("bootstrap5");
		$css_framework_js=add_css_framework_js("bootstrap5");

		//checking session and include dashboard
		check_session();

		//getting data of depatment
		$sql="SELECT * FROM `department`";		
		$data=$this->model->read_query($sql);

		//Student Dashboard page
		include(getURL('header'));
		include(getURL('create_course'));
		include(getURL('footer'));
	}
	function create_batch(){

		//adding css framework
		$css_framework=add_css_framework("bootstrap5");
		$css_framework_js=add_css_framework_js("bootstrap5");

		//checking session and include dashboard
		check_session();

		//getting data of depatment
		$sql="SELECT * FROM `department`";		
		$departments=$this->model->read_query($sql);

		//getting data of Semester
		$sql="SELECT * FROM `semester` order by id";		
		$semesters=$this->model->read_query($sql);

		//Student Dashboard page
		include(getURL('header'));
		include(getURL('create_batch'));
		include(getURL('footer'));
	}
	function create_semester(){

		//adding css framework
		$css_framework=add_css_framework("bootstrap5");
		$css_framework_js=add_css_framework_js("bootstrap5");



		//Student Dashboard page
		include(getURL('header'));
		include(getURL('create_semester'));
		include(getURL('footer'));
	}
	function check_department(){
		//adding css framework
		$css_framework=add_css_framework("bootstrap5");
		$css_framework_js=add_css_framework_js("bootstrap5");

		//checking session and include dashboard
		check_session();

		//getting data
		$sql="SELECT * FROM `department`";		
		$data=$this->model->read_query($sql);

		//Student Dashboard page
		include(getURL('header'));
		include(getURL('check_department'));
		include(getURL('footer'));
	}
	function insert_mcq_question(){

		//checking session and include dashboard
		check_session();
		if(isset($_POST['exam_id'])){
			$exam_id=$_POST['exam_id'];
			$question=$_POST['question'];
			$a=$_POST['a'];
			$b=$_POST['b'];
			$c=$_POST['c'];
			$d=$_POST['d'];
			$answer=$_POST['answer'];
			$mark=$_POST['mark'];
			$type="mcq_question";
			


			

						
			//making sql and execute it
			$sql="INSERT INTO `question`( `question`, `exam_id`, `type`, `mark`) VALUES ('".$question."','".$exam_id."','".$type."','".$mark."')";
			$this->model->execute_query($sql);

			//getting question id
			$sql="select id from `question` where question='".$question."' and exam_id='".$exam_id."' and type='".$type."' and mark='".$mark."'";

			$question=$this->model->read_query($sql);
			$question_id=$question[0]['id'];


			//making sql and execute it
			$sql="INSERT INTO `mcq_question`( `question_id`, `a`, `b`, `c`, `d`, `answer`) VALUES ('".$question_id."','".$a."','".$b."','".$c."','".$d."','".$answer."')";
			$this->model->execute_query($sql);

			

			
		}
		location("question&id=".$exam_id);
		

		
		
		

		
		
		
	}
function insert_mcq_answer(){

		//checking session and include dashboard
		check_session();
		
		if(isset($_POST['exam_id'])){
			$exam_id=$_POST['exam_id'];
			$question_id=$_POST['question_id'];
			$enrollment_id=$_POST['enrollment_id'];
			$correct_answer=$_POST['correct_answer'];
			$answer=$_POST['answer'];
			$question_mark=$_POST['mark'];
			if($correct_answer==$answer)
			{
				$answer_mark=$question_mark;
			}else{
				$answer_mark=0;
			}
			$type="mcq_answer";

			


			

						
			//making sql and execute it
			$sql="INSERT INTO `answer`( `enrollment_id`, `question_id`, `mark`) VALUES ('".$enrollment_id."','".$question_id."','".$answer_mark."')";
			
			$this->model->execute_query($sql);

			//getting question id
			$sql="select id from `answer` where enrollment_id='".$enrollment_id."' and question_id='".$question_id."' and mark='".$answer_mark."'";
			
			$answers=$this->model->read_query($sql);
			$answer_id=$answers[0]['id'];


			//making sql and execute it
			$sql="INSERT INTO `mcq_answer`(`answer_id`, `answer`) VALUES ('".$answer_id."','".$answer."')";
			
			$this->model->execute_query($sql);

			

			
		}
		location("join_exam&id=".$exam_id."&enrollment_id=".$enrollment_id);
		

		
		
		

		
		
		
	}
	function insert_written_question(){

		//checking session and include dashboard
		check_session();
		if(isset($_POST['exam_id'])){
			$exam_id=$_POST['exam_id'];
			$question=$_POST['question'];	
			
			$mark=$_POST['mark'];
			$type="written_question";




			


			

						
			//making sql and execute it
			$sql="INSERT INTO `question`( `question`, `exam_id`, `type`, `mark`) VALUES ('".$question."','".$exam_id."','".$type."','".$mark."')";
			$this->model->execute_query($sql);

			//getting question id
			$sql="select id from `question` where question='".$question."' and exam_id='".$exam_id."' and type='".$type."' and mark='".$mark."'";

			$question=$this->model->read_query($sql);
			$question_id=$question[0]['id'];


			//file section
			$file= $_FILES['file']['name'];
			$file=explode('.', $file);
			$file_ex=end($file);			
			$file=rand(9999,99999).date('-Y-m-d-H-i-s.').$file_ex;		
			move_uploaded_file($_FILES['file']['tmp_name'], 'assets/pdf/'.$file);

			
			//making sql and execute it
			$sql="INSERT INTO `written_question`( `question_id`, `file`) VALUES ('".$question_id."','".$file."')";
			$this->model->execute_query($sql);

			

			
		}
		location("question&id=".$exam_id);
		

		
		
		

		
		
		
	}
	function insert_written_answer(){

		//checking session and include dashboard
		check_session();
		
		if(isset($_POST['exam_id'])){
			
			$mark=0;			
			$type="written_answer";
			$exam_id=$_POST['exam_id'];
			$question_id=$_POST['question_id'];
			$enrollment_id=$_POST['enrollment_id'];			
			$answer=$_POST['answer'];
		
			

			//making sql and execute it
			$sql="INSERT INTO `answer`( `enrollment_id`, `question_id`, `mark`) VALUES ('".$enrollment_id."','".$question_id."','".$mark."')";
			
			$this->model->execute_query($sql);

			//getting question id
			$sql="select id from `answer` where enrollment_id='".$enrollment_id."' and question_id='".$question_id."' and mark='".$mark."'";
			
			$answers=$this->model->read_query($sql);
			$answer_id=$answers[0]['id'];


			//file section
			$file= $_FILES['file']['name'];
			$file=explode('.', $file);
			$file_ex=end($file);			
			$file=rand(9999,99999).date('-Y-m-d-H-i-s.').$file_ex;		
			move_uploaded_file($_FILES['file']['tmp_name'], 'assets/pdf/'.$file);



			//making sql and execute it
			$sql="INSERT INTO `written_answer`(`answer_id`, `answer`,`file`) VALUES ('".$answer_id."','".$answer."','".$file."')";
			
			$this->model->execute_query($sql);


			


			

						
			

			
			
			

			

			
		}
		location("join_exam&id=".$exam_id."&enrollment_id=".$enrollment_id);
		

		
		
		

		
		
		
	}
	function insert_written_mark(){

		//checking session and include dashboard
		check_session();
		
		if(isset($_POST['exam_id'])){
			
						
			$type="written_answer";
			$exam_id=$_POST['exam_id'];
			$question_id=$_POST['question_id'];
			$enrollment_id=$_POST['enrollment_id'];			
			$mark=$_POST['mark'];
		
			

			//making sql and execute it
			$sql="UPDATE  `answer` SET `mark`='".$mark."' WHERE question_id='".$question_id."' and enrollment_id='".$enrollment_id."'";
			
			$this->model->execute_query($sql);


			

			
		}
		location("answer_sheet&id=".$exam_id."&enrollment_id=".$enrollment_id);
		

		
		
		

		
		
		
	}
	function join_exam(){
		//exam_id=id
		//enrollment_id=enrollment_id
		//
		if(isset($_POST['exam_id'])){
			$exam_id=$_POST['exam_id'];
		}else{
			$exam_id=$_GET['id'];
		}
		
		//checking session and include dashboard
		check_session();

		//adding css framework
		$css_framework=add_css_framework("bootstrap5");
		$css_framework_js=add_css_framework_js("bootstrap5");
		

		//edit page
		include(getURL('header'));
		include(getURL('join_exam'));
		include(getURL('footer'));
	}
	function answer_sheet(){
		//exam_id=id
		//enrollment_id=enrollment_id
		//
		if(isset($_POST['exam_id'])){
			$exam_id=$_POST['exam_id'];
		}else{
			$exam_id=$_GET['id'];
		}
		
		//checking session and include dashboard
		check_session();

		//adding css framework
		$css_framework=add_css_framework("bootstrap5");
		$css_framework_js=add_css_framework_js("bootstrap5");
		

		//edit page
		include(getURL('header'));
		include(getURL('answer_sheet'));
		include(getURL('footer'));
	}
	function question(){
		if(isset($_POST['exam_id'])){
			$exam_id=$_POST['exam_id'];
		}else{
			$exam_id=$_GET['id'];
		}
		
		//checking session and include dashboard
		check_session();

		//adding css framework
		$css_framework=add_css_framework("bootstrap5");
		$css_framework_js=add_css_framework_js("bootstrap5");
		

		//edit page
		include(getURL('header'));
		include(getURL('question'));
		include(getURL('footer'));
	}
	function answer_sheets(){
		if(isset($_POST['section_id'])){
			$section_id=$_POST['section_id'];
		}else{
			$section_id=$_GET['section_id'];
		}

		//getting data
		$sql="SELECT * FROM `user` where id in(select student_id from `enrollment` where section_id='".$section_id."')";		
		$student=$this->model->read_query($sql);
		
		
		//checking session and include dashboard
		check_session();

		//adding css framework
		$css_framework=add_css_framework("bootstrap5");
		$css_framework_js=add_css_framework_js("bootstrap5");
		

		//edit page
		include(getURL('header'));
		include(getURL('answer_sheets'));
		include(getURL('footer'));
	}
	function insert_exam(){
		if(isset($_POST['section_id'])){
			$section_id=$_POST['section_id'];
		}else{
			$section_id=$_GET['id'];
		}

		
		
		//checking session and include dashboard
		check_session();

		if(isset($_POST['type'])){
			$section_id=$_POST['section_id'];
			$type=$_POST['type'];
			$date=$_POST['date'];
			$time=$_POST['time'];

						
			//making sql and execute it
			$sql="INSERT INTO `exam`( `section_id`, `type`, `date`, `time`, `publish`) VALUES ('".$section_id."','".$type."','".$date."','".$time."','off')";
			echo $sql;
			$this->model->execute_query($sql);
		}
		location("exam&id=".$section_id);
		
		
	}
	function publish_on(){
		

		
		
		//checking session and include dashboard
		check_session();

		
			$exam_id=$_GET['exam_id'];
			$id=$_GET['id'];
			

						
			//making sql and execute it
			$sql="UPDATE `exam` SET publish='on' WHERE id='".$exam_id."'";
			//echo $sql;
			$this->model->execute_query($sql);
		
		location("exam&id=".$id);
		
		
	}
	function publish_off(){
		//checking session and include dashboard
		check_session();

		
			$exam_id=$_GET['exam_id'];
			$id=$_GET['id'];
			

						
			//making sql and execute it
			$sql="UPDATE `exam` SET publish='off' WHERE id='".$exam_id."'";
			//echo $sql;
			$this->model->execute_query($sql);
		
		location("exam&id=".$id);
		
	}
	function exam(){
		if(isset($_POST['section_id'])){
			$section_id=$_POST['section_id'];
		}else{
			$section_id=$_GET['id'];
		}
		
		//checking session and include dashboard
		check_session();

		//adding css framework
		$css_framework=add_css_framework("bootstrap5");
		$css_framework_js=add_css_framework_js("bootstrap5");
		

		//edit page
		include(getURL('header'));
		include(getURL('exam'));
		include(getURL('footer'));
	}
	function insert_material(){
		if(isset($_POST['section_id'])){
			$section_id=$_POST['section_id'];
		}else{
			$section_id=$_GET['id'];
		}
		
		//checking session and include dashboard
		check_session();

		if(isset($_POST['material_name'])){
			$section_id=$_POST['section_id'];
			$material_name=$_POST['material_name'];
			$link= $_FILES['link']['name'];

			$link=explode('.', $link);
			$file_ex=end($link);
			//echo "</br>";
			$link=rand(9999,99999).date('-Y-m-d-H-i-s.').$file_ex;
			//echo $link;

			//$model=new RSAM_Model();
			//$model->insert_notice($notice_title,$file);
			//echo $_FILES['link']['tmp_name'];
			move_uploaded_file($_FILES['link']['tmp_name'], 'assets/pdf/'.$link);
						
			//making sql and execute it
			$sql="INSERT INTO `material`(`section_id`, `material_name`, `link`) VALUES ('".$section_id."','".$material_name."','".$link."')";
			//echo $sql;
			$this->model->execute_query($sql);
		}
		location("material&id=".$section_id);
		
		
	}
	function material(){
		if(isset($_POST['section_id'])){
			$section_id=$_POST['section_id'];
		}else{
			$section_id=$_GET['id'];
		}
		
		//checking session and include dashboard
		check_session();

		//adding css framework
		$css_framework=add_css_framework("bootstrap5");
		$css_framework_js=add_css_framework_js("bootstrap5");
		

		//edit page
		include(getURL('header'));
		include(getURL('material'));
		include(getURL('footer'));
	}

	function insert_outline(){
		if(isset($_POST['section_id'])){
			$section_id=$_POST['section_id'];
		}else{
			$section_id=$_GET['id'];
		}
		
		//checking session and include dashboard
		check_session();


		if(isset($_POST['course_detail'])){
			$section_id=$_POST['section_id'];
			$course_detail=$_POST['course_detail'];
			$schedule=$_POST['schedule'];
			//making sql and execute it
			$sql="INSERT INTO `outline`(`section_id`, `course_detail`, `schedule`) VALUES ('".$section_id."','".$course_detail."','".$schedule."')";
			$this->model->execute_query($sql);
		}
		location("outline&id=".$section_id);
		
		
	}
	function outline(){
		if(isset($_POST['section_id'])){
			$section_id=$_POST['section_id'];
		}else{
			$section_id=$_GET['id'];
		}
		
		//checking session and include dashboard
		check_session();

		//adding css framework
		$css_framework=add_css_framework("bootstrap5");
		$css_framework_js=add_css_framework_js("bootstrap5");
		

		//edit page
		include(getURL('header'));
		include(getURL('outline'));
		include(getURL('footer'));
	}
	function check_assigned_course(){
		//checking session and include dashboard
		check_session();

		

		//geting data
		$sql="SELECT * FROM `semester`";		
		$semester=$this->model->read_query($sql);

		


		//adding css framework
		$css_framework=add_css_framework("bootstrap5");
		$css_framework_js=add_css_framework_js("bootstrap5");

		//edit page
		include(getURL('header'));
		include(getURL('check_assigned_course'));
		include(getURL('footer'));
	}
	function check_enrolled_course1(){
		//checking session and include dashboard
		check_session();

		

		//geting data
		$sql="SELECT * FROM `semester`";		
		$semester=$this->model->read_query($sql);

		


		//adding css framework
		$css_framework=add_css_framework("bootstrap5");
		$css_framework_js=add_css_framework_js("bootstrap5");

		//edit page
		include(getURL('header'));
		include(getURL('check_enrolled_course1'));
		include(getURL('footer'));
	}
	function check_enrolled_course2(){
		$student_email=$_SESSION['email'];
		$semester_id=$_POST['semester_id'];

		//checking session and include dashboard
		check_session();

		

		//geting data
		$sql="SELECT * FROM `user` where email='".$student_email."'";		
		$student=$this->model->read_query($sql);
		//echo "<pre>";
		//print_r($student[0]['id']);
		$department_id=$student[0]['department_id'];

		//getting data
		$sql="SELECT * FROM `section` where semester_id=".$semester_id." and teacher_id=(SELECT id FROM user WHERE id=section.teacher_id and department_id=".$department_id.") and course_id=(SELECT id FROM course WHERE id=section.course_id and department_id=".$department_id.")";		
		
		$section=$this->model->read_query($sql);
		//print_r($section);


		


		//adding css framework
		$css_framework=add_css_framework("bootstrap5");
		$css_framework_js=add_css_framework_js("bootstrap5");

		//edit page
		include(getURL('header'));
		include(getURL('check_enrolled_course2'));
		include(getURL('footer'));
	}
	function enroll_course1(){
		//checking session and include dashboard
		check_session();

		

		//geting data
		$sql="SELECT * FROM `semester`";		
		$semester=$this->model->read_query($sql);

		


		//adding css framework
		$css_framework=add_css_framework("bootstrap5");
		$css_framework_js=add_css_framework_js("bootstrap5");

		//edit page
		include(getURL('header'));
		include(getURL('enroll_course1'));
		include(getURL('footer'));
	}
	function enroll_course2(){
		$student_email=$_POST['student_email'];
		$semester_id=$_POST['semester_id'];

		//checking session and include dashboard
		check_session();

		

		//geting data
		$sql="SELECT * FROM `user` where email='".$student_email."'";		
		$student=$this->model->read_query($sql);
		//echo "<pre>";
		//echo $sql;
		//print_r($student);
		//die();
		
		$department_id=$student[0]['department_id'];

		//getting data
		$sql="SELECT * FROM `section` where semester_id=".$semester_id." and teacher_id=(SELECT id FROM user WHERE id=section.teacher_id and department_id=".$department_id.") and course_id=(SELECT id FROM course WHERE id=section.course_id and department_id=".$department_id.")";		
		
		$section=$this->model->read_query($sql);
		//print_r($section);


		


		//adding css framework
		$css_framework=add_css_framework("bootstrap5");
		$css_framework_js=add_css_framework_js("bootstrap5");

		//edit page
		include(getURL('header'));
		include(getURL('enroll_course2'));
		include(getURL('footer'));
	}
	function enroll_course(){
		$section_id=$_GET['section_id'];
		$student_id=$_GET['student_id'];
		//student_email?
		//semester_id?


		//checking session and include dashboard
		check_session();
		

		//inserting data to section
		$sql="INSERT INTO `enrollment`(`section_id`,`student_id`) VALUES ('".$section_id."','".$student_id."')";
		$this->model->execute_query($sql);
		back();
		//location("check_enrollment");

	}
	function assign_course_to_teacher1(){
		//checking session and include dashboard
		check_session();

		

		//geting data
		$sql="SELECT * FROM `department`";		
		$data=$this->model->read_query($sql);

		


		//adding css framework
		$css_framework=add_css_framework("bootstrap5");
		$css_framework_js=add_css_framework_js("bootstrap5");

		//edit page
		include(getURL('header'));
		include(getURL('assign_course_to_teacher1'));
		include(getURL('footer'));
	}
	function assign_course_to_teacher2(){
		//checking session and include dashboard
		check_session();
		$department_id=$_POST['department_id'];

		//geting data
		$sql="SELECT * FROM `semester` ORDER BY id ";		
		$semester=$this->model->read_query($sql);

		//geting data
		$sql="SELECT * FROM `user` where role='teacher' and department_id=".$department_id;		
		$teacher=$this->model->read_query($sql);

		//geting data
		$sql="SELECT * FROM `course` where department_id=".$department_id;		
		$course=$this->model->read_query($sql);

		//adding css framework
		$css_framework=add_css_framework("bootstrap5");
		$css_framework_js=add_css_framework_js("bootstrap5");

		//edit page
		include(getURL('header'));
		include(getURL('assign_course_to_teacher2'));
		include(getURL('footer'));
	}
	function assign_course_to_teacher3(){
		//checking session and include dashboard
		check_session();
		$semester_id=$_POST['semester_id'];
		$section_name=$_POST['section_name'];
		$teacher_id=$_POST['teacher_id'];
		$course_id=$_POST['course_id'];

		//inserting data to section
		$sql="INSERT INTO `section`(`semester_id`,`section_name`, `teacher_id`, `course_id`) VALUES ('".$semester_id."','".$section_name."','".$teacher_id."','".$course_id."')";
		$this->model->execute_query($sql);
		location("check_assigned_course_of_teacher1");

	}
	function check_assigned_course_of_teacher1(){
		//adding css framework
		$css_framework=add_css_framework("bootstrap5");
		$css_framework_js=add_css_framework_js("bootstrap5");

		//checking session and include dashboard
		check_session();

		//geting data
		$sql="SELECT * FROM `department`";		
		$department=$this->model->read_query($sql);


		//getting data
		$sql="SELECT * FROM `semester` order by id";		
		$semester=$this->model->read_query($sql);

		//Student Dashboard page
		include(getURL('header'));
		include(getURL('check_assigned_course_of_teacher1'));
		include(getURL('footer'));
	}
	function check_assigned_course_of_teacher2(){
		$department_id=$_POST['department_id'];
		$semester_id=$_POST['semester_id'];

		//adding css framework
		$css_framework=add_css_framework("bootstrap5");
		$css_framework_js=add_css_framework_js("bootstrap5");

		//checking session and include dashboard
		check_session();

		//getting data
		$sql="SELECT * FROM `section` where semester_id=".$semester_id." and teacher_id=(SELECT id FROM user WHERE id=section.teacher_id and department_id=".$department_id.") and course_id=(SELECT id FROM course WHERE id=section.course_id and department_id=".$department_id.")";		
		
		$section=$this->model->read_query($sql);
		
		

		//Student Dashboard page
		include(getURL('header'));
		include(getURL('check_assigned_course_of_teacher2'));
		include(getURL('footer'));
	}
	function check_section(){
		//adding css framework
		$css_framework=add_css_framework("bootstrap5");
		$css_framework_js=add_css_framework_js("bootstrap5");

		//checking session and include dashboard
		check_session();

		//geting data
		$sql="SELECT * FROM `department`";		
		$department=$this->model->read_query($sql);


		//getting data
		$sql="SELECT * FROM `semester` order by id";		
		$semester=$this->model->read_query($sql);

		//Student Dashboard page
		include(getURL('header'));
		include(getURL('check_assigned_course_of_teacher1'));
		include(getURL('footer'));
	}
	function check_semester(){
		//adding css framework
		$css_framework=add_css_framework("bootstrap5");
		$css_framework_js=add_css_framework_js("bootstrap5");

		//checking session and include dashboard
		check_session();

		//getting data
		$sql="SELECT * FROM `semester` ORDER BY id";		
		$data=$this->model->read_query($sql);

		//Student Dashboard page
		include(getURL('header'));
		include(getURL('check_semester'));
		include(getURL('footer'));
	}	
	function check_batch(){
		//adding css framework
		$css_framework=add_css_framework("bootstrap5");
		$css_framework_js=add_css_framework_js("bootstrap5");

		//checking session and include dashboard
		check_session();

		//getting data
		$sql="SELECT * FROM `batch` ORDER BY id";		
		$data=$this->model->read_query($sql);

		//Student Dashboard page
		include(getURL('header'));
		include(getURL('check_batch'));
		include(getURL('footer'));
	}	

	function dashboard(){
		//adding css framework
		$css_framework=add_css_framework("bootstrap5");
		$css_framework_js=add_css_framework_js("bootstrap5");

		//getting data
		$sql="SELECT * FROM `user`";		
		$data=$this->model->read_query($sql);

		//checking session and include dashboard
		check_session();

		//edit page
		include(getURL('header'));
		include(getURL('dashboard'));
		include(getURL('footer'));
				

	}
	function check_user(){
		//adding css framework
		$css_framework=add_css_framework("bootstrap5");
		$css_framework_js=add_css_framework_js("bootstrap5");

		//getting data
		$sql="SELECT * FROM `user`";		
		$data=$this->model->read_query($sql);

		//checking session and include dashboard
		check_session();

		//edit page
		include(getURL('header'));
		include(getURL('dashboard'));
		include(getURL('footer'));
				

	}
	function gs(){
	    
		include(getURL('gs'));
	}

	function connect(){
	    
		include(getURL('connect'));

	}

	function get_in(){
	    
		include(getURL('get_in'));

	}

	function register(){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$password=$_POST['psw'];
		$role=$_POST['role'];
		$department_id=$_POST['department_id'];
		
		$sql="INSERT INTO `user`(`name`, `email`, `role`, `password`, `department_id`) VALUES ('".$name."','".$email."','".$role."','".$password."','".$department_id."')";
		$this->model->execute_query($sql);
		location("sign_in");


	}
	function insert_student_registration(){
		//checking session and include dashboard
		check_session();

		$student_id=$_POST['student_id'];
		$batch_id=$_POST['batch_id'];
		
		
		$sql="INSERT INTO `student_registration`(`student_id`, `batch_id`) VALUES ('".$student_id."','".$batch_id."')";
		$this->model->execute_query($sql);
		location("check_user");


	}
	

	function register_to_batch(){

		//checking session and include dashboard
		check_session();

		//geting id
		$id=$_GET['id'];

		//geting data
		$sql="SELECT * FROM `user` WHERE id='".$id."'";		
		$data=$this->model->read_query($sql);

		//geting data
		$sql="SELECT * FROM `batch`";		
		$batch=$this->model->read_query($sql);


		//adding css framework
		$css_framework=add_css_framework("bootstrap5");
		$css_framework_js=add_css_framework_js("bootstrap5");

		//edit page
		include(getURL('header'));
		include(getURL('register_to_batch'));
		include(getURL('footer'));


	}
	

	function log_in(){
		
		$email=$_POST['email'];
		$password=$_POST['psw'];
		$role="admin";
		$sql="SELECT * FROM `user` where email='".$email."'";
		
		$data=$this->model->read_query($sql);
		
		if($password==$data[0]['password'])
		{	
			$_SESSION['id']=$data[0]['id'];
			$_SESSION['name']=$data[0]['name'];
			$_SESSION['email']=$data[0]['email'];
			$_SESSION['password']=$data[0]['password'];
			$_SESSION['role']=$data[0]['role'];
			$_SESSION['department']=$data[0]['department'];
			
			echo "<script>location='index.php?function=home'</script>";
		}else{
			location('home');
		}
		
		
	}
	
	function delete_question(){
		//geting id
		$question_id=$_GET['question_id'];
		$exam_id=$_GET['exam_id'];
		$type=$_GET['type'];
		$table=$_GET['table'];
		//deleting data
		$sql1="DELETE FROM `".$type."` WHERE question_id=".$question_id;		
		
		$sql2="DELETE FROM `".$table."` WHERE id=".$question_id;
				
		echo $sql1;
		echo $sql2;
		$this->model->execute_query($sql1);
		$this->model->execute_query($sql2);
		
		
		location('question&id='.$exam_id);
	}
function delete(){
		//geting id
		$id=$_GET['id'];
		$table=$_GET['table'];
		//deleting data
		$sql="DELETE FROM `".$table."` WHERE id=".$id;		
		$this->model->execute_query($sql);
		back();
		//location('check_'.$table);
	}

	function edit_user(){
		//checking session and include dashboard
		check_session();

		//geting id
		$id=$_GET['id'];

		//geting data
		$sql="SELECT * FROM `user` WHERE id='".$id."'";		
		$data=$this->model->read_query($sql);


		//adding css framework
		$css_framework=add_css_framework("bootstrap5");
		$css_framework_js=add_css_framework_js("bootstrap5");

		//edit page
		include(getURL('header'));
		include(getURL('edit'));
		include(getURL('footer'));
		
	}
	
	function edit_department(){
		//checking session and include dashboard
		check_session();

		//geting id
		$id=$_GET['id'];
		

		//geting data
		$sql="SELECT * FROM `department` WHERE id='".$id."'";		
		$data=$this->model->read_query($sql);


		//adding css framework
		$css_framework=add_css_framework("bootstrap5");
		$css_framework_js=add_css_framework_js("bootstrap5");

		//edit page
		include(getURL('header'));
		include(getURL('edit_department'));
		include(getURL('footer'));
		
	}


	function update(){
		$id=$_POST['id'];
		$name=$_POST['name'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$role="admin";
		$sql="UPDATE `user` SET `id`='$id',`name`='$name',`email`='$email',`role`='$role',`password`='$password' WHERE `id`='$id' ";
		$this->model->execute_query($sql);
		location('dashboard');
	}


	function update_department(){
		$id=$_POST['id'];
		$department_name=$_POST['department_name'];
		$department_code=$_POST['department_code'];
		$description=$_POST['description'];
		
		$sql="UPDATE `department` SET `department_name`='$department_name',`department_code`='$department_code',`description`='$description' WHERE `id`='$id' ";
		echo $sql;
		$this->model->execute_query($sql);
		location('check_department');
	}


	function log_out(){
		session_destroy();
		location('home');
	}	
}
?>
