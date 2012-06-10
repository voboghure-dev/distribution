<div id="center-column">
  <div class="table">
    <img src="images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
    <img src="images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
    <?php echo form_open('finish_inventory/add_receive_item'); ?>
    <table class="listing form" cellpadding="0" cellspacing="0">
      <tr>
        <th class="full" colspan="2">Add item for the Receive No : <?php echo $receive_master['receive_no']; ?></th>
      </tr>
      <tr>
        <td class="first" width="120"><b>Item Name</b></td>
        <td class="last">
          <?php echo form_dropdown('item_id', $finish_items, '', 'style="width: 270px;"'); ?>
        </td>
      </tr>
      <input type="hidden" name="receive_id" value="<?php echo $receive_master['id']; ?>" />
      <tr class="bg">
        <td class="first" width="120"><b>Quantity</b></td>
        <td class="last"><input type="text" name="quantity" /></td>
      </tr>
      <tr class="bg">
        <td class="full" colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td class="full" colspan="2"><input type="submit" name="submit" value="Add Item" /></td>
      </tr>
      <?php echo form_close(); ?>
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
        <td class="last" width="50px;"><b>Action</b></td>
      </tr>
      <?php
        $i=1;
        $qty=0;
        foreach($receive_items as $key=>$value){
      ?>
      <tr <?php if($i==1){echo 'class="bg"';} ?>>
        <td class="first" width="120"><b><?php echo $value['item_name']; ?></b></td>
        <td><b><?php echo $value['quantity']; ?></b></td>
        <td class="last" style="text-align: center;"><input type="hidden" value="<?php echo $value['id']; ?>" /><img src="images/hr.gif" width="16" height="16" class="delete" alt="delete" style="cursor: pointer;" /></td>
      </tr>
      <?php
          $qty += $value['quantity'];
          if($i==1){$i=0;}else{$i=1;}
        }
      ?>
      <tr>
        <td><b>Grand Total</b></td>
        <td><strong><?php echo $qty; ?></strong></td>
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
         url: "<?php echo base_url(); ?>gpurchase/deleteItem",
         data: "id="+$(this).prev().val(),
         success: function(html){
             $(".top-bar").html(html);
             }
      });

      return false
    });
  });
</script>