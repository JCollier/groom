<?php
	$filepath 	= dirname(__FILE__) . '/../../../mysql.bak/';
	$filename 	= $filepath . 'db_backup_' . date('YmdHis') . '.sql';
	$command 	= "mysqldump --opt -u root -p groom_common > {$filename}";

	system($command);
?>