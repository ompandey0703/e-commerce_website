<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Contact Us</title>
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
    }

    .contact-section {
      text-align: center;
      padding-bottom: 50px;
      animation: slide-down 300ms ease-out forwards;
    }

    .section-title {
      font-size: 36px;
      font-weight: bold;
      margin-bottom: 30px;
      color: #E91E63;
    }

    .contact-info {
      background-color: #ff4c68;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      animation: meals-appear 1s ease-out forwards;
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

    .info-item {
      margin-bottom: 20px;
    }

    .info-item h3 {
      margin-bottom: 10px;
      color: white;
    }

    .info-item p {
      color: white;
    }

    .creative-content {
      margin-top: 20px;
      text-align: center;
      animation: slide-down 300ms ease-out forwards;
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

    .creative-content img {
      max-width: 100%;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    }

    .creative-content p {
      margin-top: 20px;
      font-style: italic;
    }
  </style>
</head>

<body>
  <!-- navbar start -->
  <?php include 'navbar.php'; ?>
  <!-- navbar finish  -->
  <div class="container">
    <div class="contact-section">
      <h2 class="section-title">Contact Us</h2>
    </div>

    <div class="row">
      <div class="col-md-6 contact-info">
        <div class="info-item">
          <h3>Emails</h3>
          <p>Admin 1: admin1@example.com</p>
          <p>Admin 2: admin2@example.com</p>
        </div>
        <div class="info-item">
          <h3>Help Line</h3>
          <p>Toll-Free: 1-800-123-4567</p>
        </div>
      </div>
      <div class="col-md-6 creative-content">
        <img src="human\m3.png" alt="Creative Image" style="height: 20rem;">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>