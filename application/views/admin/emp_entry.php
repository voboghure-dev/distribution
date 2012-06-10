<div id="center-column">
  <div class="table">
    <img src="images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
    <img src="images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
    <?php echo form_open('settings/emp_add', 'name="emp_details"'); ?>
    <table class="listing form" cellpadding="0" cellspacing="0">
      <tr>
        <th class="full" colspan="2">New Employee Details Entry</th>
      </tr>
      <tr>
        <td class="first" width="120"><strong>Emp Code</strong></td>
        <td class="last"><input type="text" class="text" name="emp_code" id="emp_code" /></td>
      </tr>
      <tr class="bg">
        <td class="first"><strong>Full Name</strong></td>
        <td class="last"><input type="text" class="text" name="name" /></td>
      </tr>
      <tr>
        <td class="first"><strong>Joining Date</strong></td>
        <td class="last"><input type="text" class="text" name="join" /></td>
      </tr>
      <tr class="bg">
        <td class="first"><strong>Date of Birth</strong></td>
        <td class="last"><input type="text" class="text" name="dob" /></td>
      </tr>
      <tr>
        <td class="first" valign="top"><strong>Address</strong></td>
        <td class="last"><textarea name="address" style="width: 261px;"></textarea></td>
      </tr>
      <tr class="bg">
        <td class="first"><strong>Level</strong></td>
        <td class="last">
          <select name="level" style="width: 267px;">
            <option value="">Select Level</option>
            <?php foreach($levels as $key=>$value){ ?>
            <option value="<?php echo $value['level']; ?>"><?php echo $value['level']; ?></option>
            <?php } ?>
          </select>
        </td>
      </tr>
      <tr>
        <td class="first"><strong>Area</strong></td>
        <td class="last">
          <select name="area" style="width: 267px;">
            <option value="">Select Area</option>
            <?php foreach($areas as $key=>$value){ ?>
            <option value="<?php echo $value['name']; ?>"><?php echo $value['name']; ?></option>
            <?php } ?>
          </select>
        </td>
      </tr>
      <tr class="bg">
        <td class="full" colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td class="full" colspan="2">
          <input type="submit" name="submit" value="Create Employee" />
        </td>
      </tr>
    </table>
    <?php echo form_close(); ?>
    <p>&nbsp;</p>
  </div>
</div>
<script language=javascript>
  document.emp_details.emp_code.focus();
</script>