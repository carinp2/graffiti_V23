<?php
/**
 * This - https://devjunky.com/PHP-OOP-Database-Class-Example/
 * Also good - https://gist.github.com/anjerodesu/4502474
 * https://bestofphp.com/repo/khaderhan-Secure-Database-PHP-Class - Best
 */

/**
 * This lightweight database class is written with PHP and uses the MySQLi extension, it uses prepared statements
 * to properly secure your queries, no need to worry about SQL injection attacks.
 *
 * The MySQLi extension has built-in prepared statements that you can work with, this will prevent SQL injection
 * and prevent your database from being exposed, some developers are confused on how to use these methods correctly
 * so I've created this easy to use database class that'll do the work for you.
 *
 * This database class is beginner-friendly and easy to implement, with the native MySQLi methods you need to
 * write 3-7 lines of code to retrieve data from a database, with this class you can do it with just 1-2 lines of code,
 * and is much easier to understand.
 *
 * First version by: David Adams, 2020-03-05, https://codeshack.io/super-fast-php-mysql-database-class/
 */
class db
{
	protected $connection;
	protected $query;
	protected $show_errors = TRUE;
	protected $query_closed = TRUE;
	public $query_count = 0;

	public function __construct($dbhost = '', $dbuser = '', $dbpass = '', $dbname = '', $charset = 'utf8')
	{
		$this->root = $_SERVER["DOCUMENT_ROOT"];
		$this->getEnv();
		$this->getConnectionSettings();

		$this->connection = new mysqli($this->conn_obj["host"], $this->conn_obj["username"], $this->conn_obj["password"], $this->conn_obj["schema"]);
		if ($this->connection->connect_error) {
			$this->error('Failed to connect to MySQL - '.$this->connection->connect_error);
		}
		$this->connection->set_charset($charset);
	}

	public function query($query)
	{
		$this->closeOpenQuery();
		if (!$this->query = $this->connection->prepare($query)) {
			$this->error('Unable to prepare MySQL statement (check your syntax) - '.$this->connection->error);
		}
		if (func_num_args() > 1) {
			$x = func_get_args();
			$args = array_slice($x, 1);
			$types = '';
			$args_ref = array();
			foreach ($args as $k => &$arg) {
				if (is_array($args[$k])) {
					foreach ($args[$k] as $j => &$a) {
						$types .= $this->_gettype($args[$k][$j]);
						$args_ref[] = &$a;
					}
				} else {
					$types .= $this->_gettype($args[$k]);
					$args_ref[] = &$arg;
				}
			}
			array_unshift($args_ref, $types);
			call_user_func_array(array($this->query, 'bind_param'), $args_ref);
		}

		$this->query->execute();
		if ($this->query->errno) {
			$this->error('Unable to process MySQL query (check your params) - '.$this->query->error);
		}
		$this->query_closed = FALSE;
		$this->query_count++;

		return $this;
	}

	public function fetchAll($callback = null)
	{
		$params = array();
		$row = array();
		$meta = $this->query->result_metadata();
		while ($field = $meta->fetch_field()) {
			$params[] = &$row[$field->name];
		}
		call_user_func_array(array($this->query, 'bind_result'), $params);
		$result = array();
		while ($this->query->fetch()) {
			$r = array();
			foreach ($row as $key => $val) {
				$r[$key] = $val;
			}
			if ($callback != null && is_callable($callback)) {
				$value = call_user_func($callback, $r);
				if ($value == 'break') break;
			} else {
				$result[] = $r;
			}
		}
		$this->closeOpenQuery();
		return $result;
	}

	public function fetchArray()
	{
		$params = array();
		$row = array();
		$meta = $this->query->result_metadata();
		while ($field = $meta->fetch_field()) {
			$params[] = &$row[$field->name];
		}
		call_user_func_array(array($this->query, 'bind_result'), $params);
		$result = array();
		while ($this->query->fetch()) {
			foreach ($row as $key => $val) {
				$result[$key] = $val;
			}
		}
		$this->closeOpenQuery();
		return $result;
	}

	public function close()
	{
		$this->closeOpenQuery();
		return $this->connection->close();
	}

	public function numRows()
	{
		$this->query->store_result();
		return $this->query->num_rows;
	}

	public function affectedRows()
	{
		return $this->query->affected_rows;
	}

	public function lastInsertID()
	{
		return $this->connection->insert_id;
	}

	public function error($error)
	{
		if ($this->show_errors) {
			exit($error);
		}
	}

	private function _gettype($var)
	{
		if (is_string($var)) return 's';
		if (is_float($var)) return 'd';
		if (is_int($var)) return 'i';
		return 'b';
	}

	private function closeOpenQuery()
	{
		if (!$this->query_closed) {
			$this->query->close();
			$this->query_closed = TRUE;
		}
	}

