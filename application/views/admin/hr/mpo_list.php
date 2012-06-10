<div id="center-column">
  <div class="top-bar">
    <?php
    if ($this->session->flashdata('message')) {
      echo '<h1>' . $this->session->flashdata('message') . '</h1>';
    }
    ?>
  </div>

  <div class="table">
    <img src="images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
    <img src="images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
    <table class="listing" cellpadding="0" cellspacing="0">
      <tr>
        <th class="full" colspan="9">MPO List</th>
      </tr>
      <tr>
        <th>Code</th>
        <th>Name</th>
        <th>ASM Name</th>
        <th>Designation</th>
        <th>Zone</th>
        <th>Joining</th>
        <th colspan="2">Action</th>
      </tr>
      <?php
      $i = 0;
      foreach ($mpo_list as $key=>$value) {
      ?>
        <tr <?php if ($i == 1) { echo 'class="bg"'; } ?>>
          <td class="first style1"><?php echo $value['code']; ?></td>
          <td><?php echo $value['name']; ?></td>
          <td><?php echo $value['asm_name']; ?></td>
          <td><?php echo $value['designation']; ?></td>
          <td><?php echo $value['zone']; ?></td>
          <td><?php echo $value['joining']; ?></td>
          <td><a href="human_resource/mpo_edit/<?php echo $value['id']; ?>"><img src="images/edit-icon.gif" width="16" height="16" alt="edit" /></a></td>
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
        url: "<?php echo base_url(); ?>human_resource/mpo_delete",
        data: "id="+$(this).prev().val(),
        success: function(html){
          $(".top-bar").html(html);
        }
      });

      return false
    });
  });
</script>