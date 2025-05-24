<?php
/**
 * Typecho Blog Platform
 *
 * @copyright  Copyright (c) 2008 Typecho team (http://www.typecho.org)
 * @license    GNU General Public License 2.0
 * @version    $Id$
 */

/** 开启https */
define('__TYPECHO_SECURE__', true);

/** 定义根目录 */
define('__TYPECHO_ROOT_DIR__', dirname(__FILE__));

/** 定义插件目录(相对路径) */
define('__TYPECHO_PLUGIN_DIR__', '/usr/plugins');

/** 定义模板目录(相对路径) */
define('__TYPECHO_THEME_DIR__', '/usr/themes');

/** 后台路径(相对路径) */
define('__TYPECHO_ADMIN_DIR__', '/admin/');

/** 设置包含路径 */
@set_include_path(get_include_path() . PATH_SEPARATOR . __TYPECHO_ROOT_DIR__ . '/var' . PATH_SEPARATOR . __TYPECHO_ROOT_DIR__ . __TYPECHO_PLUGIN_DIR__);

/** 载入API支持 */
require_once 'Typecho/Common.php';

/** 程序初始化 */
Typecho_Common::init();

/** 定义数据库参数 */
$db = new Typecho_Db($_ENV['DRIVER'] ?? 'Pdo_Mysql', $_ENV["PREFIX"] ?? 'typecho_');

// 设置数据库服务器信息
$db->addServer([
  'host' => $_ENV['HOST'], // 获取环境变量MYSQL_HOST的值 数据库地址,
  'database' => $_ENV['DATABASE'], // 获取环境变量MYSQL_DATABASE的值 数据库名称,
  'user' => $_ENV['USER'], // 获取环境变量MYSQL_USER的值 数据库用户名,
  'password' => $_ENV['PASSWORD'], // 获取环境变量MYSQL_PASSWORD的值 数据库密码,
  'port' => $_ENV['PORT'] ?? 3306, // 获取环境变量MYSQL_PORT的值,数据库端口号,
  'charset' => $_ENV['CHARSET'] ?? 'utf8mb4', // 获取字符集,默认值'utf8mb4',
  'engine' => $_ENV['ENGINE'] ?? 'InnoDB',   // 数据库引擎
], Typecho_Db::READ | Typecho_Db::WRITE);

Typecho_Db::set($db);
