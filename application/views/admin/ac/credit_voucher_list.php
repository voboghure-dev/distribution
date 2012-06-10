<div id="center-column">
  <?php
    if ($this->session->flashdata('message')){
      echo '<div class="top-bar"><h1>'.$this->session->flashdata('message').'</h1></div>';
    }
  ?>
  <div class="top-bar"></div>

  <div class="table">
    <img src="images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
    <img src="images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
    <table class="listing" cellpadding="0" cellspacing="0">
      <tr>
        <th class="full" colspan="8">Credit Voucher List</th>
      </tr>
      <tr>
        <th width="100">Voucher No</th>
        <th width="120">Voucher Date</th>
        <th>DR Amount</th>
        <th>CR Amount</th>
        <th colspan="2">Action</th>
      </tr>
      <?php
        $i = 0;
        foreach($credit_vouchers as $key=>$value){
      ?>
      <tr <?php if($i==1){echo 'class="bg"';} ?>>
        <td class="first style1"><?php echo $value['voucher_no']; ?></td>
        <td><?php echo date('jS F Y ', strtotime($value['voucher_date'])); ?></td>
        <td align="right"><?php echo number_format($value['debit_amount'], 2); ?></td>
        <td align="right"><?php echo number_format($value['credit_amount'], 2); ?></td>
        <td style="text-align: center;"><a href="accounts/edit_credit_voucher_master/<?php echo $value['id']; ?>"><img src="images/edit-icon.gif" width="16" height="16" alt="edit" /></a></td>
        <td class="last" style="text-align: center;"><input type="hidden" value="<?php echo $value['id']; ?>" /><img src="images/hr.gif" width="16" height="16" class="delete" alt="delete" style="cursor: pointer;" /></td>
      </tr>
      <?php
          if($i==0){$i=1;}else{$i=0;}
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
         url: "<?php echo base_url(); ?>accounts/delete_voucher",
         data: "id="+$(this).prev().val(),
         success: function(html){
             $(".top-bar").html(html);
             }
      });

      return false
    });
  });
</script>