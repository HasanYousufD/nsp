<h1 class="text-center bg-info">check semester</h1>


<div class="mt-3 mx-auto w-50">

    <table class="table table-success table-striped table-hover table-bordered border-dark ">
      <thead>
        <tr>
          <th scope="col">#sl</th>
          <th scope="col">Semester Name</th>

          <th scope="col" class="text-center" colspan="2">Actions</th>

        </tr>
      </thead>
      <tbody>
        <?php foreach($data as $row){?>
        <tr>
          <th scope="row"><?php echo $row['id'];?></th>
          <td><?php echo $row['semester'];?></td>

       

          <td class="text-center"><a href="<?php delete($row['id'],"semester"); ?>"><button type="button" class="btn btn-danger">Delete</button></a></td>
          

        </tr>
        <?php }?>
      </tbody>
    </table>
</div>