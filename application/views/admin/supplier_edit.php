<div id="center-column">
  <div class="table">
    <img src="images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
    <img src="images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
    <?php echo form_open('supplier/edit'); ?>
    <table class="listing form" cellpadding="0" cellspacing="0">
      <tr>
        <th class="full" colspan="2">Customer Edit</th>
      </tr>
      <tr>
        <td class="first" width="120"><strong>Full Name</strong></td>
        <td class="last"><input type="text" class="text" name="fname" value="<?php echo $supplier['fname']; ?>" /></td>
      </tr>
      <tr class="bg">
        <td class="first"><strong>Email Address</strong></td>
        <td class="last"><input type="text" class="text" name="email" value="<?php echo $supplier['email']; ?>" /></td>
      </tr>
      <input type="hidden" name="id" value="<?php echo $supplier['id']; ?>" />
      <tr>
        <td class="full" colspan="2">&nbsp;</td>
      </tr>
      <tr class="bg">
        <td class="full" colspan="2">
          <input type="submit" name="submit" value="Save Supplier" />
        </td>
      </tr>
    </table>
    <?php echo form_close(); ?>
    <p>&nbsp;</p>
  </div>
</div>