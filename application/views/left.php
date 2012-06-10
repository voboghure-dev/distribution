<div id="left-column">
  <h3>Login</h3>
  <ul class="nav">
    <li class="last">
      <?php echo form_open('homepage/login'); ?>
      <b>Email</b><br /><input type="text" name="email" style="width: 133px;" /><br /><br />
      <b>Password</b><br /><input type="password" name="password" style="width: 133px;" /><br /><br />
      <input type="submit" name="submit" value="Login" />
      <?php echo form_close(); ?>
    </li>
  </ul>
</div>