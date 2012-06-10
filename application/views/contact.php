<div id="center-column">
  <div class="table">
    <img src="images/bg-th-left.gif" width="8" height="7" alt="" class="left" />
    <img src="images/bg-th-right.gif" width="7" height="7" alt="" class="right" />
    <table class="listing" cellpadding="0" cellspacing="0">
      <tr>
        <th class="full">&nbsp;</th>
      </tr>
      <tr>
        <td style="text-align: left;">
          <table width="100%" cellpadding="0" cellspacing="0">
            <tr>
              <td width="50%">
                <b></b>
              </td>
              <?php echo form_open('homepage/feedback'); ?>
              <td width="50%" style="text-align: left;">
                <b>For more query...</b><br /><br />
                Your Name :<br />
                <input type="text" name="name" /><br />
                Email address :<br />
                <input type="text" name="email" /><br />
                Subject to query :<br />
                <input type="text" name="subject" /><br />
                Details query :<br />
                <textarea name="msg"></textarea><br />
                <input type="submit" name="submit" value="Send Mail" />
              </td>
              <?php echo form_close(); ?>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </div>
</div>