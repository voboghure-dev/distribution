<div id="center-column">
  <div class="table">
    <img src="images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
    <img src="images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
    <?php echo form_open('accounts/report_chart_ac'); ?>
    <table class="listing form" cellpadding="0" cellspacing="0">
      <tr>
        <th class="full" colspan="4">Report Balance Sheet</th>
      </tr>
      <tr>
        <td class="first" width="80"><strong>Start Date</strong></td>
        <td style="padding-left: 5px; text-align: left;"><input type="text" class="jq_date" name="s_date" value="<?php echo date ('Y-m-01'); ?>" style="width: 170px;" /></td>
        <td width="90"><strong>End Date</strong></td>
        <td class="last"><input type="text" class="jq_date" name="e_date" value="<?php echo date('Y-m-t'); ?>" style="width: 170px;" /></td>
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