<div id="center-column">
  <div class="table">
    <img src="images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
    <img src="images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
    <?php echo form_open('human_resource/mpo_add', 'name="mpo_add"'); ?>
    <table class="listing form" cellpadding="0" cellspacing="0">
      <tr>
        <th class="full" colspan="2">MPO Entry</th>
      </tr>
      <tr>
        <td class="first" width="120"><strong>ASM Name</strong></td>
        <td class="last">
          <select name="asm_id" style="width: 267px;">
            <option value="">Select One</option>
            <?php foreach($asm_list as $key=>$value){ ?>
            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
            <?php } ?>
          </select>
        </td>
      </tr>
      <tr>
        <td class="first" width="120"><strong>MPO Code</strong></td>
        <td class="last"><input type="text" class="text" name="code" value="<?php echo $code; ?>" /></td>
      </tr>
      <tr class="bg">
        <td class="first"><strong>MPO Name</strong></td>
        <td class="last"><input type="text" class="text" name="name" /></td>
      </tr>
      <tr>
        <td class="first"><strong>MPO Designation</strong></td>
        <td class="last"><input type="text" class="text" name="designation" id="serial" /></td>
      </tr>
      <tr class="bg">
        <td class="first"><strong>MPO Zone</strong></td>
        <td class="last"><input type="text" class="text" name="zone" /></td>
      </tr>
      <tr>
        <td class="first"><strong>Joining Date</strong></td>
        <td class="last"><input type="text" class="jq_date" name="joining" value="<?php echo date('Y-m-d'); ?>" /></td>
      </tr>
      <tr>
        <td class="full" colspan="2">&nbsp;</td>
      </tr>
      <tr class="bg">
        <th class="full" colspan="2"><input type="submit" name="submit" value="Save" /></th>
      </tr>
    </table>
    <?php echo form_close(); ?>
    <p>&nbsp;</p>
  </div>
</div>
<script language=javascript>
  document.mpo_add.code.focus();
</script>