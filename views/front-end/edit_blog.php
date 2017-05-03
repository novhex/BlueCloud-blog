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
    		<div class="col-md-12">

    		<?php 

    			if($errors):

    				echo "<div class='alert alert-danger'>";

    				echo " <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
    				
    				foreach($errors as $err):

    					echo $err;

    				endforeach;

    				echo "</div>";

    			endif;

                
                
    		 ?>


    			<form method="POST" action="<?php echo base_url()."blog/update-blog"; ?>">

                    <div class="form-group">
                        <input type="hidden" name="csrf_token" value="<?php echo create_token();?>" />
                    </div>

                <?php foreach($selected_blog as $blog): ?>

                    <div style="display:none;">
                        <input type="text" name="blog_id" value="<?php echo hspec_chars($blog['id']); ?>" />
                    </div>


                    <div style="display:none;">
                        <input type="text" name="blog_slug" value="<?php echo hspec_chars($blog['title_slug']); ?>" />
                    </div>

    				<div class="form-group">
    					<label for="blog_title">Blog Title : </label>
    					<input type="text" name="blog_title" class="form-control" value="<?php echo hspec_chars($blog['title']); ?>" />
    				</div>

    				 <div class="form-group">
    					<label for="blog_title">Contents : </label>
    					<textarea name="blog_contents" class="form-control" rows="5"><?php echo hspec_chars($blog['contents']); ?></textarea>
    				</div>

    				<div class="form-group">
    					<button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Update Blog </button>
                        <a href="<?php echo base_url(); ?>" class="btn btn-info"><i class="fa fa-times"></i> Cancel</a>
    				</div>

                <?php endforeach; ?>

    			</form>
    		</div>
    	</div>
    </div>