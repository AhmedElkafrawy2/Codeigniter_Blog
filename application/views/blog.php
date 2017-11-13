<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
    <!-- Preloader Start -->
    <div class="preloader">
        <div class="rounder"></div>
    </div>
    <!-- Preloader End -->
    
    <div id="main">
        <div class="container">
            <div class="row">
            	
               
                 
                 <!-- About Me (Left Sidebar) Start -->
                 <div class="col-md-3">
                   <div class="about-fixed">
                    
                     <div class="my-pic">
            
                         <div id="menu"  class="show_menu collapse">
                           <ul class="menu-link">
                               
                               <li><a href="<?= base_url() ?>createpost">Make Post</a></li>
                               <li><a href="<?= base_url() ?>logout">Log Out</a></li>
                            </ul>
                         </div>
                     </div>
                      
                      
                      
                     <div class="my-detail">
                    	
                        <div class="white-spacing">
                            <h1><?php echo $username ?></h1>
                            
                        </div> 
                       
                

                    </div>
                  </div>
                </div>
                <!-- About Me (Left Sidebar) End -->
                
                
                
                
                 
                 <!-- Blog Post (Right Sidebar) Start -->
                 <div class="col-md-9">
                    <div class="col-md-12 page-body">
                    	<div class="row">
                    		
                            
                            <div class="sub-title">
                                <h2>Blog Posts</h2>
                                <a href="contact.html"><i class="icon-envelope"></i></a>
                             </div>
                            
                            
                            <div class="col-md-12 content-page">

                                <?php foreach ($posts as $post){ ?>
                                <!-- Blog Post Start -->
                                <div class="col-md-12 blog-post">
                                    <div class="col-md-12 post-title">
                                      <a href="single.html"><h1><?= $post->post_title ?></h1></a> 
                                    </div>  
                                    <div class="col-md-12 post-info">
                                    	<span><?= $post->post_date ?> By 
                                            <a href="#" target="_blank">
                                            <?php echo $this->post_model->getpostnamefromid($post->user_id) ?>
                                            </a>
                                        </span>
                                    </div>  
                                    <div class="col-md-12 post-body-div">
                                        <p><?= $post->post_body ?></p>
                                    </div>
                                    <?php if($post->post_image !== ""){ ?>
                                    <div class="post-image-home col-md-12">
                                        <img src="<?= $post->post_image  ?>" class="image-post-home" />
                                    </div>
                                    <?php } ?>
                                    <input type="hidden" name="post_id" value="<?= $post->id ?>" />
        
                                </div>
                                <!-- Blog Post End -->
                                
                                <!-- start comment section -->
                                <div class="likes-div col-md-12">
                                    <div class="col-md-12 perviouse-liks">
                                       
                                        <span class="you-like">
                                            Number Of Likes
                                            <?php 
                                            
                                            if($this->blog_model->numberoflikes($post->id) > 0){
                                                
                                                echo "<span class='last'>".$this->blog_model->numberoflikes($post->id)."</span>";
                                            }else{
                                             
                                                echo "<span class='last'>0</span>";
                                                        
                                            }
                                            
                                            ?>
                                            
                                        </span>
                                        
                                    </div>
                                    <div class="like-post-div col-md-12">
                                        <span post_id_like="<?php echo $post->id ?>" is_like="<?php if($this->blog_model->authuserlike($post->id) > 0){ echo "Dislike"; }else{ echo "Like"; } ?>" class="like-post">
                                            <?php if($this->blog_model->authuserlike($post->id) > 0){ ?>
                                            Dislike
                                           <?php }else{?>
                                            Like
                                           <?php } ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-12 comments">
                                    <div class="col-md-12 write-comment">
                                        
                                        
                                        <input type="text" post_id="<?= $post->id ?>" name="write-comment-input" class="write-comment-input form-control" placeholder="write comment" />
                                               
                                    </div>
                                    
                                    <div class="comments-list col-md-12">
                                        
                                       
                                        <ul class="list-of-comments colo-md-12" user_id="<?php $_SESSION['user_id'] ?>">
                                        <?php  
                                
                                        $allcomments = $this->blog_model->getcomments($post->id);
                                      
                                        foreach ($allcomments as $comm){
                                        ?>
                                            <li class="col-md-12">
                                                <span class="col-md-3">
                                                    <?php echo $this->post_model->getpostnamefromid($comm->user_id) ?>
                                                    at <?php echo $comm->date ?>
                                                </span>
                                                <p class="col-md-9"><?php echo $comm->comment ?></p>
                                                   
                                            </li>
                                  <?php } ?>
                                            
                                        </ul>
                                        
                                    </div>
                                </div>
                                     
                                <hr />
                                <?php } ?>
                                
                                <!--
                                <div class="col-md-12 text-center">
                                 <a href="javascript:void(0)" id="load-more-post" class="load-more-button">Load</a>
                                 <div id="post-end-message"></div>
                                </div>
                                -->
                                
                             </div>
                              
                        
                         
                        

                           
                         </div>
                     
                     
                       <!-- Footer Start -->
                       <div class="col-md-12 page-body margin-top-50 footer">
                          <footer>
             
                            
                             <p>© Copyright 2017 Ahmed Elkafrawy</p>
						  
			

                           
                            </footer>
                       </div>
                       <!-- Footer End -->
                     
                     
                  </div>
           
                
            </div>
         </div>
      </div>
    
    
    
    <!-- Back to Top Start -->
    <a href="#" class="scroll-to-top"><i class="fa fa-long-arrow-up"></i></a>
    <!-- Back to Top End -->

