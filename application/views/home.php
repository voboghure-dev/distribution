<div id="center-column">
  <?php
    if($this->session->flashdata('error')){
      echo "<div class='select-bar'><h3>";
      echo $this->session->flashdata('error');
      echo "</h3></div>";
    }
  ?>
  <div class="table">
    <img src="images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
    <img src="images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
    <table class="listing" cellpadding="0" cellspacing="0">
      <tr>
        <th class="full">&nbsp;</th>
      </tr>
      <tr>
        <td style="text-align: left; font-size: 13px; font-family: Verdana, Arial, Helvetica, sans-serif;">
          Welcome to Sales & Distribution Management System
        </td>
      </tr>
    </table>
  </div>
</div>