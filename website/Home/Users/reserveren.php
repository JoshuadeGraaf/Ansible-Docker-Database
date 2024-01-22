<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Vergaderkamer reserveren</title>
  <link rel="stylesheet" href="reserveerstyle.css">
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var kamers = document.querySelectorAll('.kamer img');

      kamers.forEach(function (kamer) {
        kamer.addEventListener('click', function () {
          var dataKamer = kamer.getAttribute('data-kamer');
          window.location.href = './kamers/' + dataKamer + '.php';
        });
      });
    });
  </script>
</head>
<body>
  <div id="content">
    <nav class="navbar">
      <div class="container-fluid">
        <ul>
          <li><a href="./homepage.php">Home</a></li>
          <li><a href="./reserveren.php">Reserveer</a></li>
          <li><a href="./logout.php">Logout</a></li>
        </ul>
      </div>
    </nav>
    <h1>Vergaderkamers</h1>
    <div class="kamers">
      <div class="kamer">
        <img src="kamers/kamer1.png" alt="Kamer 1" data-kamer="kamer1">
        <div class="tekst-container">
          <p>Tekst voor Kamer 1</p>
        </div>
      </div>
      <div class="kamer">
        <img src="kamers/kamer2.png" alt="Kamer 2" data-kamer="kamer2">
        <div class="tekst-container">
          <p>Tekst voor Kamer 2</p>
        </div>
      </div>
      <div class="kamer">
        <img src="kamers/kamer3.png" alt="Kamer 3" data-kamer="kamer3">
        <div class="tekst-container">
          <p>Tekst voor Kamer 3</p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
