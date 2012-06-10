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
        <th class="full" colspan="7">Item List</th>
      </tr>
      <tr>
        <th width="70">Item Code</th>
        <th>Description</th>
        <th>Generic Name</th>
        <th>Pack Size</th>
        <th>Trade Price</th>
        <th colspan="2">Action</th>
      </tr>
      <?php
      $i = 0;
      foreach ($items as $key=>$value) {
      ?>
        <tr <?php if ($i == 1) { echo 'class="bg"'; } ?>>
          <td class="first style1"><?php echo $value['code']; ?></td>
          <td><?php echo $value['description']; ?></td>
          <td><?php echo $value['generic_name']; ?></td>
          <td align="center"><?php echo $value['pack_size']; ?></td>
          <td align="right"><?php echo number_format($value['trade_price'], 2); ?></td>
          <td align="center"><a href="settings/item_edit/<?php echo $value['id']; ?>"><img src="images/edit-icon.gif" width="16" height="16" alt="edit" /></a></td>
          <td class="last" align="center"><input type="hidden" value="<?php echo $value['id']; ?>" /><img src="images/hr.gif" width="16" height="16" class="delete" alt="delete" style="cursor: pointer;" /></td>
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
      <strong>Other Pages: </strong>
      <select>
        <option>1</option>
      </select>
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
        url: "<?php echo base_url(); ?>settings/item_delete",
        data: "id="+$(this).prev().val(),
        success: function(html){
          $(".top-bar").html(html);
        }
      });

      return false
    });
  });
</script>