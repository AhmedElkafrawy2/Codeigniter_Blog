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
                               <li><a href="about.html">Profile</a></li>
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
                                    <div class="post-title">
                                      <a href="single.html"><h1><?= $post->post_title ?></h1></a> 
                                    </div>  
                                    <div class="post-info">
                                    	<span><?= $post->post_date ?> By 
                                            <a href="#" target="_blank">
                                            <?php echo $this->post_model->getpostnamefromid($post->user_id) ?>
                                            </a>
                                        </span>
                                    </div>  
                                    <p><?= $post->post_body ?></p> 
                                    <?php if($post->post_image !== ""){ ?>
                                    <img src="<?= $post->post_image  ?>" class="image-post" />
                                    <?php } ?>
                                    <a href="single.html" class="button button-style button-anim fa fa-long-arrow-right"><span>Read More</span></a>
                                </div>
                                <!-- Blog Post End -->
                                <?php } ?>
                                
                                
                                <div class="col-md-12 text-center">
                                 <a href="javascript:void(0)" id="load-more-post" class="load-more-button">Load</a>
                                 <div id="post-end-message"></div>
                                </div>
                                
                             </div>
                              
                         </div>
                         
                        

                           
                         </div>
                     
                     
                       <!-- Footer Start -->
                       <div class="col-md-12 page-body margin-top-50 footer">
                          <footer>
                             <ul class="menu-link">
                               <li><a href="index.html">Create Post</a></li>
                               <li><a href="about.html">Go To Profile Page</a></li>
                               <li><a href="work.html">Log Out</a></li>
                               
                             </ul>
                            
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

