<div class="container">
  <div class="row">
    <form action="<?= URL; ?>" method="post">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Masukan Email" autofocus autocomplete="off" required class="form-control">
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required autocomplete="off" maxlength="15" placeholder="Masukan Password Anda" class="form-control">
      </div>
        <button class="btn btn-primary" type="submit">Submit</button>
        <div class="form-group">
          tidak mempunyai akun ?
          <a href="<?= URL; ?>/login/register">register</a>
        </div>
      </form>

  </div>
</div>