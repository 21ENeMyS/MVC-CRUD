<div class="container">
  <div class="row">

  <?php Flasher::flash();?>
  <form action="<?= URL; ?>/login/index" method="POST">

            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Email Mahasiswa" required autocomplete="off" autofocus>
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password Anda" required autocomplete="off" maxlength="15" autofocus>
            </div>  

            <div class="form-group">
              <label for="password_confirm">Konfirmasi Password</label>
              <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Konfirmasi Password Anda" required autocomplete="off" autofocus maxlength="15">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>