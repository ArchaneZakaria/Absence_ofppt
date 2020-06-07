<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
	    <div class="row mb-2">
          	<div class="col-sm-6">
            	<h1><?=$nameBreadcrumb?></h1>
          	</div>
          	<div class="col-sm-6">
            	<ol class="breadcrumb float-sm-right">
              		<li class="breadcrumb-item"><a href="#" style="<?php if(!$nameBreadcrumb=="Home"){ color:black; }?>">Home</a></li>
              		<?php if($nameBreadcrumb!="Home"): ?>
              			<li class="breadcrumb-item active"><a href=""><?=$nameBreadcrumb?></a></li>
              		<?php endif; ?>
            	</ol>
          	</div>
        </div>
  	</div><!-- /.container-fluid -->
</section>
