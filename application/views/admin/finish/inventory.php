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
        <th class="first" width="70">Item Code</th>
        <th>Description</th>
        <th>Generic Name</th>
        <th>Pack Size</th>
        <th>TP + VAT</th>
        <th class="last" colspan="2">Action</th>
      </tr>
      
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
        url: "<?php echo base_url(); ?>item/delete",
        data: "id="+$(this).prev().val(),
        success: function(html){
          $(".top-bar").html(html);
        }
      });

      return false
    });
  });
</script>