$(document).ready(function(){
   
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
      $.ajax({

          url  : "http://localhost/projects/Blog_2/displayimage",
          type : "POST",
          data: data,
          contentType: false,
          processData: false,
          success :function(data){
            
            $(".display_image_div").css("display","block");
            $(".display_image_div").html("<img class='displayed_image' src='"+ data +"' />");
            console.log("Data" + data);

          },
          error:function(error){

              console.log(error);
          }


      });
      
       
       
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
       
        $.ajax({

          url  : "http://localhost/projects/Blog_2/insertcommant",
          type : "POST",
          data: data,
          contentType: false,
          processData: false,
          success :function(data){
            
                $(".write-comment input").val("");
                
                alert("Comment has been written successfuly");
          },
          error:function(error){

              console.log("error" + error);
          }


          });
        }
       
       
   });
    
});
