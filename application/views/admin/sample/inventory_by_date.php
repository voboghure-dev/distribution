<div id="center-column">
  <div class="table">
    <img src="images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
    <img src="images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
    <?php echo form_open('raw_inventory/report_by_date'); ?>
    <table class="listing form" cellpadding="0" cellspacing="0">
      <tr>
        <th class="full" colspan="4">Raw Inventory Report by Date</th>
      </tr>
      <tr>
        <td class="first" width="70"><strong>Start Date</strong></td>
        <td style="text-align: left;"><input type="text" class="jq_date" name="start_date" style="width: 150px;" /></td>
        <td width="70"><strong>End Date</strong></td>
        <td class="last"><input type="text" class="jq_date" name="end_date" style="width: 150px;" /></td>
      </tr>
      <tr class="bg">
        <td class="full" colspan="4">&nbsp;</td>
      </tr>
      <tr>
        <th class="full" colspan="4"><input type="submit" name="submit" value="Show Report" /></th>
      </tr>
    </table>
    <?php echo form_close(); ?>
    <p>&nbsp;</p>
  </div>
</div>