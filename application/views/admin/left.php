<div id="left-column">
  <?php if($menu == 'sales'){ ?>
  <h3>Sales Options</h3>
  <ul class="nav">
    <li><a href="finish_inventory/add_sales">Sales Entry</a></li>
    <li class="last"><a href="finish_inventory">Sales List</a></li>
  </ul>
  <?php }elseif($menu == 'sales_return'){ ?>
  <h3>Return Options</h3>
  <ul class="nav">
    <li><a href="finish_inventory/add_return">Sales Return Entry</a></li>
    <li class="last"><a href="finish_inventory/return_list">Sales Return List</a></li>
  </ul>
  <?php }elseif($menu == 'receive'){ ?>
  <h3>Receive Options</h3>
  <ul class="nav">
    <li><a href="finish_inventory/add_receive">Receive Entry</a></li>
    <li class="last"><a href="finish_inventory/receive_list">Receive List</a></li>
  </ul>
  <?php }elseif($menu == 'sample_inventory'){ ?>
  <h3>Inventory Posting</h3>
  <ul class="nav">
    <li><a href="sample_inventory/add_receive">Receive Entry</a></li>
    <li><a href="sample_inventory/receive_list">Receive List</a></li>
    <li><a href="sample_inventory/add_supply">Supply Entry</a></li>
    <li class="last"><a href="sample_inventory/supply_list">Supply List</a></li>
  </ul>
  <h3>Inventory Report</h3>
  <ul class="nav">
    <li><a href="sample_inventory/report_by_date">Report by Date</a></li>
    <li class="last"><a href="sample_inventory/report_by_item">Report by Item</a></li>
  </ul>
  <?php }elseif($menu == 'raw_inventory'){ ?>
  <h3>Inventory Posting</h3>
  <ul class="nav">
    <li><a href="raw_inventory/add_item">Item Entry</a></li>
    <li><a href="raw_inventory">Item List</a></li>
    <li><a href="raw_inventory/add_receive">Receive Entry</a></li>
    <li><a href="raw_inventory/receive_list">Receive List</a></li>
    <li><a href="raw_inventory/add_supply">Supply Entry</a></li>
    <li class="last"><a href="raw_inventory/supply_list">Supply List</a></li>
  </ul>
  <h3>Inventory Report</h3>
  <ul class="nav">
    <li><a href="raw_inventory/report_by_date">Report by Date</a></li>
    <li class="last"><a href="raw_inventory/report_by_item">Report by Item</a></li>
  </ul>
  <?php }elseif($menu == 'accounts'){ ?>
  <h3>A/C Posting</h3>
    <ul class="nav">
      <li><a id="voucher_post" style="cursor: pointer;">Voucher Posting</a>
        <ul id="voucher_menu_post" style="list-style: none; margin-left: -30px; display: none;">
          <li><a href="accounts/add_journal_voucher_master">Journal Voucher</a></li>
          <li><a href="accounts/add_debit_voucher_master">Debit Voucher</a></li>
          <li><a href="accounts/add_credit_voucher_master">Credit Voucher</a></li>
        </ul>
      </li>
      <li><a id="voucher_list" style="cursor: pointer;">Vouchers List</a>
        <ul id="voucher_menu_list" style="list-style: none; margin-left: -30px; display: none;">
          <li><a href="accounts/journal_voucher_list">Journal Voucher</a></li>
          <li><a href="accounts/debit_voucher_list">Debit Voucher</a></li>
          <li><a href="accounts/credit_voucher_list">Credit Voucher</a></li>
        </ul>
      </li>
      <li><a href="accounts/add_chart_ac">Chart of A/C Entry</a></li>
      <li class="last"><a href="accounts">Chart of A/C List</a></li>
    </ul>
    <h3>A/C Reports</h3>
    <ul class="nav">
      <li><a href="accounts/report_chart_ac">Chart of A/C Details</a></li>
      <li><a href="accounts/report_trial_balance">Trial Balance</a></li>
      <li><a href="accounts/report_balance_sheet">Balance Sheet</a></li>
      <li class="last"><a href="accounts/report_income_statement">Income Statement</a></li>
    </ul>
  <?php }elseif($menu == 'human_resource'){ ?>
  <h3>HR Details</h3>
  <ul class="nav">
    <li><a href="human_resource/rsm_add">RSM Entry</a></li>
    <li><a href="human_resource">RSM List</a></li>
    <li><a href="human_resource/asm_add">ASM Entry</a></li>
    <li><a href="human_resource/asm_list">ASM List</a></li>
    <li><a href="human_resource/mpo_add">MPO Entry</a></li>
    <li class="last"><a href="human_resource/mpo_list">MPO List</a></li>
  </ul>
  <h3>HR Reports</h3>
  <ul class="nav">
    <li class="last"><a href="human_resource">Salary Sheet</a></li>
  </ul>
  <?php }elseif($menu == 'settings'){ ?>
  <h3>Settings Option</h3>
  <ul class="nav">
    <li><a href="settings/item_add">Item Entry</a></li>
    <li><a href="settings/item_list">Item List</a></li>
    <li><a href="settings/customer_add">Customer Entry</a></li>
    <li><a href="settings/customer_list">Customer List</a></li>
    <li><a href="settings/sales_office_add">Sales Office Entry</a></li>
    <li class="last"><a href="settings/sales_office_list">Sales Office List</a></li>
  </ul>
  <?php }elseif($menu == 'report'){ ?>
  <h3>Reports Option</h3>
  <ul class="nav">
    <li><a href="report/sales">Sales Report</a></li>
    <li><a href="report/return">Sales Return Report</a></li>
    <li><a href="report/receive">Receive Report</a></li>
    <li class="last"><a href="report/return">Stock Report</a></li>
  </ul>
  <?php }elseif($menu == 'user'){ ?>
  <h3>Users Option</h3>
  <ul class="nav">
    <li><a href="user/add">User Entry</a></li>
    <li class="last"><a href="user">User List</a></li>
  </ul>
  <?php } ?>
</div>