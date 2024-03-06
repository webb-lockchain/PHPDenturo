<?php include("header.php");?>
<div id="content">
<div class="section-mittig1">
  <div id="w-node-_213ae8dd-e50f-0d87-7665-6995727173a6-e9d95ed0" class="w-layout-layout quick-stack wf-layout-layout">
    <div id="w-node-_213ae8dd-e50f-0d87-7665-6995727173a7-e9d95ed0" class="w-layout-cell cell"><img
        src="images/map.webp" loading="lazy" alt="Symbol" class="image-101">
      <h3 class="heading-links-klein1 heading-font2 heading-color">Adresse</h3>
      <p class="text-links1 paragraph-font mittig">66111 Saarbrücken<br>Viktoriastr. 19</p>
    </div>
    <div id="w-node-_213ae8dd-e50f-0d87-7665-6995727173a8-e9d95ed0" class="w-layout-cell cell"><img
        src="images/email-2.webp" loading="lazy" alt="Symbol" class="image-101">
      <h2 class="heading-links-klein1 heading-font2 heading-color">E-Mail</h2>
      <p class="text-links1 paragraph-font mittig">
        <a href="mailto:info@denturo.de" class="link black">info@denturo.de</a>
      </p>
    </div>
    <div id="w-node-d20f3063-f43e-e9f1-878d-ad7cda80b1cb-e9d95ed0" class="w-layout-cell cell"><img
        src="images/anruf.webp" loading="lazy" alt="Symbol" class="image-101">
      <h2 class="heading-links-klein1 heading-font2 heading-color">Telefon</h2>
      <p class="text-links1 paragraph-font mittig">
        <a href="tel:+49681-41095956" class="link black">Tel: +49681-410 95 956</a><br>
      </p>
      <p class="text-links1 paragraph-font mittig">Fax: +49681-410 95 959</p>
    </div>
  </div>
</div>
<div class="section-mittig1">
  <div class="inhalt-nebeneinander1">
    <div class="inhalt-untereinander1">
      <div class="form-block w-form">
        <form id="Kontaktformular" name="wf-form-Kontaktformular" data-name="Kontaktformular" method="post"
          action="https://www.denturo.de/formmail.php" class="form" data-wf-page-id="64ca1f0ebcad6b7ae9d95ed0"
          data-wf-element-id="77b8cb3d-ccc3-1173-ca50-c1cc99c61243">
          <h1 class="heading-links1 heading-1">Kontaktformular</h1>
          <div class="form-text-mid flie-text">Die mit einem * markierten Felder sind Pflichtfelder</div><input
            type="text" class="text-field w-input" maxlength="256" name="Name" data-name="Name" placeholder="Name *"
            id="name" required="">
          <select id="Anrede" name="Anrede" data-name="Anrede" required="" class="select-field w-select">
            <option value="">Ihre Anrede</option>
            <option value="Herr">Herr</option>
            <option value="Frau">Frau</option>
          </select>
          <input type="email" class="text-field w-input" maxlength="256" name="Email" data-name="Email"
            placeholder="E-Mail *" id="email" required=""><input type="tel" class="text-field w-input" maxlength="256"
            name="Telefonnummer" data-name="Telefonnummer" placeholder="Telefonnummer *" id="Telefonnummer"
            required=""><textarea id="Ihr-Anliegen" name="Ihr-Anliegen" maxlength="5000" data-name="Ihr Anliegen"
            placeholder="Ihr-Anliegen" class="textarea w-input"></textarea><span for="Datenschutz-2"
            class="checkbox-label-2 w-form-label"></span>
          <div class="div-block-168"><label class="w-checkbox checkbox-field"><input type="checkbox" id="Datenschutz"
                name="Datenschutz" data-name="Datenschutz" required="" class="w-checkbox-input checkbox"></label>
            <p class="form-text flie-text">*Ich habe die <a href="datenschtuz.php"
                class="link-formular farbe-der-headings">Datenschutzerklärung</a> zur Kenntnis genommen.<br>Ich stimme
              zu, dass meine Angaben zur Kontaktaufnahme und für Rückfragen dauerhaft gespeichert werden.</p>
          </div>
          <div id="contact_button"></div>
          <!-- <script>
            var country = localStorage.getItem("lang");
            var allowed_country = "PT, ES, FR, DE, LT, NL, BE, LU, IT, AT, IE"
            if (allowed_country.includes(country)) {

              document.getElementById("contact_button").innerHTML = '<input type="submit" value="Abschicken" data-wait="Einen Moment bitte..." data-w-id="77b8cb3d-ccc3-1173-ca50-c1cc99c61256" class="submit-button1 highlights flie-text w-button">'
            }
            else {
              document.getElementById("contact_button").innerHTML = '<button type="button" class="disabled-button">Abschicken<span class="tooltiptext">Your location is not allowed.</span></button>'
            }
          </script> -->


          <!-- <input type="submit" value="Abschicken" data-wait="Einen Moment bitte..." data-w-id="77b8cb3d-ccc3-1173-ca50-c1cc99c61256" class="submit-button1 highlights flie-text w-button">
            <button type="button" class="disabled-button">Abschicken<span class="tooltiptext">Your location is not allowed.</span></button> -->

          <div class="w-embed">
            <input type="hidden" name="recipients" value="info&amp;hey@denturo.de">
            <input type="hidden" name="good_url" value="https://www.denturo.de/success.php">
            <input type="hidden" name="mail_options" value="CharSet=UTF-8">
            <input type="hidden" name="bad_url" value="FEHLERMEDLUNG.com.de.cz">
            <input type="hidden" name="subject" value="Neues Kontaktformular eingegangen!">
          </div>
        </form>
        <div class="w-form-done">
          <div class="text-block">Danke für Ihre Meldung! Wir werden Ihr Anliegen möglichst bald bearbeiten.</div>
        </div>
        <div class="w-form-fail">
          <div class="text-block-2">Oops! Etwas ist schiefgelaufen... Überprüfen Sie nochmal Ihre Eingaben oder
            versuchen Sie es später erneut.</div>
        </div>
      </div>
    </div>
    <div class="maps1">
      <div class="maps-gro-2">
        <div class="html-embed-7 w-embed w-iframe"><iframe class="cmplazyload" data-cmp-vendor="s1104"
            data-cmp-src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2604.9964664608424!2d6.991866!3d49.238556200000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4795b6a9122e1195%3A0x8e37608170bd1a0b!2sViktoriastra%C3%9Fe%2019%2C%2066111%20Saarbr%C3%BCcken!5e0!3m2!1sde!2sde!4v1693306623308!5m2!1sde!2sde"
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe></div>
      </div>
    </div>
  </div>
</div>
</div>
<?php include("footer.php");?>