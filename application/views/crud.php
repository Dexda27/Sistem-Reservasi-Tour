<?= $this->session->flashdata('notif'); ?>
<div class="container">
	
    <?php if ($this->session->userdata("role_id") == "1" || $this->session->userdata("role_id") == "3"  ): ?>
	<div class="col-12 pb-4"> 
        <div class="card"> 
          	<h5 class="card-header py-2">Add new <?= $url ?></h5>
          	<div class="card-body border-top">
        		<div class="row pt-4">
					
        			<?php $this->load->view($form) ;?>

				</div>
			</div>
		</div>
	</div>
    <?php endif ?>

	<div class="col-12 pb-4"> 
        <div class="card"> 
          	<h5 class="card-header py-2"><?= $url ?> list</h5>
          	<div class="card-body border-top">
        		<div class="row px-2">

    				<?php $this->load->view($table) ;?>

				</div>
			</div>
		</div>
	</div>

</div>

<script>
    $(document).ready(function() {
        $('.select2-multiple').select2({
            width: '100%'
        });
    });
</script>

