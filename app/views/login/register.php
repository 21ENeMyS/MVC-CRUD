<div class="container">
  <div class="row">

  <form id="register-form" action="<?= URL; ?>/login/register" method="POST">

            <div class="form-group">
              <label for="username">Username</label>
              <input type="username" class="form-control" id="username" name="username" placeholder="Masukan Username" required autocomplete="off" autofocus>
              <span class="invalidFeedback">
                <?= $data['usernameError']; ?>
              </span>
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Masukan email" required autocomplete="off" autofocus>
              <span class="invalidFeedback">
                <?= $data['emailError']; ?>
              </span>
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password" required autocomplete="off" maxlength="8" autofocus>
              <span class="invalidFeedback">
                <?= $data['passwordError']; ?>
              </span>
            </div>  

            <div class="form-group">
              <label for="password_confirm">Konfirmasi Password</label>
              <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Konfirmasi Password" required autocomplete="off" autofocus maxlength="8">
              <span class="invalidFeedback">
                <?= $data['password_confirmError']; ?>
              </span>
            </div>

            <button type="submit" class="btn btn-primary" name="submit" id="submit" value="submit">Register</button>
      </form>
    </div>
  </div>
</div>