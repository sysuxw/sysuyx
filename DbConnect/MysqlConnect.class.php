<?php # MysqlConnect.class.php
	class MysqlConnect {
		private $__host;
		private $__name;
		private $__pass;
		private $__db_name;
		private $__charset;

		// 保存类实例的静态成员变量
		private static $__instance;
	    
		// 初始化
		private function __construct() {
			if (defined('SAE_MYSQL_HOST_M')) {
		    	$this->__host = SAE_MYSQL_HOST_M . ':' . SAE_MYSQL_PORT;
			    $this->__name = SAE_MYSQL_USER;
			    $this->__pass = SAE_MYSQL_PASS;
			    $this->__db_name = SAE_MYSQL_DB;
			} else {
				$this->__host = 'localhost' . ':' . '3306';
				$this->__name = 'root';
				$this->__pass = '';
				$this->__db_name = 'app_sysuyx';
			}
		   	$this->__charset = 'utf-8';
		   	$this->__connect();	//创建类即连接数据库
		}

		// 创建__clone方法防止对象被复制克隆
		function __clone() {
			trigger_error('Clone is not allow!', E_USER_ERROR);
		}
	 
		// 用于访问单例方法
		public static function getInstance() {
			if (!(self::$__instance instanceof self)) {
				self::$__instance = new self;
			}
			return self::$__instance;
		}

		// 连接数据库
		private function __connect() {
			$link = mysql_connect($this->__host, $this->__name, $this->__pass) or die("Can't connect database: " . mysql_error());
			mysql_select_db($this->__db_name, $link) or die("没该数据库：" . $this->__db_name);
			mysql_query("set character set 'utf-8'");   // PHP 文件为 utf-8 格式时使用
	        mysql_query("SET NAMES 'utf-8'");
		}
		
		public function query($sql) {
		    $this->result = mysql_query($sql) or $this->_err($sql);
			return $this->result;
		}
		
		//单行记录
		public function getRow($result, $type = MYSQL_ASSOC) {
		    if($result)
			    return mysql_fetch_array($result, $type);
			else
			    echo 'error in getRow';
		}
		
		//多行记录
		public function getRows($result, $type = MYSQL_ASSOC) {
			$rows = array();
		    if($result) {
			    while($row = mysql_fetch_array($result, $type)) {
				    $rows[] = $row;
				}
				return $rows;
			}
			else
			    echo 'error in getRows';
		}
		
		protected function _err($sql = null) {
		    echo mysql_error();
			exit();
		}
	}
?>
