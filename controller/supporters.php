<?php
function back()
{
	echo "<button onclick='history.go(-1);' type='button' class='btn btn-primary my-3 mx-3'>Back</button>";
}
function edit($id,$table){
	echo "index.php?function=edit_".$table."&id=".$id;

}
function register($id){
	echo "index.php?function=register_to_batch&id=".$id;
}
function delete_question($question_id,$exam_id,$type){
	echo "index.php?function=delete_question&question_id=".$question_id."&table=question&exam_id=".$exam_id."&type=".$type;

}
function delete($id,$table){
	echo "index.php?function=delete&id=".$id."&table=".$table;

}
function outline($id,$function){
	echo "index.php?function=".$function."&id=".$id;

}
function material($id,$function){
	echo "index.php?function=".$function."&id=".$id;

}
function exam($id,$function,$enrollment_id){
	echo "index.php?function=".$function."&id=".$id."&enrollment_id=".$enrollment_id;

}
function question($id,$function){
	echo "index.php?function=".$function."&id=".$id;

}
function answer_sheets($section_id,$function){
	echo "index.php?function=".$function."&section_id=".$section_id;

}
function publish_on($id,$exam_id){
	echo "index.php?function=publish_on&id=".$id."&exam_id=".$exam_id;

}
function publish_off($id,$exam_id){
	echo "index.php?function=publish_off&id=".$id."&exam_id=".$exam_id;

}
function join_exam($id,$function,$enrollment_id){
	echo "index.php?function=".$function."&id=".$id."&enrollment_id=".$enrollment_id;

}
function answer_sheet($exam_id,$enrollment_id){
	echo "index.php?function=answer_sheet&id=".$exam_id."&enrollment_id=".$enrollment_id;

}
function enroll($section_id,$student_id){
	echo "index.php?function=enroll_course&section_id=".$section_id."&student_id=".$student_id;

}

function check_session(){	
	if(!isset($_SESSION['password']))
	{
		location("home");
	}
}
function dashboard(){
	echo "index.php?function=".$_SESSION['role']."_dashboard";
}
function route($function_name){
	echo "index.php?function=".$function_name;
}
function location($function_name){
	echo "<script>location='index.php?function=".$function_name."'</script>";
	
}
function getURL($page_name){
		return 'view/'.$page_name.'.php';
}

function add_css_framework($css_framework){
	return "assets/".$css_framework."/css/bootstrap.min.css";
}
function add_css_framework_js($css_framework_js){
	return "assets/".$css_framework_js."/js/bootstrap.bundle.min.js";
}

function convertNumberToWord($num = false)
{
    $num = str_replace(array(',', ' '), '' , trim($num));
    if(! $num) {
        return false;
    }
    $num = (int) $num;
    $words = array();
    $list1 = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven',
        'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
    );
    $list2 = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred');
    $list3 = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
        'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
        'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
    );
    $num_length = strlen($num);
    $levels = (int) (($num_length + 2) / 3);
    $max_length = $levels * 3;
    $num = substr('00' . $num, -$max_length);
    $num_levels = str_split($num, 3);
    for ($i = 0; $i < count($num_levels); $i++) {
        $levels--;
        $hundreds = (int) ($num_levels[$i] / 100);
        $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ' ' : '');
        $tens = (int) ($num_levels[$i] % 100);
        $singles = '';
        if ( $tens < 20 ) {
            $tens = ($tens ? ' ' . $list1[$tens] . ' ' : '' );
        } else {
            $tens = (int)($tens / 10);
            $tens = ' ' . $list2[$tens] . ' ';
            $singles = (int) ($num_levels[$i] % 10);
            $singles = ' ' . $list1[$singles] . ' ';
        }
        $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_levels[$i] ) ) ? ' ' . $list3[$levels] . ' ' : '' );
    } //end for loop
    $commas = count($words);
    if ($commas > 1) {
        $commas = $commas - 1;
    }
    return implode(' ', $words);
}