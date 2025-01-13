</main>



<footer>
  <div class="container-footer d-flex flex-column gap-4 p-4 text-light">
    <!-- VIDEO -->
    <?php 
      $basename_chemin = basename($_SERVER['PHP_SELF']);

      if ($basename_chemin === "index.php"): ?>
        <video src="assets/video/video_medium.mp4" class="video rounded-top object-fit-cover border-bottom" muted autoplay loop></video>
      <?php endif; ?>

    <div class="d-flex gap-3" style="height: 150px;">
      <div>
        <span class="d-block fw-bold">Contacter nous</span>
        <span class="d-block"><i class="bi bi-geo-alt-fill me-1"></i>Lorem ipsum dolor sit, amet</span>
        <span class="d-block"><i class="bi bi-telephone-fill me-1"></i>03 23 51 25 12</span>
        <span class="d-block"><i class="bi bi-envelope-at me-1"></i>the-district@gmail.fr</span>
        <span class="d-block"><i class="bi bi-clock me-1"></i>Sun - Sat / 10:00 AM - 8:00 PM</span>
      </div>

      <div>
        <span class="d-block fw-bold">The district</span>
        <a href="#"><i class="bi bi-instagram me-1"></i></a>
        <a href="#"><i class="bi bi-facebook me-1"></i></a>
        <a href="#"><i class="bi bi-twitter-x me-1"></i></a>
      </div>
    </div>
  </div>
</footer>




<!-- cdn bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
  crossorigin="anonymous"></script>

<?php
  $basename_chemin = basename($_SERVER['PHP_SELF']);
  echo "<script" . 
  $return_value = match ($basename_chemin) {
    'index.php' => ' src="/script.js">' ,
    'contact.php' => ' src="/assets/JS/validation-contact.js">' ,
    'categorie.php' => ' src="/assets/JS/script-categorie.js">' ,
    'plats.php' => ' src="/assets/JS/script-plat.js">' ,
    'panier.php' => ' src="/assets/JS/validation-panier.js">' ,
    default => ' src="/script.js">',

  } . "</script>";

?>



<!-- Fuse.js (permet une correespondance floue des recherche utilisateur) -->
<script src="https://cdn.jsdelivr.net/npm/fuse.js/dist/fuse.min.js"></script>

</body>

</html>