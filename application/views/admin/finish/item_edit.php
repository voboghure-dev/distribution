<div id="center-column">
  <div class="table">
    <img src="images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
    <img src="images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
    <?php echo form_open('settings/item_edit'); ?>
    <table class="listing form" cellpadding="0" cellspacing="0">
      <tr>
        <th class="full" colspan="2">Item Edit</th>
      </tr>
      <tr>
        <td class="first" width="120"><strong>Item ID</strong></td>
        <td class="last"><input type="text" class="text" name="code" value="<?php echo $item['code']; ?>" /></td>
      </tr>
      <tr class="bg">
        <td class="first"><strong>Item Description</strong></td>
        <td class="last"><input type="text" class="text" name="description" value="<?php echo $item['description']; ?>" /></td>
      </tr>
      <tr>
        <td class="first" width="120"><strong>Generic Name</strong></td>
        <td class="last"><input type="text" class="text" name="generic_name" value="<?php echo $item['generic_name']; ?>" /></td>
      </tr>
      <tr class="bg">
        <td class="first"><strong>Pack Size</strong></td>
        <td class="last"><input type="text" class="text" name="pack_size" value="<?php echo $item['pack_size']; ?>" /></td>
      </tr>
      <tr>
        <td class="first" width="120"><strong>Trade Price</strong></td>
        <td class="last"><input type="text" class="text" name="trade_price" value="<?php echo $item['trade_price']; ?>" /></td>
      </tr>
      <tr class="bg">
        <td class="full" colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <th class="full" colspan="2"><input type="submit" name="submit" value="Save Item" /></th>
      </tr>
    </table>
    <?php
      echo form_hidden('id', $item['id']);
      echo form_close();
    ?>
    <p>&nbsp;</p>
  </div>
</div>