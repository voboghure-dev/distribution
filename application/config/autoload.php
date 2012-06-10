<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');
/*
  | -------------------------------------------------------------------
  | AUTO-LOADER
  | -------------------------------------------------------------------
  | This file specifies which systems should be loaded by default.
  |
  | In order to keep the framework as light-weight as possible only the
  | absolute minimal resources are loaded by default. For example,
  | the database is not connected to automatically since no assumption
  | is made regarding whether you intend to use it.  This file lets
  | you globally define which systems you would like loaded with every
  | request.
  |
  | -------------------------------------------------------------------
  | Instructions
  | -------------------------------------------------------------------
  |
  | These are the things you can load automatically:
  |
  | 1. Packages
  | 2. Libraries
  | 3. Helper files
  | 4. Custom config files
  | 5. Language files
  | 6. Models
  |
 */

/*
  | -------------------------------------------------------------------
  |  Auto-load Packges
  | -------------------------------------------------------------------
  | Prototype:
  |
  |  $autoload['packages'] = array(APPPATH.'third_party', '/usr/local/shared');
  |
 */

$autoload['packages'] = array(APPPATH . 'third_party');


/*
  | -------------------------------------------------------------------
  |  Auto-load Libraries
  | -------------------------------------------------------------------
  | These are the classes located in the system/libraries folder
  | or in your application/libraries folder.
  |
  | Prototype:
  |
  |	$autoload['libraries'] = array('database', 'session', 'xmlrpc');
 */

$autoload['libraries'] = array('database', 'session', 'upload', 'form_validation', 'email');


/*
  | -------------------------------------------------------------------
  |  Auto-load Helper Files
  | -------------------------------------------------------------------
  | Prototype:
  |
  |	$autoload['helper'] = array('url', 'file');
 */

$autoload['helper'] = array('url', 'form', 'security', 'general');


/*
  | -------------------------------------------------------------------
  |  Auto-load Config files
  | -------------------------------------------------------------------
  | Prototype:
  |
  |	$autoload['config'] = array('config1', 'config2');
  |
  | NOTE: This item is intended for use ONLY if you have created custom
  | config files.  Otherwise, leave it blank.
  |
 */

$autoload['config'] = array();


/*
  | -------------------------------------------------------------------
  |  Auto-load Language files
  | -------------------------------------------------------------------
  | Prototype:
  |
  |	$autoload['language'] = array('lang1', 'lang2');
  |
  | NOTE: Do not include the "_lang" part of your file.  For example
  | "codeigniter_lang.php" would be referenced as array('codeigniter');
  |
 */

$autoload['language'] = array();


/*
  | -------------------------------------------------------------------
  |  Auto-load Models
  | -------------------------------------------------------------------
  | Prototype:
  |
  |	$autoload['model'] = array('model1', 'model2');
  |
 */

$autoload['model'] = array(
    'ac/MAc_charts', 
    'ac/MAc_journal_voucher_master', 'ac/MAc_journal_voucher_details', 
    'ac/MAc_debit_voucher_master', 'ac/MAc_debit_voucher_details', 
    'ac/MAc_credit_voucher_master', 'ac/MAc_credit_voucher_details', 
    
    'finish/MFinish_items', 
    'finish/MFinish_sales_master', 'finish/MFinish_sales_details', 
    'finish/MFinish_return_master', 'finish/MFinish_return_details', 
    'finish/MFinish_receive_master', 'finish/MFinish_receive_details', 
    
    'sample/MSample_receive_master', 'sample/MSample_receive_details', 
    'sample/MSample_supply_master', 'sample/MSample_supply_details', 
    
    'raw/MRaw_items', 
    'raw/MRaw_receive_master', 'raw/MRaw_receive_details', 
    'raw/MRaw_supply_master', 'raw/MRaw_supply_details', 
    
    'hr/MHr_rsm_info', 'hr/MHr_asm_info', 'hr/MHr_mpo_info', 
    
    'MCustomers', 'MSales_offices', 'MSuppliers', 'MUsers', 'MEmp_details'
    
);


/* End of file autoload.php */
/* Location: ./application/config/autoload.php */