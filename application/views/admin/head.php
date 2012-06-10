<title><?php echo $title; ?></title>
<base href="<?php echo base_url(); ?>" />
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="keywords" content="POS, point of sale, bangladeshi, bangladesh, ERP, accounting, online" />
<meta name="description" content="Bangladeshi First Ever Online Point of Sale System which best suit for your organization." />
<link type="text/css" href="css/admin.css" rel="stylesheet" />

<script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>

<script type="text/javascript" src="js/jquery-ui-1.8.13.custom.min.js"></script>
<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.13.custom.css" rel="stylesheet" />

<script>
  $(function() {
    $( ".jq_date" ).datepicker({ dateFormat: 'yy-mm-dd' });
    
    $('#voucher_post').click(function() {
      $('#voucher_menu_post').slideToggle();
    });
    
    $('#voucher_list').click(function() {
      $('#voucher_menu_list').slideToggle();
    });
  });
</script>
