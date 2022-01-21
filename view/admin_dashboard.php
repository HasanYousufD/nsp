<h1 class="text-center bg-info">Admin Dashboard</h1>
<div class="mx-3 px-3">
    <?php back(); ?>
    <a href="<?php route('home');?>"><button type="button" class="btn btn-warning my-3 mx-3">Home</button></a>
    
    <a href="<?php route('create_course');?>"><button type="button" class="btn btn-warning my-3 mx-3">CREATE COURSE</button></a>
    <a href="<?php route('manage_student');?>"><button type="button" class="btn btn-warning my-3 mx-3">MANAGE STUDENT</button></a>
    <a href="<?php route('create_department');?>"><button type="button" class="btn btn-warning my-3 mx-3">CREATE DEPARTMENT</button></a>
    <a href="<?php route('check_department');?>"><button type="button" class="btn btn-warning my-3 mx-3">CHECK DEPARTMENT</button></a>
    <a href="<?php route('create_semester');?>"><button type="button" class="btn btn-warning my-3 mx-3">CREATE SEMESTER</button></a>
    <a href="<?php route('check_semester');?>"><button type="button" class="btn btn-warning my-3 mx-3">CHECK SEMESTER</button></a>
    <a href="<?php route('create_batch');?>"><button type="button" class="btn btn-warning my-3 mx-3">CREATE BATCH</button></a>
    <a href="<?php route('check_batch');?>"><button type="button" class="btn btn-warning my-3 mx-3">CHECK BATCH</button></a>
    <a href="<?php route('assign_course_to_teacher1');?>"><button type="button" class="btn btn-warning my-3 mx-3">ASSIGN COURSE TO TEACHER</button></a>
    <a href="<?php route('check_assigned_course_of_teacher1');?>"><button type="button" class="btn btn-warning my-3 mx-3">CHECK ASSIGNED COURSE OF TEACHER</button></a>
</div>