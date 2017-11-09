<div class="container">
    
    <!--  display the error from uploading file -->
    <?php if(isset($error)) : echo $error; endif;?>
    
    
    <!--  display the success message creating post -->
    <?php if(isset($successs)) : echo "<div class='alert alert-success'>" . $successs . "</div>" ; endif;?>
    
    <!-- display the success message uploading file  -->
    <?php if(isset($data)) : echo $data; endif;?>
    
    <!-- display the form validation if there is error  -->
    <?php if (validation_errors()) : ?>
        <div class="col-md-12">
                <div class="alert alert-danger" role="alert">
                        <?= validation_errors() ?>
                </div>
        </div>
    <?php endif; ?>
    
    <a href="<?= base_url() ?>home">Home Page</a>
    <h2>Create Post</h2>
    <?php echo form_open_multipart('/insertpost');?>
        <div class="form-group">

            <input type="text" name="post-title" class="post-title form-control" placeholder="Post Title"/>

        </div>

        <div class="form-group">

            <textarea  name="post-body" class="post-body form-control" placeholder="Post Body"></textarea>

        </div>
        
        <div class="display_image_div">
            
        </div>
        <input type="file" name="post-image" class="post-image" /><br /><br />
        <button  type="button" class="post-image-btn btn btn-default" name="post-image-btn">Upload Image</button>
        
        
        
        <br /><br /><br />
        <div class="form-group">

            <input  type="submit" class="post-submit btn btn-primary" />

        </div>
    </form>
    
    
</div>