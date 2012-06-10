<div id="center-column">
  <div class="table">
    <img src="images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
    <img src="images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
    <?php echo form_open('sample_inventory/edit_supply'); ?>
    <table class="listing form" cellpadding="0" cellspacing="0">
      <tr>
        <th class="full" colspan="4">Raw Supply Edit</th>
      </tr>
      <tr>
        <td class="first"><strong>Supply No</strong></td>
        <td style="text-align: left; padding-left: 5px;"><input type="text" name="supply_no" value="<?php echo $supply_master['supply_no']; ?>" style="width: 150px;" /></td>
        <td><strong>Supply Date</strong></td>
        <td class="last"><input type="text" class="jq_date" name="supply_date" value="<?php echo $supply_master['supply_date']; ?>" style="width: 150px;" /></td>
      </tr>
      <tr>
        <td class="first"><strong>Employee</strong></td>
        <td colspan="3" class="last"><?php echo form_dropdown('emp_id', $employees, $supply_master['emp_id'], 'style="width: 205px;"'); ?></td>
      </tr>
      <tr class="bg">
        <td class="full" colspan="4">&nbsp;</td>
      </tr>
      <tr>
        <th class="full" colspan="4">
          <input type="submit" name="submit" value="Save Supply" />
        </th>
      </tr>
    </table>
    <?php
      echo form_hidden('supply_id', $supply_master['id']);
      echo form_close();
    ?>
    <p>&nbsp;</p>
  </div>
</div>