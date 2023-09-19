<?php
require_once(LIB_PATH . DS . 'database.php');
class Postulantes
{
	protected static  $tblname = "tblPostulante";

	function dbfields()
	{
		global $mydb;
		return $mydb->getfieldsononetable(self::$tblname);
	}
	function listofPostulante()
	{
		global $mydb;
		$mydb->setQuery("SELECT * FROM " . self::$tblname);
		return $cur;
	}
	function find_Postulante($id = "", $dni = "")
	{
		global $mydb;
		$mydb->setQuery("SELECT * FROM " . self::$tblname . " 
			WHERE IDPOSTULANTE = {$id} OR DNI = '{$dni}'");
		$cur = $mydb->executeQuery();
		$row_count = $mydb->num_rows($cur);
		return $row_count;
	}

	function find_all_Postulante($dni = "", $apellidos = "", $nombres = "")
	{
		global $mydb;
		$mydb->setQuery("SELECT * FROM " . self::$tblname . " 
			WHERE LNAME = '{$dni}' AND FNAME= '{$apellidos}' AND MNAME='{$nombres}'");
		$cur = $mydb->executeQuery();
		$row_count = $mydb->num_rows($cur);
		return $row_count;
	}

	function single_Postulante($id = "")
	{
		global $mydb;
		$mydb->setQuery("SELECT * FROM " . self::$tblname . " 
				Where IDPOSTULANTE= '{$id}' LIMIT 1");
		$cur = $mydb->loadSingleResult();
		return $cur;
	}
	function select_Postulante($id = "")
	{
		global $mydb;
		$mydb->setQuery("SELECT * FROM " . self::$tblname . " 
				Where IDPOSTULANTE= '{$id}' LIMIT 1");
		$cur = $mydb->loadSingleResult();
		return $cur;
	}

	function postulante_Authentication($U_USERNAME, $h_pass)
	{
		global $mydb;
		$mydb->setQuery("SELECT * FROM `tblPostulante` WHERE `NOMBREUSUARIO`='" . $U_USERNAME . "' AND `CONTRASENA`='" . $h_pass . "'");
		$cur = $mydb->executeQuery();
		if ($cur == false) {
			die(mysql_error());
		}
		$row_count = $mydb->num_rows($cur); //get the number of count
		if ($row_count == 1) {
			$emp_found = $mydb->loadSingleResult();
			$_SESSION['IDPOSTULANTE']   		= $emp_found->IDPOSTULANTE;
			$_SESSION['NOMBREUSUARIO'] 			= $emp_found->NOMBREUSUARIO;
			return true;
		} else {
			return false;
		}
	}


	/*---Instantiation of Object dynamically---*/
	static function instantiate($record)
	{
		$object = new self;

		foreach ($record as $attribute => $value) {
			if ($object->has_attribute($attribute)) {
				$object->$attribute = $value;
			}
		}
		return $object;
	}


	/*--Cleaning the raw data before submitting to Database--*/
	private function has_attribute($attribute)
	{
		// We don't care about the value, we just want to know if the key exists
		// Will return true or false
		return array_key_exists($attribute, $this->attributes());
	}

	protected function attributes()
	{
		// return an array of attribute names and their values
		global $mydb;
		$attributes = array();
		foreach ($this->dbfields() as $field) {
			if (property_exists($this, $field)) {
				$attributes[$field] = $this->$field;
			}
		}
		return $attributes;
	}

	protected function sanitized_attributes()
	{
		global $mydb;
		$clean_attributes = array();
		// sanitize the values before submitting
		// Note: does not alter the actual value of each attribute
		foreach ($this->attributes() as $key => $value) {
			$clean_attributes[$key] = $mydb->escape_value($value);
		}
		return $clean_attributes;
	}


	/*--Create,Update and Delete methods--*/
	public function save()
	{
		// A new record won't have an id yet.
		return isset($this->id) ? $this->update() : $this->create();
	}

	public function create()
	{
		global $mydb;
		// Don't forget your SQL syntax and good habits:
		// - INSERT INTO table (key, key) VALUES ('value', 'value')
		// - single-quotes around all values
		// - escape all values to prevent SQL injection
		$attributes = $this->sanitized_attributes();
		$sql = "INSERT INTO " . self::$tblname . " (";
		$sql .= join(", ", array_keys($attributes));
		$sql .= ") VALUES ('";
		$sql .= join("', '", array_values($attributes));
		$sql .= "')";
		echo $mydb->setQuery($sql);

		if ($mydb->executeQuery()) {
			$this->id = $mydb->insert_id();
			return true;
		} else {
			return false;
		}
	}

	public function update($id = '')
	{
		global $mydb;
		$attributes = $this->sanitized_attributes();
		$attribute_pairs = array();
		foreach ($attributes as $key => $value) {
			$attribute_pairs[] = "{$key}='{$value}'";
		}
		$sql = "UPDATE " . self::$tblname . " SET ";
		$sql .= join(", ", $attribute_pairs);
		$sql .= " WHERE IDPOSTULANTE='" . $id . "'";
		$mydb->setQuery($sql);
		if (!$mydb->executeQuery()) return false;
	}

	public function APLupdate($id = 0)
	{
		global $mydb;
		$attributes = $this->sanitized_attributes();
		$attribute_pairs = array();
		foreach ($attributes as $key => $value) {
			$attribute_pairs[] = "{$key}='{$value}'";
		}
		$sql = "UPDATE " . self::$tblname . " SET ";
		$sql .= join(", ", $attribute_pairs);
		$sql .= " WHERE IDPOSTULANTE=" . $id;
		$mydb->setQuery($sql);
		if (!$mydb->executeQuery()) return false;
	}

	public function delete($id = '')
	{
		global $mydb;
		$sql = "DELETE FROM " . self::$tblname;
		$sql .= " WHERE IDPOSTULANTE='" . $id . "'";
		$sql .= " LIMIT 1 ";
		$mydb->setQuery($sql);
		if (!$mydb->executeQuery()) return false;
	}
}
