<div id="center-column">
  <div class="table">
    <img src="images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
    <img src="images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
    <?php echo form_open('settings/area_edit', 'name="area_add"'); ?>
    <table class="listing form" cellpadding="0" cellspacing="0">
      <tr>
        <th class="full" colspan="2">New Area Entry</th>
      </tr>
      <tr>
        <td class="first" width="120"><strong>Area Name</strong></td>
        <td class="last"><input type="text" class="text" name="name" id="name" value="<?php echo $area['name']; ?>" /></td>
      </tr>
      <tr class="bg">
        <td class="full" colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td class="full" colspan="2">
          <input type="submit" name="submit" value="Save Area" />
        </td>
      </tr>
    </table>
    <?php
      echo form_hidden('id', $area['id']);
      echo form_close();
    ?>
    <p>&nbsp;</p>
  </div>
</div>
<script language=javascript>
  document.area_add.name.focus();
</script>