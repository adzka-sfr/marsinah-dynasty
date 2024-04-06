<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link rel="icon" href="data:,">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- jquery -->
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

  <!-- fontawesome -->
  <link href="assets/library/fontawesome/css/fontawesome.css" rel="stylesheet" />
  <link href="assets/library/fontawesome/css/brands.css" rel="stylesheet" />
  <link href="assets/library/fontawesome/css/solid.css" rel="stylesheet" />

  <!-- sweetalert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- style tambahan -->
  <style>
    /* Custom CSS to center the card */
    .centered-card {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="card centered-card" style="width: 30rem;">
          <h4 class="mt-3 mb-3" style="text-align: center;"><i class="fa-brands fa-fort-awesome"></i> Marsinah Dynasty <i class="fa-brands fa-fort-awesome"></i></h4>
          <img src="assets/images/keluarga.jpg" class="card-img-top" alt="login-image">
          <div class="card-body">
            <div class="row">
              <div class="col-12 mb-3">
                <input type="text" class="form-control" placeholder="-" id="answer">
                <span id="error-answer" style="font-size: smaller; color: red; display: none;"><i class="fa-solid fa-circle-info"></i> Silahkan memasukkan jawaban</span>
              </div>
            </div>
            <div class="row">
              <div class="col-12 text-center">
                <button class="btn btn-primary" id="go">Masuk</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      // Define your data
      var question = {
        "quest1": {
          "number": "1",
          "quest": "Siapa nama orang pada foto paling kiri bawah",
          "answer1": "fahmi",
          "answer2": "adzka",
          "answer3": "",
          "answer4": "",
          "answer5": ""
        },
        "quest2": {
          "number": "2",
          "quest": "Siapa nama orang pada foto paling kanan bawah",
          "answer1": "zida",
          "answer2": "",
          "answer3": "",
          "answer4": "",
          "answer5": ""
        },
        "quest3": {
          "number": "3",
          "quest": "Siapa yang paling muda pada foto",
          "answer1": "aqil",
          "answer2": "",
          "answer3": "",
          "answer4": "",
          "answer5": ""
        },
        "quest4": {
          "number": "4",
          "quest": "Siapa nama orang pada foto paling kiri atas",
          "answer1": "latifah",
          "answer2": "bude latif",
          "answer3": "latif",
          "answer4": "",
          "answer5": ""
        },
        "quest5": {
          "number": "5",
          "quest": "Siapa nama anak kecil di tengah tanpa kerudung",
          "answer1": "nilna",
          "answer2": "",
          "answer3": "",
          "answer4": "",
          "answer5": ""
        }
      };

      // Update placeholder on page load
      var keys = Object.keys(question);
      var randomQuestionKey = keys[Math.floor(Math.random() * keys.length)];
      $('#answer').attr('placeholder', question[randomQuestionKey].quest);

      // Button click event handler
      $('#go').click(function() {
        checkAnswer();
      });

      // Key press event handler on input field
      $('#answer').keypress(function(event) {
        // Check if the pressed key is Enter (key code 13)
        if (event.which === 13) {
          checkAnswer();
        }
      });

      // Function to check the answer
      function checkAnswer() {
        var answer = $('#answer').val().toLowerCase();
        if (answer) {

          var currentQuestion = question[randomQuestionKey];
          var correctAnswerFound = false;

          // Loop through each answer and check if input matches
          for (var i = 1; i <= 5; i++) {
            var currentAnswer = currentQuestion["answer" + i].toLowerCase();
            if (answer === currentAnswer) {
              correctAnswerFound = true;
              break;
            }
          }

          // Check if any correct answer is found
          if (correctAnswerFound) {
            Swal.fire({
              title: 'Jawaban Tepat!',
              text: 'Selamat datang di Kerajaan Marsinah',
              icon: 'success',
              confirmButtonText: 'Ok'
            })
          } else {
            Swal.fire({
              title: 'Gagal!',
              text: 'Maaf anda bukan anggota keluarga Kerajaan Marsinah',
              icon: 'error',
              confirmButtonText: 'Ok'
            })
          }

        } else {
          $('#error-answer').show();
          setTimeout(function() {
            $('#error-answer').hide();
          }, 3000);
        }
      }
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>