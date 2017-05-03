
    <div class="jumbotron">
      <div class="container">
        <h1 class="text-center">Welcome to BlueCloud Blog</h1>
        
        <p class="text-center">
      	  &middot;This is an sample blog built using BlueCloud PHP MVC &middot;
       </p>
        
      </div>
    </div>


    <div class="container blog-container">
    	<div class="row">

         <?php

          if($success_message):

            echo "<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>".$success_message."</div>";

          endif;

        ?>
    		<div class="col-md-12">

    			<?php foreach($blogs as $blog):?>
    			<h1 class="text-center"><?php echo hspec_chars($blog['title']); ?></h1>

          <div id="controls" class="text-center">

              <a href="<?php echo base_url()."blog/edit-blog/".hspec_chars($blog['title_slug']); ?>" title="Edit <?php echo hspec_chars($blog['title']); ?>"><i class="fa fa-edit"></i></a>

              <a href="<?php echo base_url()."blog/delete-blog/".hspec_chars($blog['title_slug']); ?>" title="Delete <?php echo hspec_chars($blog['title']); ?>"><i class="fa fa-trash"></i></a>

          </div>

    			<div class=""><p style="text-align: justify;"><?php echo $blog['contents'];?></p></div>
    			<?php endforeach; ?>
    		</div>
    	</div>
    </div>