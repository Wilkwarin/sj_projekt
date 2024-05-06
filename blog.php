<?php
include_once "templates/header.php";
?>

<main>
  <h1 class="resizeText grid-item stroka">Blog o Dýme</h1>

  <div class="resizeText grid-item devat">

    <?php
    $articleObject = new Article();
    $allArticles = $articleObject->get_articles();

    if (!$allArticles) {
      echo "Žiadne články.";
    } else {

      for ($i = 0; $i < count($allArticles); $i++) {
        $article = $allArticles[$i];
        ?>
        <div>
          <div>
            <span><?= $article["posted"] ?></span>
            <h3><?= $article["title"] ?></h3>
          </div>

          <?php
          if (strlen($article["body"]) > 250) {
            echo substr($article["body"], 0, 250) . '...';
          } else {
            echo $article["body"];
          }
          ?>

          <br><br>
          <a class="viac" href="article.php?id=<?= $article["id"] ?>">Čítať viac &rArr;</a>

          </p>
        </div>
        <?php
      }
    }
    ?>

    <?php
    if (isset($_SESSION["role"]) && $_SESSION["role"] >= 2) {
      ?>
      <br /><br /><a class="btn" href="article-create.php">Nový článok</a>

      <?php
    }
    ?>
  </div>

  <h1 class="resizeText grid-item stroka">Príbeh mačky menom Dýma</h1>


  <div class="grid-item mnogo">
    <h4 class="resizeText">Túlavá mačka</h4>
    <p class="resizeText">Keď mala mačka niekoľko mesiacov, majitelia ju vyhodili na ulicu.</p>
    <p class="resizeText">Túľavú mačku zobrali dobrovoľníci a odovzdali do mačacieho útulku. Tam ju sterilizovali.</p>
    <p class="resizeText">Z útulku ju vzal môj sused a pomenoval ju Musia. Chcel, aby mačka chytala myši v lese pri
      jeho vidieckom dome, priamo vedľa ktorého som práve bývala. Prichádzal do tohto domu cez víkendy a v pracovné
      dni sa vrátil do mesta. Mačka bežala za odchádzajúcim autom každý raz, ale sused nezastavoval.</p>
  </div>

  <div class="grid-item malo">
    <img class="fotki" src="img/Pribeh_1.jpeg" alt="Image 1">
  </div>

  <div class="grid-item malo">
    <img class="fotki" src="img/Pribeh_2.jpeg" alt="Image 2">
  </div>

  <div class="grid-item mnogo">
    <h4 class="resizeText">Mačka domáca</h4>
    <p class="resizeText">Na jeseň sa ochladilo, a mačka začala prichádzať ku mne, aby sa zohrievala a jedla. Bola
      veľmi láskavá a veľmi hladná, pretože sa živila myšami a nakazila sa červami. Raz prišla so zranenou tvárou.
      Ošetrila som ránku a napísala som susedovi, že môžem ošetriť ranu mačky, ak mu to nebude vadiť. Sused nechcel
      vziať mačku domov na zimu. Preto mi namiesto toho ponúkol, aby som si mačku zobrala k sebe. Súhlasila som, vzala
      mačku, pomenovala ju Dýma a vyliečila ju od všetkého, čím sa nakazila na ulici. </p>
  </div>

  <div class="grid-item mnogo">
    <h4 class="resizeText">Skrotenie</h4>
    <p class="resizeText">Najprv bola taká hladná, že po kŕmení liezla do odpadkového vedra alebo do kuchynskej
      umývadlovej misy lízať steny. Skočila na stôl, skákala z neho s kúskom syra v zuboch a utekala chodbou. Rozbila
      moj obľúbený tanier od majstrov zo Syserty a obľúbený tanier manžela od majstrov z Modry - kradla jedlo položené
      na tanieroch a zhodila ich zo stola. Ale postupne hlad prešiel a teraz len je svoje granule a žiada kyslú
      smotanu. Miluje sedieť niekomu na pleci alebo aspoň na kolenách. Môj manžel ju naučil dvom príkazom: "Ku mne!" a
      "Sedieť!". Jej je nuda hrať sa s mačacími hračkami, pretože je profesionálnou myšiarkou.</p>
  </div>

  <div class="grid-item malo">
    <img class="fotki" src="img/Pribeh_3.jpg" alt="Image 3">
  </div>

  <div class="grid-item malo">
    <img class="fotki" src="img/Pribeh_4.jpg" alt="Image 4">
  </div>

  <div class="grid-item mnogo">
    <h4 class="resizeText">Sťahovanie</h4>
    <p class="resizeText">Aby sme ju prepravili z Ruska do Slovenska, museli sme ju očkovať očkovacími látkami
      európskych výrobcov. Týchto vakcín v Rusku takmer niet, od roku 2022 ich prestali dovážať. Ale podarilo sa mi
      nájsť potrebné lieky, a manželovi sa podarilo kúpiť letenky na lietadlo pre mačky hneď na tri lety s dvoma
      prestupmi: z mojho rodného Jekaterinburgu do Moskvy, z Moskvy do Istanbulu a z Istanbulu do Viedne. Manžel s
      mačkou lietali dva dni a boli veľmi unavení, ale zvládli to, a teraz moja mačka žije v Nitre.</p>
  </div>

  <button id="changeSize" class="btn">+Аа</button>
  <button id="Vverh">&#x2191;</button>
</main>



<?php
include_once "templates/footer.php";
?>