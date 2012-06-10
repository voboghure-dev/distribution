<div id="center-column">
  <?php if ($this->session->flashdata('message')) { ?>
  <div class="top-bar">
    <h1><?php echo $this->session->flashdata('message'); ?></h1>
  </div>
  <?php } ?>

  <div class="table">
    <img src="images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
    <img src="images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
    <table class="listing" cellpadding="0" cellspacing="0">
      <tr>
        <th class="full" colspan="5">Supply List</th>
      </tr>
      <tr>
        <th width="150">Supply No</th>
        <th width="200">Supply Date</th>
        <th width="100">Total Qty</th>
        <th colspan="2">Action</th>
      </tr>
      <?php
        foreach($supply_master as $key=>$value){
      ?>
      <tr>
        <td width="150"><?php echo $value['supply_no']; ?></td>
        <td width="200"><?php echo $value['supply_date']; ?></td>
        <td width="100"><?php echo $value['quantity']; ?></td>
        <td><a href="sample_inventory/edit_supply/<?php echo $value['id']; ?>"><img src="images/edit-icon.gif" width="16" height="16" alt="edit" /></a></td>
        <td class="last"><input type="hidden" value="<?php echo $value['id']; ?>" /><img src="images/hr.gif" width="16" height="16" class="delete" alt="delete" style="cursor: pointer;" /></td>
      </tr>
      <?php
        }
      ?>
    </table>
    <div class="select">
      
    </div>
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
        url: "<?php echo base_url(); ?>sample_inventory/delete_supply",
        data: "id="+$(this).prev().val(),
        success: function(html){
          $(".top-bar").html(html);
        }
      });

      return false
    });
  });
</script>