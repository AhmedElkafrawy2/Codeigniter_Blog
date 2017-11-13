$(document).ready(function(){
   
   
   // ajax request function
   function sendajax(url,data,success){
          $.ajax({

          url  : url,
          type : "POST",
          data: data,
          contentType: false,
          processData: false,
          success :function(response){
            
            
            success(response);

          },
          error:function(error){

              console.log(error);
          }


      });
   }
   
   // success function of displaying image after select intp create post page
   
   function displayimagepost(){
       $(".display_image_div").css("display","block");
            $(".display_image_div").html("<img class='displayed_image' src='"+ data +"' />");
            
            
   }
   
   // success function of send comment 
   function commentinsertsuccess(){
                   
     $(".write-comment input").val("");
     alert("Comment has been written successfuly");
   }
   
   // click on input file create post when click on btn default
   $(".post-image-btn").on("click",function(){
      
       $(".post-image").click();
   });
   
   // click on button upload image make ajax to display choossed image
   
   $(".post-image").on("change",function(e){
      
      var files = e.target.files;
      var data = new FormData();
      
      $.each(files,function(k,v){
         
          data.append("image",v);
         
      });
      
      // make ajax request to display the image
      
      sendajax("http://localhost/projects/Blog_2/displayimage",data,displayimagepost);
       
       
   });
   
   
   // click on comment input
   
   $(".write-comment input").on("keydown" , function(event){
      
       
       var comment_input = $(this);
        var key = event.keyCode || event.which
        if(key == 13){
            
        var data = new FormData();
        
        // get post id 
        
        var post_id = $(this).attr("post_id");
        data.append("comment" , $(this).val());
        data.append("post_id" , post_id);
     
          sendajax("http://localhost/projects/Blog_2/insertcommant",data,commentinsertsuccess);
        }
       
       
   });

    // click on like post
    var spanselected;
    $(".like-post").on("click",function(e){
       
        e.preventDefault();
        spanselected = $(this);
        var is_like = $(this).attr("is_like");
        var last = $(this).parent().parent().first().find(".last");
        
        
        var postId = $(this).attr("post_id_like");
        
        var data = new FormData();
        data.append("post_id",postId);
        data.append("is_like",is_like);

        $.ajax({

          url  : "http://localhost/projects/Blog_2/likepost",
          type : "POST",
          data: data,
          contentType: false,
          processData: false,
          success :function(response){
              
              if(response == "Like"){
                  
                  spanselected.attr("is_like","Dislike");
                  spanselected.html("Dislike");
                  
                  var ht = last.html();
                  var num = parseInt(ht);
                  
                  last.html(num+1);
                  
                  alert("You Now Like This Page");
                  
              }else{
                  
                  spanselected.attr("is_like","Like");
                  spanselected.html("Like");
                  var ht = last.html();
                  var num = parseInt(ht);
                  
                  last.html(num-1);
                  alert("You Now Dislike This Page");
              }

          },
          error:function(error){

              console.log("error " +error);
          }


      });
      
        
    });
});
