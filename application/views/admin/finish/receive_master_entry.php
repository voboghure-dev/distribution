<div id="center-column">
  <div class="table">
    <img src="images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
    <img src="images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
    <?php echo form_open('finish_inventory/add_receive'); ?>
    <table class="listing form" cellpadding="0" cellspacing="0">
      <tr>
        <th class="full" colspan="4">Finish Receive Entry</th>
      </tr>
      <tr>
        <td class="first"><strong>Receive No</strong></td>
        <td style="text-align: left; padding-left: 5px;"><input type="text" name="receive_no" style="width: 150px;" /></td>
        <td><strong>Receive Date</strong></td>
        <td class="last"><input type="text" class="jq_date" name="receive_date" style="width: 150px;" /></td>
      </tr>
      <tr class="bg">
        <td class="full" colspan="4">&nbsp;</td>
      </tr>
      <tr>
        <th class="full" colspan="4"><input type="submit" name="submit" value="Start Receive" /></th>
      </tr>
      <?php echo form_close(); ?>
    </table>
    <p>&nbsp;</p>
  </div>
</div>