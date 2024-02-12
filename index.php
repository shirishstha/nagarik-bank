<?php
   include'header.html';  
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="design.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
         
         .mainbg img{
            height:720px;
            width:100%;
        } 
        

        .msg_box{
            height: 147px;
            width: 420px;
           
            position: relative;
            top: 227px;
            left: 129px;
        }
        .msg_box h1{
            font-family: Garamond, serif;
            font-size:40px;
            font-weight:450;
        }

        
        
        .slideshow-container {
            width: 40%;
            margin: 30px auto;
            position: relative;
            overflow: hidden;
            bottom: 54px;
            left: 300px;
        }
        
        .mySlides {
            display: none;
        }
        
        .slideshow-container  img {
            width: 100%; 
            height: auto;
        }
        
      
    .fade {
      animation-name: fade;
      animation-duration: 1.5s;
    }

    @keyframes fade {
      from {
        opacity: .4
      }

      to {
        opacity: 1
      }
      
    }
    .msg_box span{
        color:rgb(7, 255, 48);
        font-size:30px;
      }
      .signup_btn{
        left: 123px;
        margin-top: 145px;
        position: absolute;
        right: 50px;
        top: 26px;
        height: 29px;
        width: 75px;
        background-color:rgb(7, 255, 48);
        align-items: center;
        display: flex;
        justify-content: center;
        border-radius: 5px;
        color:white;
      }
      .signup_btn a{
        color:black;
      }
      .signup_btn a:hover{
        color:white;
      }

    </style>
</head>
<body>
    <div class="mainbg">
        <img src="materials/bank.jpg" alt="mainbg">
    </div>
    <div class="msg_box">
        <h1>Searching for a trustworthy bank?</h1>
        <div class="msg">
            <span>Nagarik Bank</span>  is here to provide you a secure transaction along with best services. <br><br> <br> Not a customer?
            <div class="signup_btn">
          <a href="customer/newaccount.html">Sign up</a>
       </div>
        </div>

    </div>
    <div class="slideshow-container">
        <div class="mySlides fade">
            <img src="materials/slide_1.jpg" alt="Slide 1">
        </div>
        <div class="mySlides fade">
            <img src="materials/slide_2.jpg" alt="Slide 2">
        </div>
        <div class="mySlides fade">
            <img src="materials/slide_3.jpg" alt="Slide 3">
        </div>
        <div class="mySlides fade">
            <img src="materials/slide_4.jpg" alt="Slide 4">
        </div>
    </div>

    <script>
        let slideIndex = 0;
        showSlides();
      
        function showSlides() {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) { slideIndex = 1 }
            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlides, 3000); 
        }
    </script>
</body>
</html>


<?php
  include'footer.html';
?>