	private function getEnv()
	{
		if (!isset($_SESSION["env"])) {
			require_once($this->root."/model/common.php");
			$this->setEnv();
		}
		$this->env = $_SESSION["env"];
	}

	public function setEnv()
	{
		if (!isset($_SESSION)) {
			session_start();
		}
		if ($_SERVER['HTTP_HOST'] == 'graffitiboeke.co.za') {
			$_SESSION['env'] = 'live';
		} else {
			$_SESSION['env'] = 'local';
		}
	}

	public function getConnectionSettings()
	{
		if ($this->env == "local") {
			$con_filename = "config";
		} else {
			$con_filename = md5("config_live_graffiti");//45818f08cfb54bff1ad8eb97781d47d7.ini
		}
		$available_conss = parse_ini_file($_SERVER["DOCUMENT_ROOT"]."/config/".$con_filename.".ini", true);
		if (!$available_conss) {
			unset($con_filename);
			unset($available_conss);
			exit("No Availible Connections");
		}
		if ($this->env == "live") {
			$this->conn_obj = new stdClass();
			$this->conn_obj = $available_conss["live"];
		} else {
			$this->conn_obj = new stdClass();
			$this->conn_obj = $available_conss["local"];
		}
		unset($con_filename);
		unset($available_conss);
	}

	public function executeStatement($statement = "", $parameters = [])
	{
		try {
			$stmt = $this->connection->prepare($statement);
			$stmt->execute($parameters);
			return $stmt;
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
	}

	public function insertQuery($statement = "", $parameters = [], $pTable = "", $pFields = "")
	{
		try {
			$this->executeStatement($statement, $parameters);
			$vLastId = $this->lastInsertID();
			return $vLastId;
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
	}

	/**
	 * Generic insert query
	 *
	 * @param object $pConn Database connection
	 * @param string $pTable Table to update
	 * @param [] $pData Field, value array
	 * @return number
	 */
	public function doInsert($pTable, $pData)
	{
		$q = 'INSERT into '.$pTable.' ';
		$v = '';
		$n = '';
		$vFields = '';
		$vValues = '';
		foreach ($pData as $key => $val) {
			$n .= "$key, ";
			$vFields .= "$key~ ";
			if (strtolower($val) == 'null') {
				$v .= 'NULL, ';
				$vValues .= 'NULL~ ';
			} elseif (strtolower($val) == 'now()') {
				$v .= 'NOW(), ';
				$vValues .= 'NOW()~ ';
			} else {
				$v .= "\"".$val."\", ";
				$vValues .= "\"".$val."\"~ ";
			}
		}
		$q .= '('.rtrim($n, ', ').') VALUES ('.rtrim($v, ', ').');';

		if (mysqli_query($this->connection, $q)) {
			$vResult = mysqli_insert_id($this->connection);
		} else {
			$vResult = 0;
		}
		return $vResult;
	}

	/**
	 * Generic update
	 *
	 * @param object $pConn Database connection
	 * @param string $pTable Table to update
	 * @param [] $pData Field, value array
	 * @param string $pWhere Where clause
	 */
	public function doUpdate($pTable, $pData, $pWhere, $vItemId)
	{
		$vFields = "";
		$vValues = "";
		$q = 'UPDATE '.$pTable.' SET ';
		foreach ($pData as $key => $val) {
			if (strtolower($val) == 'null') {
				$q .= "$key = NULL, ";
			} elseif (strtolower($val) == 'now()') {
				$q .= "$key = NOW(), ";
			} else {
				$q .= "$key=\"".$val."\", ";
			}
			$vFields .= "~".$key;
			$vValues .= "~".$val;
		}

		if (strlen($pWhere) > 0) {
			$sqlString = rtrim($q, ', ').' WHERE '.$pWhere.';';
		} else {
			$sqlString = rtrim($q, ', ').';';
		}

		if (mysqli_query($this->connection, $sqlString) or die(mysqli_error($this->connection))) {
			$vResult = 1;
		} else {
			$vResult = 0;
		}
		return $vResult;
	}

	public function doDelete($pTable, $pWhere, $vItemId)
	{
		$sqlString = 'DELETE from '.$pTable.' WHERE '.$pWhere;
		if (mysqli_query($this->connection, $sqlString)) {
			$vResult = 1;
		} else {
			$vResult = 0;
		}
		return $vResult;
	}

	public function doSelect($vSQL, $vParams)
	{
		$result = $this->query($vSQL, $vParams)->fetchAll();
		if (isset($result) && !empty($result)) {
			return $result;
		} else {
			return false;
		}
	}

	public function checkExists($vTable, $vCountField, $vCondition, $vParams)
	{
		$vSQL = "
            SELECT 
                COUNT(".$vCountField.") AS numCount
            FROM
                ".$vTable."
            WHERE ".$vCondition;
		$result = $this->dbModelObj->query($vSQL, $vParams)->fetchArray();

		return $result;
	}

}