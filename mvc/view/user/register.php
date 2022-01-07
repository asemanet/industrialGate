<div class="tac">
  <img src="<?=baseUrl()?>/image/notes.png"><br><br>

  <form action="<?=baseUrl();?>/user/register" method="post">
    <input type="text" class="ltr" placeholder="<?=_ph_email?>" name="email"><br>
    <br>
    <input type="password" class="ltr" placeholder="<?=_ph_password?>" name="password1"><br>
    <input type="password" class="ltr" placeholder="<?=_ph_confirm_password?>" name="password2"><br>
    <br>
    <input type="text" placeholder="<?=_ph_name?>" name="name"><br>
    <input type="text" placeholder="<?=_ph_nickname?>" name="nickname"><br>
    <br>
    <br>
    <button type="submit" class="btn-blue"><?=_btn_register?></button>
  </form>
</div>