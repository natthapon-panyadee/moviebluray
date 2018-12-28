<!DOCTYPE html>
<html lang="en">
<head>
<title>Little Closet</title>
<?php 
    require_once('structure/head.php');
 ?>
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</head>
<body>

<!-- Menu -->

<?php 
    require_once('structure/header.php');
   
 ?>



        <div class="home">
            <!-- Home Slider -->
            <div class="home_slider_container">
              
                    

                <div class="row ">

                    <div class="col-12 col-lg-4 offset-lg-4">

                        <div class="form-group mt-4  ">
                            <label for="exampleInputEmail1" style="color: #0000ff " style="font-family:'Roboto'">MOVIE NAME</label>
                            <input type="text" class="form-control" id="moviename" name="moviename" aria-describedby="emailHelp" placeholder="Insert movie name">

                        </div>

                        
                        <div class="form-group">
                             
                            
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1" style="color: #0000ff ">MOVIE TYPE</label>
                            <input type="text" class="form-control" id="movietype" name="movietype" placeholder="Insert movie type">
                        </div>
                        <div class="form-group">

                            <input type="file" name="movieimage" id="uploadfile" accept="image/x-png,image/gif,image/jpeg"/>
                            <!-- <input type="submit"   /> -->
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" style="color: #0000ff ">PRICE</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="xx.xx BATH">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputPassword1" style="color: #0000ff ">DESCRIPTION</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="Insert description">
                        </div>
                        <br>

                        

                        <div class="form-group mt-4">
                            <div class="col-4 offset-lg-4">
                                <!-- <button id="btn-post" value="upload"  class="btn btn-danger rounded pl-4 pr-4" style="background-color: #2f3638 !important; border-color: #76b6c2">ประกาศ</button> -->
                                    
                            </div>
                        </div>
                        <div align="center">
                                    <button type="submit" class="btn btn-primary btn-lg" id="btn-post" name="Post">ยืนยัน</button>
                                    <button type="submit" class="btn btn-danger btn-lg" name="cancle">ยกเลิก</button>
                                </div>
                        </div>
                    </div>
                
            </div>
        </div>
         

            <br><br>

<script type="text/javascript">
        $('#btn-post').on('click',function(){
            var moviename = $('#moviename').val();
            var movietype = $('#movietype').val();
            var price = $('#price').val();
            var description = $('#description').val();
            

            var formData = new FormData();

            formData.append('moviename',moviename);
            formData.append('movietype',movietype);
            formData.append('price',price);
            formData.append('description',description);


            if($('input#uploadfile')[0].files[0]){
                formData.append('uploadfile', $('input#uploadfile')[0].files[0]);
                formData.append('iuploadfile',1);
            }else{
                formData.append('iuploadfile',0);
            }


        
        $.ajax({
            type: "POST",
            mimeTypes:"multipart/form-data",
            url: "structure/api_upload.php",
            contentType: false,
            processData: false,
            data: formData,
            success: function(data) {
                alert(data);
                // window.location.href = "allwork.php";
            },
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.Message);

            }
        });



    });
</script>

    <?php 
        require_once('structure/footer.php');
     ?>
            
        
        


<script src="js/custom.js"></script>
</body>
</html>