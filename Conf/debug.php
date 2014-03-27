<?php
return array(
	//'配置项'=>'配置值'
	// 添加数据库配置信息
	 'DB_TYPE'   => 'mysql', // 数据库类型
	 'DB_HOST'   => 'localhost', // 服务器地址
	 'DB_NAME'   => 'phptest', // 数据库名
	 'DB_USER'   => 'phptest', // 用户名
	 'DB_PWD'    => 'phptest', // 密码
	 'DB_PORT'   => 3306, // 端口
	 'DB_PREFIX' => 'think_', // 数据库表前缀
	//'DB_DSN' => 'mysql://root@localhost:3306/phptest'
	// 使用DB_DSN方式定义可以简化配置参数，DSN参数格式为：
	// 数据库类型://用户名:密码@数据库地址:数据库端口/数据库名
	// 如果两种配置参数同时存在的话，DB_DSN配置参数优先。

	 
);
?>