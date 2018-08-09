<?php
session_start();
include('DB.php');


$token= md5(uniqid(rand()));
$_SESSION['csrf_token'] = $token ;


if (isset($_GET['show']))
{
    $user_code = $_GET['show'];


    $selectCodeQuery = $pdo->prepare("SELECT * FROM `links` WHERE createdurl = '$user_code'");
    $selectCodeQuery->execute();
    $selectCode = $selectCodeQuery->fetch(PDO::FETCH_ASSOC);

    $androidCode = $selectCode["androidmedia"];
    $iosmedia = $selectCode["iosmedia"];
    $webmdeia = $selectCode["webmdeia"];


// devices define

    $iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
    $iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
    $iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
    $Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android");

    if( $iPod || $iPhone ){
        $iosLink = "instagram://media?id=" . $iosmedia;
        header("Location: $iosLink");

    }
    else if($Android){
        header("Location: instagram://media?id={$webmdeia}");
    }
    else{
        header("Location: https://www.instagram.com/p/{$androidCode}");




    }


}

?>
<!DOCTYPE html>
<html lang="en">
  <head>


      <title>دیپ لینک اینستاگرام</title>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
      <script src="https://www.google.com/recaptcha/api.js"></script>



<meta property="og:image" content="http://mykeyboard.ir/lab/deepURL/img/01.jpg" />
<meta property="og:image:width" content="822" />
<meta property="og:image:height" content="522" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:description" content="
دیپ لینک اینستاگرام به شما این امکان را می‌دهد که لینک‌هایی هوشمند از پست‌های اینستارگرام خود برای اشتراک‌گذاری تولید کنید. این لینک‌های هوشمند در صورتی‌که تلفن‌همراه (با سیستم عامل اندروید یا IOS) اگر باز شوند، اپلیکیشن اینستاگرام را اجرا می‌کنند. باز شدن اپلیکیشن به‌جای اجرای مرورگر باعث زیاد شدن نرخ تبدیل (Conversion Rate) پست‌های شما در اینستاگرام می‌گردد. همین حالا به‌صورت رایگان امتحان کنید.

" />
<meta name="twitter:title" content="با دیپ لینک اینستاگرام می‌توانید لینک‌های خود را هوشمند کنید تا به‌جای مرورگر در اپلیکیشن باز شوند" />
<meta name="twitter:image" content="http://mykeyboard.ir/lab/deepURL/img/01.jpg" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">





  </head>
  <body>


    <div class="container">

      <div class="row">


      <div class="col-md-12 col-xs-12 headline">




        <h2>
دیپ لینک اینستاگرام

        </h2>

<br>
          <div class="alalert alert-primary" id="divToUpdate">

          </div>

        <p class="headtext">

دیپ لینک اینستاگرام به شما این امکان را می‌دهد که لینک‌هایی هوشمند از پست‌های اینستارگرام خود برای اشتراک‌گذاری تولید کنید. این لینک‌های هوشمند در صورتی‌که تلفن‌همراه (با سیستم عامل اندروید یا IOS) اگر باز شوند، اپلیکیشن اینستاگرام را اجرا می‌کنند. باز شدن اپلیکیشن به‌جای اجرای مرورگر باعث زیاد شدن نرخ تبدیل (Conversion Rate) پست‌های شما در اینستاگرام می‌گردد. همین حالا به‌صورت رایگان امتحان کنید.


        </p>
          <div class="center">
            <span id="ta10mehr">
همین حالا شروع کنید

</span>

            <span id="freeUse">
آدرس هوشمند داشته باشید
            </span>


            <div class="col-md-6 centerdiv">

            <form id="myForm" action="crwaling.php" method="post">


	<input type="hidden" value="<?php echo $token ; ?>" name="csrf_token" />



           



              <div class="form-group">
                <label for="exampleInputEmail1">
آدرس پست اینستاگرامی
 |



   <!-- Button trigger modal -->
                                <a href="" data-toggle="modal" data-target="#exampleModal">
                                    چطوری آدرس پست رو به‌دست بیاریم؟
                                </a>

                                <!-- Modal -->
                                <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">به دست آوردن آدرس پست اینستاگرام</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">


                                                <div align="center" class="embed-responsive embed-responsive-16by9">
                                                    <video controls loop class="embed-responsive-item">
                                                        <source src="img/video.mov" type="video/mp4">
                                                    </video>
                                                </div>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                </label>
                <input type="text" name="instalink" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="https://www.instagram.com/p/BfdatWjDO5d/" required="" oninvalid="this.setCustomValidity('خب اینو که پر نکردی')"
 oninput="setCustomValidity('')"></input>



              </div>

                <div class="form-group">
                    <div class="g-recaptcha" data-sitekey="6LefoE4UAAAAAJcSXHU2wuEa3Wu_FforQ_qsFz3K"></div>

                </div>





              <button type="submit" name="submit" class="sendbtn btn btn-primary">
                <i id="animbtn" style="font-size:24px"></i>

                  بزن بریم

              </button>


            </form>

          </div>




        </div>
      </div>

    </div>

  </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <script src="js/jquery.js"></script>
    <script src="js/jquery.form.js"></script>

   <script>
        // wait for the DOM to be loaded
        $(document).ready(function() {


            // bind 'myForm' and provide a simple callback function
            var options = {
                target:     '#divToUpdate',
                url:        'crwaling.php',
                beforeSubmit: function(arr, $form, options) {


    $(':button[type="submit"]').prop('disabled', true);
    $('#animbtn').addClass("fa fa-spinner fa-spin");




},
                clearForm: true,
                resetForm: true,
                success: showResponse
            };
            $('#myForm').ajaxForm(options);



        });


        function showResponse(responseText, statusText, xhr, $form)  {
          grecaptcha.reset();
          $(':button[type="submit"]').prop('disabled', false);
          $('#animbtn').removeClass("fa fa-spinner fa-spin");

        }




    </script>

  </body>
</html>
