<div id="center-column">
  <div class="table">
    <img src="images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
    <img src="images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
    <?php echo form_open('sample_inventory/add_supply_item'); ?>
    <table class="listing form" cellpadding="0" cellspacing="0">
      <tr>
        <th class="full" colspan="2">Add item for the Supply No :  <?php echo $supply_master['supply_no']; ?></th>
      </tr>
      <tr>
        <td class="first" width="120"><b>Item Name</b></td>
        <td class="last">
          <?php echo form_dropdown('item_id', $sample_items, '', 'style="width: 270px;"'); ?>
        </td>
      </tr>
      <input type="hidden" name="supply_id" value="<?php echo $supply_master['id']; ?>" />
      <tr class="bg">
        <td class="first" width="120"><b>Quantity</b></td>
        <td class="last"><input type="text" name="quantity" /></td>
      </tr>
      <tr>
        <td class="full" colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <th class="full" colspan="2"><input type="submit" name="submit" value="Add Item" /></th>
      </tr>
      <?php echo  form_close(); ?>
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
        <th width="300px;"><strong>Item Name</strong></th>
        <th><b>Quantity</b></th>
        <th width="50px;" style="text-align: center;"><strong>Action</strong></th>
      </tr>
      <?php
        $qty = 0;
        foreach($supply_items as $key=>$value){
      ?>
      <tr>
        <td class="first" width="300px;"><strong><?php echo $value['item_name']; ?></strong></td>
        <td><b><?php echo $value['quantity']; ?></b></td>
        <td class="last" width="50px;" style="text-align: center;"><input type="hidden" value="<?php echo $value['id']; ?>" /><img src="images/hr.gif" width="16" height="16" class="delete" alt="delete" style="cursor: pointer;" /></td>
      </tr>
      <?php
          $qty += $value['quantity'];
        }
      ?>
      <tr>
        <th><b>Grand Total</b></th>
        <th><b><?php echo $qty; ?></b></th>
        <th>&nbsp;</th>
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
         url: "<?php echo base_url(); ?>sample_inventory/delete_supply_item",
         data: "id="+$(this).prev().val(),
         success: function(html){
             $(".top-bar").html(html);
             }
      });

      return false
    });
  });
</script>