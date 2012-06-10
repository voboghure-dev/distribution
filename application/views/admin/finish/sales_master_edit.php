<div id="center-column">
  <div class="table">
    <img src="images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
    <img src="images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
    <?php echo form_open('finish_inventory/edit_sales'); ?>
    <table class="listing form" cellpadding="0" cellspacing="0">
      <tr>
        <th class="full" colspan="4">Select Customer For Edit Sale</th>
      </tr>
      <tr>
        <td class="first" width="90"><b>Sales No</b></td>
        <td id="table_td"><input type="text" name="sales_no" style="width: 174px;" value="<?php echo $sales['sales_no']; ?>" /></td>
        <td width="90" style="text-align: left;"><b>Sales Date<b></td>
        <td class="last"><input type="text" name="sales_date" class="jq_date" value="<?php echo $sales['sales_date']; ?>" /></td>
      </tr>
      <tr class="bg">
        <td class="first"><b>Employee Name</b></td>
        <td style="padding-left: 5px; text-align: left;"><?php echo form_dropdown('emp_id', $employees, $sales['emp_id'], 'style="width: 180px;"'); ?></td>
        <td align="left"><b>Customer Name</b></td>
        <td class="last"><?php echo form_dropdown('customer_id', $customers, $sales['customer_id'], 'style="width: 150px;"'); ?></td>
      </tr>
      <tr>
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr>
        <th class="full" colspan="4"><input type="submit" name="submit" value="Save Sales" /></th>
      </tr>
      <?php
        echo form_hidden('sales_id', $sales['id']);
        echo form_close();
      ?>
    </table>
    <p>&nbsp;</p>
  </div>
</div>