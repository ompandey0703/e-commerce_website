<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Chat Us</title>
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

    .about-section {
      text-align: center;
      padding-bottom: 50px;
    }

    .section-title {
      font-size: 36px;
      font-weight: bold;
      margin-bottom: 30px;
      color: #E91E63;
    }

    .section-description {
      font-size: 18px;
      margin-bottom: 30px;
      color: #555;
    }

    .team-section {
      text-align: center;
      padding: 50px 0;
      background-color: #E0E0E0;
    }

    .team-member {
      margin-bottom: 30px;
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .team-member img {
      max-width: 150px;
      border-radius: 50%;
      box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.2);
    }

    .team-member h3 {
      font-size: 24px;
      margin-top: 20px;
      color: #333;
    }

    .team-member p {
      font-size: 16px;
      color: #555;
    }

    .team-member {
      height: 100%;
      border: 5px solid rgba(0, 0, 0, 0.4);
    }
  </style>
</head>

<body>
  <!-- navbar start -->
  <?php include 'navbar.php'; ?>
  <!-- navbar finish  -->
  <div class="container">
    <div class="about-section">
      <h2 class="section-title">FAQs</h2>
      <div id="question-container" style="font-size: large;"></div>
    </div>
    <br />
    <br />

    <div class="team-section">
      <div class="row">
        <div class="col-md-4">
          <div class="team-member">
            <img src="images/Chatbot.jpg" alt="BOT 1">
            <h3>Replying ....</h3>
            <div id="answer-container"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>