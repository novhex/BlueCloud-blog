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


    			<form method="POST" action="<?php echo base_url()."blog/save-blog"; ?>">

                    <div class="form-group">
                        <input type="hidden" name="csrf_token" value="<?php echo create_token();?>" />
                    </div>

    				<div class="form-group">
    					<label for="blog_title">Blog Title : </label>
    					<input type="text" name="blog_title" class="form-control" value="<?php echo old_value('blog_title'); ?>" />
                        <span class="help-block"><?php echo isset($errors['blog_title']) ? $errors['blog_title']: '';?></span>
    				</div>

    				 <div class="form-group">
    					<label for="blog_title">Contents : </label>
    					<textarea name="blog_contents" class="form-control" rows="5"><?php echo old_value('blog_contents'); ?></textarea>
                        <span class="help-block"><?php echo isset($errors['blog_contents']) ? $errors['blog_contents']: '';?></span>
    				</div>

    				<div class="form-group">
    					<button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Publish </button>
                        <a href="<?php echo base_url(); ?>" class="btn btn-info"><i class="fa fa-times"></i> Cancel</a>
    				</div>

    			</form>
    		</div>
    	</div>
    </div>