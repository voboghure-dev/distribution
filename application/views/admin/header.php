<div id="header">
  <div style="padding-left: 20px; padding-top: 25px; font-size: 20px;">
    Sales & Distribution Management System
  </div>
  <ul id="top-navigation">
    <?php if($menu == 'sales'){ ?>
    <li class="active"><span><span>Sales</span></span></li>
    <?php }else{ ?>
    <li><span><span><a href="finish_inventory">Sales</a></span></span></li>
    <?php } if($menu == 'sales_return'){ ?>
    <li class="active"><span><span>Sales Return</span></span></li>
    <?php }else{ ?>
    <li><span><span><a href="finish_inventory/return_list">Sales Return</a></span></span></li>
    <?php } if($menu == 'receive'){ ?>
    <li class="active"><span><span>Receive</span></span></li>
    <?php }else{ ?>
    <li><span><span><a href="finish_inventory/receive_list">Receive</a></span></span></li>
    <?php } if($menu == 'sample_inventory'){ ?>
    <li class="active"><span><span>Sample</span></span></li>
    <?php }else{ ?>
    <li><span><span><a href="sample_inventory/receive_list">Sample</a></span></span></li>
    <?php } if($menu == 'raw_inventory'){ ?>
    <li class="active"><span><span>Factory</span></span></li>
    <?php }else{ ?>
    <li><span><span><a href="raw_inventory/receive_list">Factory</a></span></span></li>
    <?php } if($menu == 'accounts'){ ?>
    <li class="active"><span><span>Accounts</span></span></li>
    <?php }else{ ?>
    <li><span><span><a href="accounts">Accounts</a></span></span></li>
    <?php } if($menu == 'human_resource'){ ?>
    <li class="active"><span><span>HR</span></span></li>
    <?php }else{ ?>
    <li><span><span><a href="human_resource">HR</a></span></span></li>
    <?php } if($menu == 'settings'){ ?>
    <li class="active"><span><span>Settings</span></span></li>
    <?php }else{ ?>
    <li><span><span><a href="settings/item_list">Settings</a></span></span></li>
    <?php } if($menu == 'report'){ ?>
    <li class="active"><span><span>Reports</span></span></li>
    <?php }else{ ?>
    <li><span><span><a href="report">Reports</a></span></span></li>
    <?php } if($menu == 'user'){ ?>
    <li class="active"><span><span>Users</span></span></li>
    <?php }else{ ?>
    <li><span><span><a href="user">Users</a></span></span></li>
    <?php } ?>
    <li><span><span><a href="homepage/logout">Logout</a></span></span></li>
  </ul>
</div>