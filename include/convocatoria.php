<?php
require_once(LIB_PATH . DS . 'database.php');
class Convocatoria
{
	protected static  $tblname = "tblConvocatoria";

	function dbfields()
	{
		global $mydb;
		return $mydb->getfieldsononetable(self::$tblname);
	}
	function listofconvocatoria()
	{
		global $mydb;
		$mydb->setQuery("SELECT * FROM " . self::$tblname);
		return $cur;
	}


	function single_convocatoria($id = "")
	{
		global $mydb;
		$mydb->setQuery("SELECT * FROM " . self::$tblname . " 
				Where IDCONVOCATORIA = '{$id}' LIMIT 1");
		$cur = $mydb->loadSingleResult();
		return $cur;
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

	private function has_attribute($attribute)
	{
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
		foreach ($this->attributes() as $key => $value) {
			$clean_attributes[$key] = $mydb->escape_value($value);
		}
		return $clean_attributes;
	}


	/*-- Métodos de Crear Actualizar y Eliminar --*/
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

	public function update($id = 0)
	{
		global $mydb;
		$attributes = $this->sanitized_attributes();
		$attribute_pairs = array();
		foreach ($attributes as $key => $value) {
			$attribute_pairs[] = "{$key}='{$value}'";
		}
		$sql = "UPDATE " . self::$tblname . " SET ";
		$sql .= join(", ", $attribute_pairs);
		$sql .= "WHERE IDCONVOCATORIA=" . $id;
		$mydb->setQuery($sql);
		if (!$mydb->executeQuery()) return false;
	}

	public function delete($id = "")
	{
		global $mydb;
		$sql = "DELETE FROM" . self::$tblname;
		$sql .= "WHERE IDCONVOCATORIA=" . $id;
		$mydb->setQuery($sql);
		if (!$mydb->executeQuery()) return false;
	}
}