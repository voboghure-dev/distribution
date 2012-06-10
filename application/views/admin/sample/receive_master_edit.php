<div id="center-column">
  <div class="table">
    <img src="images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
    <img src="images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
    <?php echo form_open('sample_inventory/edit_receive'); ?>
    <table class="listing form" cellpadding="0" cellspacing="0">
      <tr>
        <th class="full" colspan="4">Raw Receive Edit</th>
      </tr>
      <tr>
        <td class="first"><strong>Receive No</strong></td>
        <td style="text-align: left; padding-left: 5px;"><input type="text" name="receive_no" value="<?php echo $receive_master['receive_no']; ?>" style="width: 150px;" /></td>
        <td><strong>Receive Date</strong></td>
        <td class="last"><input type="text" class="jq_date" name="receive_date" value="<?php echo $receive_master['receive_date']; ?>" style="width: 150px;" /></td>
      </tr>
      <tr class="bg">
        <td class="full" colspan="4">&nbsp;</td>
      </tr>
      <tr>
        <th class="full" colspan="4">
          <input type="submit" name="submit" value="Save Receive" />
        </th>
      </tr>
    </table>
    <?php
      echo form_hidden('receive_id', $receive_master['id']);
      echo form_close();
    ?>
    <p>&nbsp;</p>
  </div>
</div>