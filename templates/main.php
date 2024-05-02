<main>
  <section>
    <img src="<?= $poster_url;?>" width="300" alt="Poster de <?= $title ?>" 
    style="border-radius: 16px" />
  </section>

  <hgroup>
    <h3> <?= $title?>.</h3>
    <p><?= $until_message; ?>. Fecha de estreno: <?= $release_date; ?> </p>
    <p>La siguente es: <?= $following_production; ?> </p>
  </hgroup>
</main>
