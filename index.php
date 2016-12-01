<?php
	echo "test-10-learnTheMysqliFromPhp 发布成功";
	// phpinfo();
	var_dump(extension_loaded('mysqli'));
	echo '<hr/>';
	var_dump(function_exists('mysqli_connect'));
	echo '<hr/>';
	print_r(get_loaded_extensions());
?>