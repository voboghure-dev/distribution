<div id="center-column">
  <div class="table">
    <img src="images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
    <img src="images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
    <?php echo form_open('finish_inventory/add_return_item'); ?>
    <table class="listing form" cellpadding="0" cellspacing="0">
      <tr>
        <th class="full" colspan="2">Add item for the MPO : <?php echo $return_master['employee']; ?></th>
      </tr>
      <tr>
        <td class="first" width="120"><b>Item Name</b></td>
        <td class="last">
          <?php echo form_dropdown('item_id', $items, '', 'style="width: 270px;"'); ?>
        </td>
      </tr>
      <tr class="bg">
        <td class="first" width="120"><b>Quantity</b></td>
        <td class="last"><input type="text" name="quantity" /></td>
      </tr>
      <tr>
        <td class="full" colspan="2">&nbsp;</td>
      </tr>
      <tr class="bg">
        <td class="full" colspan="2">
          <input type="submit" name="submit" value="Add Item" />
        </td>
      </tr>
      <?php
        echo form_hidden('return_id', $return_master['id']);
        echo form_close();
      ?>
    </table>
  </div>
  <div class="top-bar"></div>
  <div class="table">
    <img src="images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
    <img src="images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
    <table class="listing form" cellpadding="0" cellspacing="0">
      <tr>
        <th class="full" colspan="5">List of the item</th>
      </tr>
      <tr>
        <td class="first" width="300px;"><b>Item Name</b></td>
        <td><b>Quantity</b></td>
        <td><b>Unit Price</b></td>
        <td><b>Total Price</b></td>
        <td class="last" width="50px;"><b>Action</b></td>
      </tr>
      <?php
        $tqty = 0;
        $tprice = 0;
        $i=1;
        if(!empty($return_details)){
          foreach($return_details as $key=>$value){
            $tqty += $value['quantity'];
            $tprice += ($value['trade_price'] * $value['quantity']);
      ?>
      <tr <?php if($i==1){echo 'class="bg"';} ?>>
        <td class="first" width="120"><b><?php echo $value['name']; ?></b></td>
        <td><b><?php echo $value['quantity']; ?></b></td>
        <td><b><?php echo number_format($value['trade_price'], 2); ?></b></td>
        <td><?php echo number_format(($value['quantity'] * $value['trade_price']), 2); ?></td>
        <td class="last" style="text-align: center;"><input type="hidden" value="<?php echo $value['id']; ?>" /><img src="images/hr.gif" width="16" height="16" class="delete" alt="delete" style="cursor: pointer;" /></td>
      </tr>
      <?php
            if($i==1){$i=0;}else{$i=1;}
          }
        }
      ?>
      <tr>
        <td><b>Grand Total</b></td>
        <td><b><?php echo $tqty; ?></b></td>
        <td>&nbsp;</td>
        <td><b><?php echo number_format($tprice, 2); ?></b></td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </div>
</div>

<script type="text/javascript">
  $(function(){
    $('.delete').click(function(){
      $(this).parent().parent().fadeTo(400, 0, function () {
        $(this).remove();
      });
      $.ajax({
         type: "POST",
         url: "<?php echo base_url(); ?>finish_inventory/delete_return_item",
         data: "id="+$(this).prev().val(),
         success: function(html){
             $(".top-bar").html(html);
             }
      });

      return false
    });
  });
</script>