<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us | Employee Task Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Puraane CSS se bachne ke liye naye classes */
        body {
            background: #f5f7fb !important;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
        }

        .custom-contact-wrapper {
            margin: 60px 0;
        }

        /* Left Side Design */
        .info-panel {
            background: linear-gradient(135deg, #0f172a, #020617) !important;
            color: #ffffff !important;
            border-radius: 20px;
            padding: 40px;
            height: 100%;
        }

        .info-panel h4 {
            font-weight: 700;
            margin-bottom: 25px;
            color: #fff !important;
        }

        .info-panel p {
            font-size: 16px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .info-panel a {
            color: #22c55e !important;
            text-decoration: none !important;
            margin-left: 10px;
            transition: 0.3s;
        }

        .info-panel a:hover {
            text-decoration: underline !important;
            color: #4ade80 !important;
        }

        /* Right Side Form Design */
        .form-panel {
            background: #ffffff !important;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1) !important;
        }

        .form-panel h4 {
            color: #333 !important;
            font-weight: 700;
            margin-bottom: 20px;
        }

        /* Input Fix: Text visibility and no red lines */
        .form-panel .form-control {
            background-color: #f8fafc !important;
            border: 1px solid #e2e8f0 !important;
            color: #111 !important; /* Text visible black */
            padding: 12px 15px !important;
            border-radius: 10px !important;
            box-shadow: none !important;
        }

        .form-panel .form-control:focus {
            background-color: #fff !important;
            border-color: #22c55e !important;
            box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.1) !important;
        }

        /* Button Center Fix */
        .btn-holder {
            display: flex !important;
            justify-content: center !important;
            margin-top: 20px;
        }

        .custom-btn-send {
            background: #22c55e !important;
            color: white !important;
            border: none !important;
            padding: 14px 60px !important;
            border-radius: 50px !important;
            font-weight: 600 !important;
            font-size: 17px !important;
            cursor: pointer !important;
            transition: 0.3s all !important;
        }

        .custom-btn-send:hover {
            background: #16a34a !important;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(34, 197, 94, 0.3) !important;
        }

        textarea {
            resize: none !important;
        }
    </style>
</head>

<body>

<div class="container custom-contact-wrapper">
    <div class="row g-4 justify-content-center">

        <div class="col-lg-4 col-md-5">
            <div class="info-panel">
                <h4>Contact Information</h4>
                <hr style="opacity: 0.1; background: white;">
                
                <p>
                    <span>📞</span>
                    <a href="tel:+919155825629">+91 91558 25629</a>
                </p>

                <p>
                    <span>📧</span>
                    <a href="mailto:rayaadarsh528@gmail.com">rayaadarsh528@gmail.com</a>
                </p>

                <p>
                    <span>📍</span> 
                    <span style="margin-left:10px;">Patna, Bihar, India</span>
                </p>
            </div>
        </div>

        <div class="col-lg-7 col-md-7">
            <div class="form-panel">
                <h4>Send Message</h4>
                <hr>

                <form action="https://formspree.io/f/xreqpvkr" method="POST">
                    <input type="hidden" name="_subject" value="ETMS New Inquiry">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Full Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Aadarsh Kumar" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="example@mail.com" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Purpose</label>
                        <input type="text" name="purpose" class="form-control" placeholder="Support / Query">
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Your Message</label>
                        <textarea name="message" class="form-control" rows="5" placeholder="Write your message here..." required></textarea>
                    </div>

                    <div class="btn-holder">
                        <button type="submit" class="custom-btn-send">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

</body>
</html>