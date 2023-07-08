<div class="container-fluid">
   <!-- Page Heading -->
   <br>
   <center>
   <h1 class="h3 mb-2 text-gray-800">Resident List</h1></center>
   <p class="mb-4">
    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<a class="btn btn-primary" href="<?= base_url('index.php/dashboard/add-resident') ?>"> Add Resident </a>
   </p>
   <!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">List</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Full Name</th>
      <th scope="col">Address</th>
      <th scope="col">Sex</th>
      <th scope="col">Birth Date</th>
      <th scope="col">Birth Place</th>
      <th scope="col">Contact</th>
      <th scope="col">Nationality</th>
      <th scope="col">Civil Status</th>
      <th scope="col">Religion</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($resident_list as $resident):?>
    <tr>
      <th scope="row"><?= $resident->resident_id ?></th>
      <td> <?= $resident->first_name ?> <?= $resident->middle_name ?> <?= $resident->last_name ?></td>
      <td><?= $resident->purok ?>, <?= $resident->streetname ?>, <?= $resident->barangay ?></td>
      <td><?= $resident->sex ?></td>
      <td><?= $resident->birth_date ?></td>
      <td><?= $resident->birth_place?></td>
      <td><?= $resident->contact ?></td>
      <td><?= $resident->nationality ?></td>
      <td><?= $resident->civil_status ?></td>
      <td><?= $resident->religion ?></td>
      <td> 
      <!--  <a class='btn btn-warning btn-sm' href="<?php echo base_url('index.php/dashboard/update-resident/'.$resident->resident_id); ?>">Edit</a> -->
      <button type="button" class="btn btn-primary edit-resident-btn" data-resident="<?= $resident->resident_id ?>">
                           Edit
                        </button>
        <a class="btn btn-danger btn-sm" href="<?= base_url('index.php/dashboard/delete-resident/'.$resident->resident_id); ?>" >Delete</a>
    </td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>
</div>
      </div>
   </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<script>

   /* AJAX  */

    $(document).on('click','.edit-resident-btn',function(){

      var residentId = this.dataset.resident;

      $.ajax({
          url:'<?= base_url('index.php/dashboard/ajax-update-resident-form') ?>',
          method:'POST',
          data:{
            resident_id: residentId
          },
          success:function(response){
         
                bootbox.dialog({
                  title: 'Edit Resident',
                  message:' ',
                  size: 'extra-large'
                }).find('.bootbox-body').html(response);
          }

        });

    });

    $(document).on('click','.delete-official-btn',function(e){

      var officialId = this.dataset.official;

      bootbox.confirm('Are you sure you want to delete this official',function(answer){

            if(answer==true){

               window.location = '<?= base_url('index.php/dashboard/delete-officials/') ?>'+officialId;
               
            }

      });


   });

    

</script>
