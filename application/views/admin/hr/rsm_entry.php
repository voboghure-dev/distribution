<div id="center-column">
  <div class="table">
    <img src="images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
    <img src="images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
    <?php echo form_open('human_resource/rsm_add', 'name="rsm_add"'); ?>
    <table class="listing form" cellpadding="0" cellspacing="0">
      <tr>
        <th class="full" colspan="2">RSM Entry</th>
      </tr>
      <tr>
        <td class="first" width="120"><strong>RSM Code</strong></td>
        <td class="last"><input type="text" class="text" name="code" value="<?php echo $code; ?>" /></td>
      </tr>
      <tr class="bg">
        <td class="first"><strong>RSM Name</strong></td>
        <td class="last"><input type="text" class="text" name="name" /></td>
      </tr>
      <tr>
        <td class="first"><strong>RSM Designation</strong></td>
        <td class="last"><input type="text" class="text" name="designation" /></td>
      </tr>
      <tr class="bg">
        <td class="first"><strong>RSM Zone</strong></td>
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
  document.rsm_add.name.focus();
</script>