<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Social Media</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
      color: #333;
    }

    .container {
      padding-top: 50px;
      animation: meals-appear 1s ease-out forwards;
    }

    .social-section {
      text-align: center;
      padding-bottom: 50px;
      animation: slide-down 300ms ease-out forwards;
    }

    .section-title {
      font-size: 36px;
      font-weight: bold;
      margin-bottom: 30px;
      color: rgb(255, 136, 0);
    }

    .social-links {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-wrap: wrap;
      gap: 20px;
    }

    .social-card {
      text-align: center;
      width: 200px;
      height: 250px;
      /* Adjusted height */
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.2);
      background-color: #fff;
    }

    .social-card img {
      max-width: 120px;
      /* Increased image size */
      max-height: 120px;
      /* Increased image size */
      border-radius: 50%;
      margin-bottom: 15px;
    }

    .social-card p {
      font-size: 14px;
    }

    @keyframes slide-down {
      from {
        opacity: 0;
        transform: translateY(-3rem)
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes meals-appear {
      from {
        opacity: 0;
        transform: translateY(3rem);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>

<body>
  <!-- navbar start -->
  <?php include 'navbar.php'; ?>
  <!-- navbar finish  -->
  <div class="container">
    <div class="social-section">
      <h2 class="section-title">Follow Us on Social Media</h2>
    </div>

    <div class="social-links">
      <div class="social-card">
        <a href="#" title="Facebook"><img src="images\f.png" alt="Facebook"></a>
        <p>Connect with us on Facebook for the latest updates and news.</p>
      </div>
      <div class="social-card">
        <a href="#" title="Twitter"><img src="images\t.png" alt="Twitter"></a>
        <p>Follow us on Twitter to stay informed and engaged.</p>
      </div>
      <div class="social-card">
        <a href="#" title="Instagram"><img src="images\i.png" alt="Instagram"></a>
        <p>Join our Instagram community for behind-the-scenes content.</p>
      </div>
      <div class="social-card">
        <a href="#" title="LinkedIn"><img src="images\l.png" alt="LinkedIn"></a>
        <p>Connect with us professionally on LinkedIn.</p>
      </div>
      <div class="social-card">
        <a href="#" title="YouTube"><img src="images\y.png" alt="YouTube"></a>
        <p>Subscribe to our YouTube channel for video updates and tutorials.</p>
      </div>
      <!-- Add more social media icons and descriptions as needed -->
    </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>