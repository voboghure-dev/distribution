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
        <th class="full" colspan="4">Item List</th>
      </tr>
      <tr>
        <th width="150">Item Code</th>
        <th width="300">Item Name</th>
        <th colspan="2">Action</th>
      </tr>
      <?php
      $i = 0;
      foreach ($raw_items as $key=>$value) {
      ?>
        <tr <?php if ($i == 1) { echo 'class="bg"'; } ?>>
          <td class="first style1"><?php echo $value['code']; ?></td>
          <td><?php echo $value['name']; ?></td>
          <td><a href="raw_inventory/edit_item/<?php echo $value['id']; ?>"><img src="images/edit-icon.gif" width="16" height="16" alt="edit" /></a></td>
          <td class="last"><input type="hidden" value="<?php echo $value['id']; ?>" /><img src="images/hr.gif" width="16" height="16" class="delete" alt="delete" style="cursor: pointer;" /></td>
        </tr>
      <?php
        if ($i == 0) {
          $i = 1;
        } else {
          $i = 0;
        }
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
        url: "<?php echo base_url(); ?>raw_inventory/delete_item",
        data: "id="+$(this).prev().val(),
        success: function(html){
          $(".top-bar").html(html);
        }
      });

      return false
    });
  });
</script>