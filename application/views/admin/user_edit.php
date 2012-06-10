<div id="center-column">
  <div class="table">
    <img src="images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
    <img src="images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
    <?php echo form_open('user/edit'); ?>
    <table class="listing form" cellpadding="0" cellspacing="0">
      <tr>
        <th class="full" colspan="2">User Edit</th>
      </tr>
      <tr>
        <td class="first" width="120"><strong>Full Name</strong></td>
        <td class="last"><input type="text" class="text" name="full_name" value="<?php echo $user['full_name']; ?>" /></td>
      </tr>
      <tr class="bg">
        <td class="first"><strong>Email Address</strong></td>
        <td class="last"><input type="text" class="text" name="email" value="<?php echo $user['email']; ?>" /></td>
      </tr>
      <tr>
        <td class="first" width="120"><strong>Password</strong></td>
        <td class="last"><input type="password" class="text" name="password" autocomplete="off" /></td>
      </tr>
      <tr class="bg">
        <td class="first"><strong>Re-enter Password</strong></td>
        <td class="last"><input type="password" class="text" name="repassword" autocomplete="off" /></td>
      </tr>
      <?php $width = 'style="width: 270px;"'; ?>
      <tr>
        <td class="first" width="120"><strong>User Type</strong></td>
        <td class="last">
        <?php
          $options = array('admin' => 'admin', 'employee' => 'employee', 'employer' => 'employer');
          echo form_dropdown('type',$options, $user['type'], $width) ."</p>";
        ?>
        </td>
      </tr>
      <tr class="bg">
        <td class="first"><strong>Status</strong></td>
        <td class="last">
        <?php
          $options = array('active' => 'active', 'inactive' => 'inactive');
          echo form_dropdown('status',$options, $user['status'], $width) ."</p>";
        ?>
        </td>
      </tr>
      <input type="hidden" name="id" value="<?php echo $user['id']; ?>" />
      <tr>
        <td class="full" colspan="2">&nbsp;</td>
      </tr>
      <tr class="bg">
        <td class="full" colspan="2">
          <input type="submit" name="submit" value="Save User" />
        </td>
      </tr>
    </table>
    <?php echo form_close(); ?>
    <p>&nbsp;</p>
  </div>
</div>