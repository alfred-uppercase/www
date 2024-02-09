<?php if(get_settings('recaptcha_status')): ?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php endif; ?>
<div class="container margin_60">
  <div class="row justify-content-center">
    <div class="col-xl-6 col-lg-6 col-md-8">
      <div class="box_account">
        <h3 class="new_client"><?php echo get_phrase('new_user'); ?></h3> <small class="float-right pt-2">* <?php echo get_phrase('required_fields'); ?></small>
        <form class="" action="<?php echo site_url('login/register_user') ?>" method="post">
          <div class="form_container">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="civilite" id="flexRadioDefault1" value="Mrs" onclick="updateCivilite('Mrs')">
              <label class="form-check-label" for="flexRadioDefault1">
                Mrs
              </label>
          </div>
          <div class="form-check">
              <input class="form-check-input" type="radio" name="civilite" id="flexRadioDefault2" value="Mm" onclick="updateCivilite('Mm')" checked>
              <label class="form-check-label" for="flexRadioDefault2">
                Mm
              </label>
          </div>
          <!-- Add a hidden input field to store the selected value -->
          <input type="hidden" name="selected_civilite" id="selected_civilite" value="Mm">

            <div class="form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="<?php echo get_phrase('email'); ?>*" required>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="password" id="password" value="" placeholder="<?php echo get_phrase('password'); ?>*" required>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <input type="text" class="form-control" name="name" placeholder="<?php echo get_phrase('name'); ?> *" required>
                </div>
              </div>
              <div class="col-md-12">
              <div class="form-group">
                  <input type="text" class="form-control" name="lastname" placeholder="<?php echo get_phrase('name'); ?> *" required>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <input type="text" class="form-control" name="address" placeholder="<?php echo get_phrase('address'); ?> *" required>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <input type="number" class="form-control" name="phone" placeholder="<?php echo get_phrase('phone'); ?> *" required>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="siret" placeholder="SIRET" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="nomdesociete" placeholder="Nom de la société" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="adresse" placeholder="Adresse de la société" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="codepostal" placeholder="Code postal" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="secteur" placeholder="Secteur d'activité" required>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-xl-7">
                <div class="form-group">
                  <label class="container_check">
                    <small>
                      <?php echo get_phrase('accept'); ?> <a href="<?php echo site_url('home/terms_and_conditions'); ?>"><?php echo get_phrase('terms_and_condition'); ?></a>
                      <input type="checkbox" required>
                      <span class="checkmark"></span>
                    </small>
                  </label>
                </div>
              </div>
              
            </div>

            <?php if(get_settings('recaptcha_status')): ?>
              <div class="form-group">
                <div class="g-recaptcha" data-sitekey="<?php echo get_settings('recaptcha_sitekey'); ?>"></div>
              </div>
            <?php endif; ?>
            
            <div class="row mt-1">
              <div class="col-md-12 mb-2">
                <input type="submit" value="<?php echo get_phrase('sign_up'); ?>" class="btn_1 w-100">
              </div>
              <div class="col-md-12">
                
                <a id="login" class="btn_1 full-width outline wishlist icon-login" href="<?php echo site_url('home/login'); ?>">Login</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
   function updateCivilite(value) {
      document.getElementById('selected_civilite').value = value;
   }
</script>