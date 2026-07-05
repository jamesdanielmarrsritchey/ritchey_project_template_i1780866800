<?php
# Meta
/*
Name: Content Builder
Description: Build /Content files from source files. Outputs "TRUE" on success. Outputs "FALSE" on failure.
Notes:
- 
*/
# Content
$var_664f44bc_location_str = realpath(dirname(__FILE__));
$var_664f44bc_n_num = 1;
$var_664f44bc_base_path_str = realpath(dirname(__FILE__, $var_664f44bc_n_num));
$var_664f44bc_source_path_str = $var_664f44bc_base_path_str . '/Source';
while (is_dir($var_664f44bc_source_path_str) !== TRUE) {
	$var_664f44bc_n_num++;
	$var_664f44bc_base_path_str = realpath(dirname(__FILE__, $var_664f44bc_n_num));
	$var_664f44bc_source_path_str = $var_664f44bc_base_path_str . '/Source';
	if ($var_664f44bc_n_num > 50){
		exit(1);
	}
}
## Task
$var_664f44bc_return_str = TRUE;
require_once $var_664f44bc_source_path_str . '/content_builder/dependencies/ritchey_list_files_with_prefix_postfix_i1_v1/ritchey_list_files_with_prefix_postfix_i1_v1.php';
$var_664f44bc_content_path_str = $var_664f44bc_base_path_str . '/Content';
// Copy all .txt files from source to content
$var_664f44bc_items_arr = ritchey_list_files_with_prefix_postfix_i1_v1($var_664f44bc_source_path_str, NULL, '.txt', TRUE);
if (empty($var_664f44bc_items_arr) === TRUE){
	$var_664f44bc_return_str = FALSE;
}
foreach ($var_664f44bc_items_arr as &$var_664f44bc_item_str){
	$var_664f44bc_new_item_str = $var_664f44bc_content_path_str . '/' . basename($var_664f44bc_item_str);
	copy($var_664f44bc_item_str, $var_664f44bc_new_item_str);
}
unset($var_664f44bc_item_str);
// Run a Bash script
$var_664f44bc_output_arr = array();
$var_664f44bc_return_code_num = 0;
$var_664f44bc_external_program_path_str = $var_664f44bc_source_path_str . '/content_builder/custom_dependencies/hello_world.sh';
exec($var_664f44bc_external_program_path_str, $var_664f44bc_output_arr, $var_664f44bc_return_code_num);
//echo "Return code: {$var_664f44bc_return_code_num}" . PHP_EOL;
//print_r($var_664f44bc_output_arr);
// Run a PHP script
$var_664f44bc_output_arr = array();
$var_664f44bc_return_code_num = 0;
$var_664f44bc_external_program_path_str = $var_664f44bc_source_path_str . '/content_builder/custom_dependencies/hello_world.php';
exec("php {$var_664f44bc_external_program_path_str}", $var_664f44bc_output_arr, $var_664f44bc_return_code_num);
//echo "Return code: {$var_664f44bc_return_code_num}" . PHP_EOL;
//print_r($var_664f44bc_output_arr);
// Run a program
$var_664f44bc_output_arr = array();
$var_664f44bc_return_code_num = 0;
$var_664f44bc_external_program_path_str = $var_664f44bc_source_path_str . '/content_builder/custom_dependencies/hello_world.linux';
exec("{$var_664f44bc_external_program_path_str} --language 'English'", $var_664f44bc_output_arr, $var_664f44bc_return_code_num);
//echo "Return code: {$var_664f44bc_return_code_num}" . PHP_EOL;
//print_r($var_664f44bc_output_arr);
## Return
if ($var_664f44bc_return_str === TRUE){
	echo "TRUE" . PHP_EOL;
} else {
	echo "FALSE" . PHP_EOL;
}
?>