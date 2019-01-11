<?php
class AppManager 
{
	
	public static function run ($config)
	{
		echo 'Application is now runing with the following configuration..';
		var_dump($config);
	}
}