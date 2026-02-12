<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact Us | Employee Task Management System</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- COMMON CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">

    <style>
        body{
            font-family:'Work Sans',sans-serif;
            background:#f4f7fb;
        }

        /* ===== HERO ===== */
        .contact-hero{
            background:
            linear-gradient(rgba(15,15,16,0.65),rgba(15,15,16,0.65)),
            url(images/candidate.jpg) center/cover no-repeat;
            min-height:420px;
            display:flex;
            align-items:center;
            text-align:center;
            color:#fff;
        }
        .contact-hero h1{
            font-size:48px;
            font-weight:800;
        }
        .contact-hero p{
            font-size:17px;
            margin-top:12px;
            color:#ddd;
        }

        /* ===== SECTION ===== */
        .section{
            padding:90px 0;
        }

        /* ===== CONTACT INFO ===== */
        .contact-info{
            background:#0f172a;
            color:#fff;
            padding:45px;
            border-radius:16px;
            box-shadow:0 20px 45px rgba(0,0,0,0.2);
            height:100%;
        }
        .contact-info h3{
            font-weight:800;
            margin-bottom:30px;
        }
        .contact-item{
            display:flex;
            align-items:center;
            margin-bottom:22px;
            font-size:15px;
        }
        .contact-item i{
            font-size:20px;
            color:#23B684;
            width:35px;
        }
        .contact-item a{
            color:#fff;
            text-decoration:none;
        }
        .contact-item a:hover{
            text-decoration:underline;
        }

        /* ===== FORM ===== */
        .contact-form{
            background:#fff;
            padding:50px;
            border-radius:18px;
            box-shadow:0 25px 60px rgba(0,0,0,0.08);
        }
        .contact-form h3{
            font-weight:800;
            margin-bottom:25px;
        }
        .contact-form input,
        .contact-form textarea{
            width:100%;
            padding:14px 16px;
            border-radius:10px;
            border:1px solid #ddd;
            margin-bottom:18px;
            font-size:15px;
        }
        .contact-form textarea{
            resize:none;
            height:140px;
        }
        .contact-form button{
            background:#23B684;
            color:#fff;
            border:none;
            padding:14px 40px;
            border-radius:30px;
            font-size:16px;
            font-weight:600;
            transition:.3s;
        }
        .contact-form button:hover{
            background:#1ea06f;
        }

        @media(max-width:768px){
            .contact-hero h1{font-size:32px;}
        }
    </style>
</head>

<body>

<?php include('includes/header.php'); ?>

<!-- HERO -->
<div class="contact-hero">
    <div class="container">
        <h1>Contact Us</h1>
        <p>We’d love to hear from you</p>
    </div>
</div>

<!-- CONTACT SECTION -->
<div class="section">
    <div class="container">
        <div class="row">

            <!-- CONTACT INFO -->
            <div class="col-md-4">
                <div class="contact-info">
                    <h3>Contact Information</h3>

                    <div class="contact-item">
                        <i class="fa fa-phone"></i>
                        <a href="tel:+919155825629">+91 91558 25629</a>
                    </div>

                    <div class="contact-item">
                        <i class="fa fa-envelope"></i>
                        <a href="mailto:rayaadarsh528@gmail.com">
                            rayaadarsh528@gmail.com
                        </a>
                    </div>

                    <div class="contact-item">
                        <i class="fa fa-map-marker"></i>
                        Patna, Bihar, India
                    </div>
                </div>
            </div>

            <!-- CONTACT FORM -->
            <div class="col-md-8">
                <div class="contact-form">
                    <h3>Send Message</h3>

                    <form method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="name" placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" placeholder="Your Email" required>
                            </div>
                        </div>

                        <input type="text" name="purpose" placeholder="Purpose (Support / Query)" required>

                        <textarea name="message" placeholder="Write your message..." required></textarea>

                        <button type="submit">Send Message</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>

<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.js"></script>

</body>
</html>
