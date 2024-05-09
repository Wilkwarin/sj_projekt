<?php
include_once "templates/header.php";
?>
<main>
  <h2 style="text-align: center">Galéria</h2>

  <div class="carousel">
    <div class="carousel-inner">
      <div class="carousel-item">
        <img class="caru" src="img/G_01.jpg" alt="Image 1" />
      </div>
      <div class="carousel-item">
        <img class="caru" src="img/G_02.jpeg" alt="Image 2" />
      </div>
      <div class="carousel-item">
        <img class="caru" src="img/G_03.jpeg" alt="Image 3" />
      </div>
      <div class="carousel-item">
        <img class="caru" src="img/G_04.jpeg" alt="Image 4" />
      </div>
      <div class="carousel-item">
        <img class="caru" src="img/G_05.jpeg" alt="Image 5" />
      </div>
      <div class="carousel-item">
        <img class="caru" src="img/G_06.jpeg" alt="Image 6" />
      </div>
      <div class="carousel-item">
        <img class="caru" src="img/G_07.jpg" alt="Image 7" />
      </div>
      <div class="carousel-item">
        <img class="caru" src="img/G_08.jpg" alt="Image 8" />
      </div>
      <div class="carousel-item">
        <img class="caru" src="img/G_09.jpg" alt="Image 9" />
      </div>
    </div>
    <div id="prevBtn">&#10094;</div>
    <div id="nextBtn">&#10095;</div>
  </div>

  <h2 style="text-align: center">Myšiarka</h2>

  <div class="video-item">
    <video id="toVideo" controls>
      <source src="video/video_2.mp4" type="video/mp4" />
    </video>
  </div>
  
  <?php
  if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $contact = new Contact();

    if (isset($_POST["suhlas"]) && isset($_POST["meno"]) && isset($_POST["email"]) && isset($_POST["poznamka"])) {
      $contact->create_contact($_POST["meno"], $_POST["email"], $_POST["poznamka"]);
      echo '<p style="text-align: center; font-weight: bold;">Ďakujeme za Vašu správu.</p>';
    } else {
      echo '<p style="text-align: center; font-weight: bold;">Chýbajúce údaje.</p>';
    }
  } else {
    ?>

    <div id="Anketa">
      <form method="post">
        <h2>Chcete povedať príbeh svojej mačky?</h2>
        <p>Potom mi to povedzte v tomto dotazníku.</p>

        <label for="meno">Meno:</label> <br />
        <input type="text" name="meno" id="meno" required /> <br />
        <br />

        <label for="email">Email:</label> <br />
        <input type="email" name="email" id="email" required /> <br />
        <br />

        <label for="poznamka">Vaš príbeh:</label> <br />
        <textarea id="poznamka" name="poznamka" cols="50" rows="5" required></textarea>
        <br />
        <br />

        <label for="suhlas">
          <input type="checkbox" name="suhlas" id="suhlas" required />
          Súhlas so spracovaním údajov
        </label>
        <br />
        <br />

        <input type="submit" id="submit" value="Odoslať" />
      </form>
    </div>

    <?php
  }
  ?>
</main>

<?php
include_once "templates/footer.php";
?>