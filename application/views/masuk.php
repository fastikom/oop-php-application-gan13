<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="robots" content="index, follow">
    <meta charset="utf-8">
    <!-- memasukan file javascript -->
    <script type="text/javascript" src="./asset/js/jquery.js"></script>
    <script type="text/javascript" src="./asset/js/jquery-2.1.7.js"></script>
    <script type="text/javascript" src="./asset/js/rainbows.js"></script>
    <!-- memasukan file javascript -->

    <!-- memasukan file css -->
    <link type="text/css" rel="stylesheet" href="asset/css/style.css"/>

    <title>Masuk</title>
    <script>


    	$(document).ready(function(){

    	$("#submit1").hover(
    	function() {
    	$(this).animate({"opacity": "0"}, "slow");
    	},
    	function() {
    	$(this).animate({"opacity": "1"}, "slow");
    	});
     	});

    </script>

  </head>
  <body>
    <div id="wrapper">
      <div id="wrappertop"></div>
      <div id="wrappermiddle">
        <h2>Masuk</h2>
        <?= form_open('login', ['name' => 'login_form', 'id' => 'login_form']);?>
        <?php if (!empty($this->session->flashdata('error'))) : ?>
          <p id="message"><?= $this->session->flashdata('error') ?></p>
        <?php endif ?>

        <div id="username_input">
          <div id="username_inputleft"></div>
          <div id="username_inputmiddle">
            <form>
              <input type="text" name="link" id="url" value="Nama Pengguna" onclick="this.value = ''">
              <img id="url_user" src="./images/mailicon.png" alt="">
              <?= form_input('username', $input->username, ['class' => 'form_field'])?>
              <?= form_error('username' $input->username, ['<p class="field_error">', '</p>']) ?>
            </form>
          </div>
        </div>

          <div id="password_inputright"></div>
          <div id="password_inputleft"></div>
          <div id="password_middle">
          <p>
          <form type="password" name="link" id="url" value="Password" onclick="this.value = ''">
            <img id="url_password" src=".asset/images/passicon.png" alt="">
            <?= form_password('password', $input->password, ['class' => 'form_field'])?>
            <?= form_error('password' , '<p class="field_error">', '</p>');?>
          </p>
          </form>
          </div>
          <div id="password_inputright"></div>

        <div id="submit">
          <form>
            <input type="image" src="./asset/images/submit_hover.png" id="submit1" value="Masuk">
            <input type="image" src="./asset/images/submit.png" id="submit2" value="Masuk">
          </form>
        </div>

        </div>

      </div>

    </div>
  </body>
</html>
