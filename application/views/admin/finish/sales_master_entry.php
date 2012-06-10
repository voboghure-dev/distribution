<div id="center-column">
  <div class="table">
    <img src="images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
    <img src="images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
    <?php echo form_open('finish_inventory/add_sales', 'name="sales_master"'); ?>
    <table class="listing form" cellpadding="0" cellspacing="0">
      <tr>
        <th class="full" colspan="4">Sale Information</th>
      </tr>
      <tr>
        <td class="first" width="90"><b>Auto Sales No</b></td>
        <td><input type="text" name="sales_no" style="width: 180px;" value="<?php echo $sales_no; ?>" /></td>
        <td width="90" style="text-align: left;"><b>Current Date</b></td>
        <td class="last"><input type="text" name="sales_date" class="jq_date" value="<?php echo date('Y-m-d'); ?>" style="width: 180px;" /></td>
      </tr>
      <tr class="bg">
        <td class="first" width="90"><b>Invoice No</b></td>
        <td><input type="text" name="invoice_no" style="width: 180px;" value="<?php echo $invoice_no; ?>" /></td>
        <td><b>Order No<b></td>
        <td class="last"><input type="text" name="order_no" style="width: 180px;" /></td>
      </tr>
      <tr>
        <td class="first" width="90"><b>Sales Office</b></td>
        <td>
          <select name="sales_office" style="width: 185px;">
            <?php foreach($sales_offices as $key=>$value){ ?>
            <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
            <?php } ?>
          </select>
        </td>
        <td><b>ASM Name<b></td>
        <td class="last">
          <select name="asm_id" id="asm_id" style="width: 185px;">
            <?php foreach($asm_list as $key=>$value){ ?>
            <option value="<?php echo $value['id']; ?>"><?php echo $value['name'] . ' - (' . $value['zone']; ?>)</option>
            <?php } ?>
          </select>
        </td>
      </tr>
      <tr class="bg">
        <td class="first"><b>MPO Name</b></td>
        <td>
          <div class="mpo">
            <select name="mpo_id" id="mpo_id" style="width: 185px;">
              <?php foreach($mpo_list as $key=>$value){ ?>
              <option value="<?php echo $value['id']; ?>"><?php echo $value['name'] . ' - (' . $value['zone']; ?>)</option>
              <?php } ?>
            </select>
          </div>
        </td>
        <td><b>Customer Name</b></td>
        <td class="last">
          <div class="customer">
            <select name="customer_id" id="customer_id" style="width: 185px;">
              <?php foreach($customer_list as $key=>$value){ ?>
              <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
              <?php } ?>
            </select>
          </div>
        </td>
      </tr>
      <tr>
        <td class="first" valign="top" width="90"><b>Type</b></td>
        <td valign="top">
          <select name="type" style="width: 185px;">
            <option value="cash">Cash</option>
            <option value="credit">Credit</option>
          </select>
        </td>
        <td valign="top"><b>Memo<b></td>
        <td class="last">
          <textarea name="memo" style="width: 180px;"></textarea>
        </td>
      </tr>
      <tr>
        <th class="full" colspan="4"><input type="submit" name="submit" value="Add Details" /></th>
      </tr>
      <?php echo form_close(); ?>
    </table>
  </div>
</div>

<script type="text/javascript">
  document.sales_master.sales_no.focus();
  $(function(){
    $('#asm_id').change(function(){
      $("#mpo_id").remove();
      
      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>finish_inventory/get_mpo",
        data: "id="+$(this).val(),
        success: function(html){
          $(".mpo").html(html);
        }
      });
      return false
    });
    
    $('#mpo_id').live('change', function(){
      $("#customer_id").remove();
      
      $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>settings/get_customer",
        data: "id="+$(this).val(),
        success: function(html){
          $(".customer").html(html);
        }
      });
      return false
    });
  });
</script>