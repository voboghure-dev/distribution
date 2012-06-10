<div id="center-column">
  <div class="table">
    <img src="images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
    <img src="images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
    <table class="listing form" cellpadding="0" cellspacing="0">
      <tr>
        <th class="full" colspan="4">Sale Information</th>
      </tr>
      <?php echo form_open('finish_inventory/add_sales_item', 'name="sales_details"'); ?>
      <tr>
        <td colspan="4">
          <div style="width: 90px; float: left; padding-top: 3px;">
            <b>Item Code : </b>
          </div>
          <div style="width: 190px; float: left;">
            <input type="text" name="item_id" id="item_id" style="text-transform: uppercase" />
            <?php //echo form_dropdown('item_id', $items, '', 'style="width: 185px;"'); ?>
          </div>
          <div style="width: 70px; float: left; padding-top: 3px; padding-left: 10px;">
            <b>Quantity : </b>
          </div>
          <div style="width: 50px; float: left;">
            <input type="text" name="quantity" style="width: 40px;" />
          </div>
          <div style="width: 50px; float: left; padding-top: 3px; padding-left: 10px;">
            <b>Bonus : </b>
          </div>
          <div style="width: 50px; float: left;">
            <input type="text" name="bonus_qty" style="width: 40px;" />
          </div>
          <div style="width: 50px; float: left; padding-top: 3px; padding-left: 10px;">
            <b>VAT : </b>
          </div>
          <div style="width: 60px; float: left;">
            <input type="text" name="vat" value="16.5" style="width: 40px;" /> <b>%</b>
          </div>
        </td>
      </tr>
      <tr class="bg">
        <th class="full" colspan="4"><input type="submit" name="submit" value="Add Item" /></th>
      </tr>
      <?php
      echo form_hidden('sales_id', $sales_master['id']);
      echo form_close();
      ?>
    </table>
    <table class="listing form" cellpadding="0" cellspacing="0">
      <tr>
        <th class="full" colspan="7">List of the item</th>
      </tr>
      <tr>
        <th width="200px;"><b>Item Name</b></th>
        <th><b>Quantity</b></th>
        <th><b>Bonus Qty.</b></th>
        <th><b>Unit Price</b></th>
        <th><b>Total</b></th>
        <th><b>Total Price with VAT</b></th>
        <th width="50px;"><b>Action</b></th>
      </tr>
      <?php
      $tqty = 0;
      $tbqty = 0;
      $tprice = 0;
      $tprice_vat = 0;
      $vat = 0;
      $i = 1;
      if (!empty($sales_details)) {
        foreach ($sales_details as $key => $value) {
          $tqty += $value['quantity'];
          $tbqty += $value['bonus_qty'];
          $tprice += $value['quantity'] * $value['trade_price'];
          $tprice_vat += $value['total_price'];
          $vat += $tprice_vat - $tprice;
          ?>
          <tr <?php
      if ($i == 1) {
        echo 'class="bg"';
      }
      ?>>
            <td class="first"><b><?php echo $value['name']; ?></b></td>
            <td align="right"><b><?php echo $value['quantity']; ?></b></td>
            <td align="right"><b><?php echo $value['bonus_qty']; ?></b></td>
            <td align="right"><b><?php echo number_format($value['trade_price'], 2); ?></b></td>
            <td align="right"><?php echo number_format($value['quantity'] * $value['trade_price'], 2); ?></td>
            <td align="right"><b><?php echo number_format($value['total_price'], 2); ?></b></td>
            <td class="last" style="text-align: center;"><a href="finish_inventory/delete_sales_item/<?php echo $sales_master['id'] . '/' . $value['id']; ?>"><img src="images/hr.gif" width="16" height="16" class="delete" alt="delete" /></a></td>
          </tr>
          <?php
          if ($i == 1) {
            $i = 0;
          } else {
            $i = 1;
          }
        }
      }
      ?>
      <tr>
        <td valign="bottom"><b>Grand Total</b></td>
        <td valign="bottom" align="right"><b><?php echo $tqty; ?></b></td>
        <td valign="bottom" align="right"><b><?php echo $tbqty; ?></b></td>
        <td>&nbsp;</td>
        <td valign="bottom" align="right"><b><?php echo number_format($tprice, 2); ?></b></td>
        <td valign="bottom" align="right"><b><?php echo 'VAT (' . number_format($vat, 2) . ') = ' . number_format($tprice_vat, 2); ?></b></td>
        <td>&nbsp;</td>
      </tr>
<?php echo form_open('finish_inventory/complete_sales'); ?>
      <tr>
        <th colspan="7"><b>Commission : <input type="text" name="commission" style="width: 100px;" /></b></th>
      </tr>
      <tr>
        <th class="full" colspan="7"><input type="submit" name="submit" value="Complete Sales and Print Invoice" /></th>
      </tr>
      <?php
      echo form_hidden('sales_id', $sales_master['id']);
      echo form_close();
      ?>
    </table>
  </div>
</div>

<script type="text/javascript">
  
  $(function() {
    $( "#item_id" ).autocomplete({
      source: function(request, response) {
        $.ajax({
          url: "<?php echo site_url('finish_inventory/get_item_code'); ?>",
          data: { term: $("#item_id").val()},
          dataType: "json",
          type: "POST",
          success: function(data){
            response(data);
          }
        });
      },
      minLength: 1
    });
  });
</script>