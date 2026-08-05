<?php

$html = file_get_contents('details_raw.html');

// 1. Remplacer les CSS Vendor par les CDNs
$html = str_replace('href="assets/vendor/bootstrap/css/bootstrap.min.css"', 'href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"', $html);
$html = str_replace('href="assets/vendor/bootstrap-icons/bootstrap-icons.css"', 'href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"', $html);
$html = str_replace('href="assets/vendor/fontawesome-free/css/all.min.css"', 'href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"', $html);
$html = str_replace('href="assets/vendor/aos/aos.css"', 'href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css"', $html);
$html = str_replace('href="assets/vendor/glightbox/css/glightbox.min.css"', 'href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css"', $html);
$html = str_replace('href="assets/vendor/swiper/swiper-bundle.min.css"', 'href="https://cdn.jsdelivr.net/npm/swiper@11.1.10/swiper-bundle.min.css"', $html);

// 2. Remplacer les JS Vendor par les CDNs
$html = str_replace('src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"', 'src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"', $html);
$html = str_replace('src="assets/vendor/aos/aos.js"', 'src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"', $html);
$html = str_replace('src="assets/vendor/glightbox/js/glightbox.min.js"', 'src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"', $html);
$html = str_replace('src="assets/vendor/swiper/swiper-bundle.min.js"', 'src="https://cdn.jsdelivr.net/npm/swiper@11.1.10/swiper-bundle.min.js"', $html);
$html = str_replace('src="assets/vendor/isotope-layout/isotope.pkgd.min.js"', 'src="https://cdn.jsdelivr.net/npm/isotope-layout@3.0.6/dist/isotope.pkgd.min.js"', $html);
$html = str_replace('src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"', 'src="https://cdn.jsdelivr.net/npm/imagesloaded@5.0.0/imagesloaded.pkgd.min.js"', $html);
$html = str_replace('src="assets/vendor/purecounter/purecounter_vanilla.js"', 'src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs@1.5.0/dist/purecounter_vanilla.js"', $html);

// 3. Remplacer les chemins relatifs des assets personnalisés
$html = preg_replace('/src="assets\/([^"]+)"/', 'src="{{ asset(\'digitalmoov/assets/$1\') }}"', $html);
$html = preg_replace('/href="assets\/([^"]+)"/', 'href="{{ asset(\'digitalmoov/assets/$1\') }}"', $html);
$html = preg_replace('/url\(assets\/([^)]+)\)/', 'url({{ asset(\'digitalmoov/assets/$1\') }})', $html);
$html = preg_replace('/href="pdf\/([^"]+)"/', 'href="{{ asset(\'digitalmoov/pdf/$1\') }}"', $html);

// Mettre à jour la navigation
$html = str_replace('href="index.html"', 'href="{{ route(\'digitalmoov\') }}"', $html);
$html = str_replace('href="about.html"', 'href="{{ route(\'digitalmoov.about\') }}"', $html);
$html = str_replace('href="services.html"', 'href="{{ route(\'digitalmoov.services\') }}"', $html);
$html = str_replace('href="projects.html"', 'href="{{ route(\'digitalmoov.projects\') }}"', $html);
$html = str_replace('href="reference.html"', 'href="{{ route(\'digitalmoov.reference\') }}"', $html);
$html = str_replace('href="contact.html"', 'href="{{ route(\'digitalmoov.contact\') }}"', $html);
$html = str_replace('href="blog.html"', 'href="{{ route(\'digitalmoov.blog\') }}"', $html);
$html = str_replace('href="/Digitalmoov/Dashboard/espace_admin/login"', 'href="{{ route(\'login\') }}"', $html);

// 4. Remplacer les url('assets/img/...') dans le breadcrumbs
$html = preg_replace('/style="background-image: url\(\'assets\/img\/([^)]+)\'\);"/i', 'style="background-image: url(\'{{ asset(\'digitalmoov/assets/img/$1\') }}\');"', $html);

// 5. Remplacer le footer par le nouveau footer
$newFooter = '  <footer id="footer" class="footer">

    <div class="footer-content position-relative">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <div class="logo mb-3">
                <img src="{{ asset(\'digitalmoov/assets/img/caei dm cov.png\') }}" alt="CAEI Digital Moov" style="max-height: 60px; width: auto;">
              </div>
              
              <p>
                Immeuble Medina Palace au 53-55 <br>
                Avenue de Paris Tunis-Tunisie, 1001<br><br>
                <strong>Phone:</strong> +216 55 335 286<br>
                <strong>Email:</strong> contact@caei-afri.com<br>
              </p>
              <div class="social-links d-flex mt-3">
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-twitter"></i></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-facebook"></i></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-instagram"></i></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div><!-- End footer info column-->

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Liens utiles</h4>
            <ul>
              <li><a href="{{ route(\'digitalmoov\') }}">Accueil</a></li>
              <li><a href="{{ route(\'digitalmoov.about\') }}">Présentation</a></li>
              <li><a href="{{ route(\'digitalmoov.services\') }}">Services</a></li>
              <li><a href="{{ route(\'digitalmoov.terms\') }}">Terms of service</a></li>
              <li><a href="{{ route(\'digitalmoov.privacy\') }}">Privacy policy</a></li>
            </ul>
          </div><!-- End footer links column-->

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Nos Services</h4>
            <ul>
              <li><a href="{{ route(\'digitalmoov.services\') }}">Web Design</a></li>
              <li><a href="{{ route(\'digitalmoov.services\') }}">Web Development</a></li>
              <li><a href="{{ route(\'digitalmoov.services\') }}">Product Management</a></li>
              <li><a href="{{ route(\'digitalmoov.services\') }}">Marketing</a></li>
              <li><a href="{{ route(\'digitalmoov.services\') }}">Graphic Design</a></li>
            </ul>
          </div><!-- End footer links column-->

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Explorez</h4>
            <ul>
              <li><a href="{{ route(\'digitalmoov.services\') }}">Services</a></li>
              <li><a href="{{ route(\'digitalmoov.blog\') }}">Blog</a></li>
              <li><a href="{{ route(\'digitalmoov\') }}#get-started">FAQ</a></li>
              <li><a href="{{ route(\'digitalmoov.about\') }}">Partenaires</a></li>
            </ul>
          </div><!-- End footer links column-->

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Ressources</h4>
            <ul>
              <li><a href="{{ route(\'digitalmoov.privacy\') }}">Politique de Confidentialité</a></li>
              <li><a href="{{ route(\'digitalmoov.sitemap\') }}">Carte du Site</a></li>
              <li><a href="{{ route(\'digitalmoov.terms\') }}">Mentions Légales</a></li>
            </ul>
          </div><!-- End footer links column-->

        </div>
      </div>
    </div>

    <div class="footer-legal text-center position-relative">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>CAEI Digital-MOOV</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          Designed by <a href="{{ route(\'digitalmoov\') }}">Digital.MOOV</a>
        </div>
      </div>
    </div>

  </footer>';

$start = strpos($html, '<footer id="footer"');
$end = strpos($html, '</footer>');
if ($start !== false && $end !== false) {
    $end += strlen('</footer>');
    $html = substr_replace($html, $newFooter, $start, $end - $start);
}

// Sauvegarder
file_put_contents('resources/views/digitalmoov/service-details.blade.php', $html);
echo "View resources/views/digitalmoov/service-details.blade.php created successfully!\n";
