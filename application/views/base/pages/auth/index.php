<div class="Login--section flex-center">
  <div class="container">
    <div class="col-sm-12 flex-center">
      <div class="login--bg--card">
        <div class="logo">
          <a href="<?= base_url('/'); ?>"><img class="with-invert img-responsive" alt="logo-header" src="<?= base_url("./assets/base/img/logo-white.png"); ?>"></a>
        </div>
      </div>
      <div class="login--form">
        <form action="#" class="form-tag">
          <div class="form-group"><label for="">E-mail / Phone No.</label><input type="text" name="email" class="form-control" required /></div>
          <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control" required />
            <a href="<?= base_url('./forgot-password'); ?>" class="font-size-small">Forgot Password</a>
          </div>
          <div class="form-group text-center">
            <button type="submit" class="auth-button">Login</button>
            <a href="<?= base_url('./sign-up'); ?>" class="font-size-small">Register Here</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>