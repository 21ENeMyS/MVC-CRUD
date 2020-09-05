<div class="container">
  <div class="row">
    <div class="col-lg-6">
    <?php Flasher::flash(); ?>
    </div>
  </div>
  <div class="row">
    <form action="<?= URL; ?>/login" method="POST">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="username" name="username" id="username" placeholder="Input Your Username" autofocus autocomplete="off" required class="form-control">
        <span class="invalidFeedback">
          <?php echo $data['usernameError']; ?>
        </span>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required autocomplete="off" maxlength="8" placeholder="Masukan Password Anda" class="form-control">
        <span class="invalidFeedback">
          <?= $data['passwordError']; ?>
        </span>
      </div>
        <button class="btn btn-primary" type="submit">Submit</button>
        <div class="form-group">
          tidak mempunyai akun ?
          <a href="<?= URL; ?>/login/register">register</a>
        </div>
      </form>
  </div>
</div>

