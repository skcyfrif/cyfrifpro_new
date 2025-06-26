<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/


// $$$$$$$$$$$$$ SITE ROUTES  $$$$$$$$$$$$$$$$$$ //

$route['career']='main/career';
$route['completed']='main/exam_completed';
$route['all-tests']='main/all_tests';
$route['rendering/(.*)']='main/rendering/$1';
$route['introduction/(.*)']='main/introduction/$1';
$route['test/(.*)']='main/test/$1';
$route['about-us']='main/about_us';

$route['Private_Wealth_Management']='main/Private_Wealth_Management';
$route['Mutual_Fund']='main/Mutual_Fund';
$route['Share_Trading']='main/Share_Trading';
$route['General_Insurance']='main/General_Insurance';
$route['Health_Insurance']='main/Health_Insurance';
$route['fixed_deposit']='main/fixed_deposit';
$route['Life_Insurance']='main/Life_Insurance';


$route['Credit_Counseling']='main/Credit_Counseling';
$route['Debt_Settlement']='main/Debt_Settlement';
$route['Rectify_Error']='main/Rectify_Error';
$route['Repair_Score']='main/Repair_Score';


$route['contact-us']='main/contact_us';
$route['Tax-Services']='main/main1';
$route['Debt-Management']='main/main2';
$route['CREDIT-REPAIR-AND--DEBT-MANAGEMENT-SERVICES']='main/main2';
$route['Finance-And-Accounts']='main/main3';
$route['Investment']='main/main4';
$route['Loans']='main/main5';
$route['Optimized-And-Accelerate-Services']='main/main6';
$route['Vision-&-Value']='main/vision_and_value';
$route['bookkeeping']='main/bookkeeping';
$route['gst-Individuals']='main/gst_Individuals';
$route['tds-advisory-services']='main/tds_advisory_services';
$route['financial-reporting']='main/financial_reporting';
$route['admin/account']='account/index';
$route['admin/account']='account/index';
$route['client/getData']='admin/getData';
$route['client/payment-recieved/(:any)']='client/payment_recieved_invoice/$1';
$route['inventory/import']='Csv/import';
$route['information-hub']='main/information_hub';
$route['Blog']='main/Blog';
$route['customer/csv']='Csv/csv_cusimport';
$route['customer/import']='Csv/cusimport';
$route['estimate/csv']='Csv/csv_estimate_import';
$route['estimate/import']='Csv/estimate_import';
$route['sales-order/csv']='Csv/sales_order_csv';
$route['sales-order/import']='Csv/sales_order_import';
$route['delivery-challan/csv']='Csv/delivery_challan_csv';
$route['delivery-challan/import']='Csv/delivery_challan_import';
$route['invoices/csv']='Csv/invoices_csv';
$route['invoices/import']='Csv/invoices_import';
$route['payment-recieved/csv']='Csv/payment_recieved_csv';
$route['payment-recieved/import']='Csv/payment_recieved_import';
$route['recurring-invoice/csv']='Csv/recurring_invoice_csv';
$route['recurring-invoice/import']='Csv/recurring_invoice_import';
$route['credit-notes/csv']='Csv/credit_notes_csv';
$route['credit-notes/import']='Csv/credit_notes_import';
$route['vendor/csv']='Csv/vendor_csv';
$route['vendor/import']='Csv/vendor_import';
$route['expense/csv']='Csv/expense_csv';
$route['expense/import']='Csv/expense_import';
$route['recurring-expense/csv']='Csv/recurring_expense_csv';
$route['recurring-expense/import']='Csv/recurring_expense_import';
$route['Capital-Gain']='main/Capital_Gain';
$route['gst-advisory-services']='main/gst_advisory_services';
$route['gst-Individuals']='main/gst_Individuals';
$route['Individual-Tax-Serices']='main/Individual_Tax_Serices';
$route['Inventory-Management']='main/Inventory_Management';
$route['tds-advisory-services']='main/tds_advisory_services';

$route['inventory/group-items']='inventory/group_items';
$route['inventory/add-group-items']='inventory/add_group_items';
$route['inventory/add-group-items/(.*)']='inventory/add_group_items/$1';
$route['inventory/add-attribute']='inventory/add_attribute';
$route['inventory/add-attribute/(.*)']='inventory/add_attribute/$1';
$route['inventory/add-brand']='inventory/add_brand';
$route['inventory/add-brand/(.*)']='inventory/add_brand/$1';
$route['inventory/add-manufacture']='inventory/add_manufacture';
$route['inventory/add-manufacture/(.*)']='inventory/add_manufacture/$1';
$route['brand/csv']='Csv/brand';
$route['brand/import']='Csv/brand_import';

$route['inventory/delete-group-items/(.*)']='inventory/delete_group_items/$1';


$route['group-items/csv']='Csv/group_items';
$route['group-items/import']='Csv/group_items_import';

$route['client/update-profile/(.*)']='Clientstore/update_profile/$1';
$route['client/add-warehouse']='Clientstore/add_warehouse';
$route['client/add-warehouse/(.*)']='Clientstore/add_warehouse/$1';
$route['client/warehouse']='Clientstore/warehouse';
$route['client/autologin'] = 'client/autologin';



$route['preferences']='Clientstore/preferences';
$route['preferences/customers-and-vendors']='Preferences/customers_and_vendors';
$route['preferences/sales-orders']='Preferences/salesorders';
$route['preferences/delivery-challans']='Preferences/delivery_challans';
$route['preferences/payments-received']='Preferences/payments_received';
$route['preferences/credit-notes']='Preferences/credit_notes';
$route['preferences/purchase-orders']='Preferences/purchase_orders';
$route['preferences/tax-rate']='Preferences/tax_rate';
$route['preferences/gst-setting']='Preferences/gst_setting';
$route['setting/add-user-role']='Preferences/add_user_role';
$route['setting/add-user-role/(.*)']='Preferences/add_user_role/$1';
$route['setting/user-role']='Preferences/user_role';
$route['setting/user_role']='Preferences/user_role';

// *************** Dynamic **************

$rawURI=explode('/',$_SERVER['REQUEST_URI']);

$totalURI=count($rawURI);
$exceptionArr=array('about-us','contact-us','information-hub','career','admin','main','inventory','customer','client','vision-&-value','introduction','exam','all-tests','rendering','test','completed','employee','Clientstore','brand','group-items','update-profile','add-warehouse','warehouse','preferences','setting');

if(!in_array($rawURI[1],$exceptionArr)){

	// if($totalURI == 3)
	// {
	// 	$url=$rawURI[1].'/'.$rawURI[2];
	// 	$route[$url]='main/service_details/'.$rawURI[2];
	// }
	// else if($totalURI == 2)
	// {
	// 	$url=$rawURI[1];
	// 	$route[$url]='main/main_service_details/'.$rawURI[1];
	// }

	if($totalURI == 3){
		$url=$rawURI[1].'/'.$rawURI[2];
		$route[$url]='main/service_details/'.$rawURI[2];
	}
}

// *************** End Dynamic **************



// $$$$$$$$$$$$$ End SITE ROUTES  $$$$$$$$$$$$$$$$$$ //


// $$$$$$$$$$$$$ ADMIN  ROUTES  $$$$$$$$$$$$$$$$$$ //

$route['logout']='admin/logout';

// $$$$$$$$$$$$$ End ADMIN  ROUTES  $$$$$$$$$$$$$$$$$$ //



$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;