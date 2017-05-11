<div class="row">
    <div class="col-10">
        <h2>Home</h2>
    </div>
</div>

      <?php // medeteksi status login dan username dari session
      $is_login = $this->session->userdata('is_login');
      $username = $this->session->userdata('username');
      ?>
<!--jika sebagai login maka menampilkan ini-->
<?php if ($is_login): ?> <!--File view ini akan digunakan oleh semua jenis user (Guest,Opeator,Admin)-->
    <div class="row">
        <div class="col-10">
          <div class="callout callout-info">
            <h3>Halo, <strong><?= $username ?></strong>!</h3>
                <p>Selamat Bekerja.</p>
          </div>

        </div>
    </div>
<?php else: ?>
<!--jika tidak login-->
  <section class="content">
    <div class="callout callout-info">
      <h4>Selamat datang</h4>

      <p>Selamat datang di perpustakaan Blok E PPTQ Al - Asy'ariyah!.</p>
      <p>Untuk melihat katalog buku, gunakan menu <strong>"Buku"</strong>.</p>
    </div>
  </section>

<?php endif ?>
<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
