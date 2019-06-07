<?php
require_once 'database.php';

class News {

  protected static $tablename = 'news';
	public $id;
	public $title;
	public $publish_date;
	public $story_content;

	public static function findAll() {
		$sql = "SELECT * FROM ". self::$tablename;
		return self::findBySql($sql);
	}

	public static function findById($id=0) {
		global $database;
		$sql = "SELECT * FROM ". self::$tablename ." WHERE id = {$id} LIMIT 1 ";
		$resultArray = self::findBySql($sql);

		return !empty($resultArray) ? array_shift($resultArray) : false ;
	}

	public static function findByTitle($title='') {
		$sql = "SELECT * FROM ". self::$tablename ." WHERE title = '$title' ";

		return self::findBySql($sql);
	}

 	public static function findBySql($sql='') {
		global $database;
		$result = $database->query($sql);
		$objectArray = array();
		while ($row = $database->fetchArray($result)) {
			$objectArray[] = self::instantiate($row);
		}

		return $objectArray;
	}

	private static function instantiate($record) {
		$object = new self;

		foreach ($record as $attribute => $value) {
			if ($object->hasAttribute($attribute)) {
				$object->$attribute = $value;
			}
		}

		return $object;
	}

	private function hasAttribute($attribute) {
		$objectVars = get_object_vars($this);

		return array_key_exists($attribute, $objectVars);
	}

	public function save() {
		return (isset($this->id)) ? $this->update() : $this->create();
	}

	public function create() {
		global $database;

		$sql = "INSERT INTO ". self::$tablename ." (title, story_content)";
		$sql .= "VALUES('";
		$sql .= $database->escape(ucfirst($this->title)) ."', '";
		$sql .= $database->escape($this->story_content) ."' )";

		if ($database->query($sql)) {
			$this->id = $database->insertId();
			return true;
		} else {
			return false;
		}
	}

	public function update() {
		global $database;

		$sql = "UPDATE ". self::$tablename ." SET ";
		$sql .= "title = '";
		$sql .= $database->escape(ucfirst($this->title)) ."', story_content = '";
		$sql .= $database->escape($this->story_content) ."' WHERE id = ";
		$sql .= $database->escape($this->id);

		$database->query($sql);

		return ($database->affectedRows() == 1) ? true : false;
	}

	public function delete() {
	 	global $database;

	 	$sql = "DELETE FROM ". self::$tablename ." WHERE ";
	 	$sql .= "id = ". $database->escape($this->id);
	 	$sql .= " LIMIT 1";

	 	$database->query($sql);
	 	return ($database->affectedRows() == 1) ? true : false;
	}
}

?>
