<div id="center-column">
  <div class="table">
    <img src="images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
    <img src="images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
    <?php echo form_open('settings/customer_add', 'name="customer_add"'); ?>
    <table class="listing form" cellpadding="0" cellspacing="0">
      <tr>
        <th class="full" colspan="2">Customer Entry</th>
      </tr>
      <tr class="bg">
        <td class="first" width="120"><strong>MPO Name</strong></td>
        <td class="last">
          <select name="mpo_id" style="width: 268px;">
            <option value="">Select MPO</option>
            <?php foreach($mpo_list as $key=>$value){ ?>
            <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
            <?php } ?>
          </select>
        </td>
      </tr>
      <tr>
        <td class="first"><strong>Code</strong></td>
        <td class="last"><input type="text" class="text" name="code" /></td>
      </tr>
      <tr class="bg">
        <td class="first"><strong>Full Name</strong></td>
        <td class="last"><input type="text" class="text" name="name" /></td>
      </tr>
      <tr>
        <td class="first" valign="top"><strong>Address</strong></td>
        <td class="last"><textarea name="address1" style="width: 262px;"></textarea></td>
      </tr>
      <tr class="bg">
        <td class="first"><strong>Phone #</strong></td>
        <td class="last"><input type="text" class="text" name="phone" /></td>
      </tr>
      <tr>
        <td class="first"><strong>Date of Introduce</strong></td>
        <td class="last"><input type="text" class="jq_date" name="introduce" value="<?php echo date('Y-m-d'); ?>" /></td>
      </tr>
      <tr class="bg">
        <td class="full" colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <th class="full" colspan="2"><input type="submit" name="submit" value="Create Customer" /></th>
      </tr>
    </table>
    <?php echo form_close(); ?>
    <p>&nbsp;</p>
  </div>
</div>

<script language=javascript>
  document.customer_add.code.focus();
</script>