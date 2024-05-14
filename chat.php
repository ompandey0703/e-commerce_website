<?php
require 'vendor/autoload.php';
$mongoClient = new MongoDB\Client("mongodb://localhost:27017");
$database = $mongoClient->olxlist;
$collection = $database->chatbox;
// Fetch all questions
$questionsCursor = $collection->find([], ['projection' => ['question' => 1]]);
$questions = [];
foreach ($questionsCursor as $document) {
  $questions[] = $document->question;
}

// Fetch all answers
$answersCursor = $collection->find([], ['projection' => ['answer' => 1]]);
$answers = [];
foreach ($answersCursor as $document) {
  $answers[] = $document->answer;
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>TradeHUB Chat</title>
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
      animation: slide-down 300ms ease-out forwards;
    }

    .section-title {
      font-size: 36px;
      font-weight: bold;
      margin-bottom: 30px;
      color: #E91E63;
    }

    #question-container {
      font-size: 18px;
      margin-bottom: 30px;
      color: #555;
    }

    .team-section {
      text-align: center;
      padding: 50px 0;
      background-color: #ff4c68;
      animation: meals-appear 1s ease-out forwards;
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


    .team-member {
      height: 100%;
      border: 5px solid rgba(0, 0, 0, 0.4);
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
  <script>
    function displayQuestions() {
      var questions = <?php echo json_encode($questions); ?>;
      var questionContainer = document.getElementById("question-container");

      // Display each question
      questions.forEach(function(question, index) {
        var questionElement = document.createElement("div");
        questionElement.innerHTML = question;
        questionElement.addEventListener("click", function() {
          displayAnswer(index);
        });
        questionContainer.appendChild(questionElement);
      });
    }

    function displayAnswer(index) {
      var answers = <?php echo json_encode($answers); ?>;
      var answerContainer = document.getElementById("answer-container");
      answerContainer.innerHTML = answers[index];
      answerContainer.style.display = "block";

      // Hide answer after 15 seconds
      setTimeout(function() {
        answerContainer.style.display = "none";
      }, 10000);
    }
  </script>
</head>

<body onload="displayQuestions()">
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
        <div class="col-md-12">
          <div class="team-member">
            <img src="images/Chatbot.jpg" alt="BOT 1">
            <h3>Replying
              <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden"></span>
              </div>
            </h3>
            <div id="answer-container" style="font-weight: 800;"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>