<div id="center-column">
  <?php
    if ($this->session->flashdata('message')){
      echo '<div class="top-bar"><h1>'.$this->session->flashdata('message').'</h1></div>';
    }
  ?>

  <div class="table">
    <img src="images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
    <img src="images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
    <?php echo form_open('accounts/add_chart_ac', 'name="chart_ac"'); ?>
    <table class="listing form" cellpadding="0" cellspacing="0">
      <tr>
        <th class="full" colspan="2">New Chart of A/C Entry</th>
      </tr>
      <tr>
        <td class="first" width="120"><b>Under A/C of</b></td>
        <td class="last">
          <select name="parent_id" style="width: 270px;">
            <option value="">Root</option>
            <?php echo $ac_chart_tree; ?>
            <!--
            <?php foreach($ac_charts as $key=>$value){ ?>
            <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
            <?php } ?>
            -->
          </select>
        </td>
      </tr>
      <tr class="bg">
        <td class="first" width="120"><strong>A/C Code</strong></td>
        <td class="last"><input type="text" class="text" name="code" autocomplete="off" /></td>
      </tr>
      <tr>
        <td class="first" width="120"><strong>A/C Name</strong></td>
        <td class="last"><input type="text" class="text" name="name" autocomplete="off" /></td>
      </tr>
      <tr class="bg">
        <td class="first" width="120" valign="top"><strong>Memo</strong></td>
        <td class="last"><textarea name="memo" style="width: 263px;"></textarea></td>
      </tr>
      <!--
      <tr>
        <td class="first" width="120"><strong>Type</strong></td>
        <td class="last">
          <select name="type" style="width: 270px;">
            <option value="auto">Auto Select From Parent Chart of A/C</option>
            <option value="debit">Debit</option>
            <option value="credit">Credit</option>
          </select>
        </td>
      </tr>
      -->
      <tr>
        <td class="full" colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <th class="full" colspan="2"><input type="submit" name="submit" value="Create A/C" /></th>
      </tr>
    </table>
    <?php echo form_close(); ?>
    <p>&nbsp;</p>
  </div>
</div>

<script type="text/javascript">
  document.chart_ac.code.focus();
</script>