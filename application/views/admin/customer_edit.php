<div id="center-column">
  <div class="table">
    <img src="images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
    <img src="images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
    <?php echo form_open('settings/customer_edit', 'name="customer_edit"'); ?>
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
            <option value="<?php echo $value['id']; ?>" <?php if($customer['mpo_id']==$value['id']){ ?>selected<?php } ?>><?php echo $value['name']; ?></option>
            <?php } ?>
          </select>
        </td>
      </tr>
      <tr>
        <td class="first"><strong>Code</strong></td>
        <td class="last"><input type="text" class="text" name="code" value="<?php echo $customer['code']; ?>" /></td>
      </tr>
      <tr class="bg">
        <td class="first"><strong>Full Name</strong></td>
        <td class="last"><input type="text" class="text" name="name" value="<?php echo $customer['name']; ?>" /></td>
      </tr>
      <tr>
        <td class="first" valign="top"><strong>Address</strong></td>
        <td class="last"><textarea name="address" style="width: 262px;"><?php echo $customer['address']; ?></textarea></td>
      </tr>
      <tr class="bg">
        <td class="first"><strong>Phone #</strong></td>
        <td class="last"><input type="text" class="text" name="phone" value="<?php echo $customer['phone']; ?>" /></td>
      </tr>
      <tr>
        <td class="first"><strong>Date of Introduce</strong></td>
        <td class="last"><input type="text" class="jq_date" name="introduce" value="<?php echo $customer['introduce']; ?>" /></td>
      </tr>
      <tr class="bg">
        <td class="full" colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <th class="full" colspan="2"><input type="submit" name="submit" value="Save Customer" /></th>
      </tr>
    </table>
    <?php
      echo form_hidden('id', $customer['id']);
      echo form_close();
    ?>
    <p>&nbsp;</p>
  </div>
</div>

<script language=javascript>
  document.customer_edit.code.focus();
</script>