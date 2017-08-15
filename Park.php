<?php

require_once __DIR__ . '/parks_login.php';
/**
 * A Class for interacting with the national_parks database table
 *
 * contains static methods for retrieving records from the database
 * contains an instance method for persisting a record to the database
 *
 * Usage Examples
 *
 * Retrieve a list of parks and display some values for each record
 *
 *      $parks = Park::all();
 *      foreach($parks as $park) {
 *          echo $park->id . PHP_EOL;
 *          echo $park->name . PHP_EOL;
 *          echo $park->description . PHP_EOL;
 *          echo $park->areaInAcres . PHP_EOL;
 *      }
 * 
 * Inserting a new record into the database
 *
 *      $park = new Park();
 *      $park->name = 'Acadia';
 *      $park->location = 'Maine';
 *      $park->areaInAcres = 48995.91;
 *      $park->dateEstablished = '1919-02-26';
 *
 *      $park->insert();
 *
 */
class Park
{

/*-------------------------------------------------------------------------------------------
							STATIC METHODS & PROPERTIES
-------------------------------------------------------------------------------------------*/

//Current connection to database
	public static $dbc = null;

//Establishes database connection
	public static function dbConnect() {

		require 'db_connect.php';

		if (! is_null(self::$dbc)) {
			return;
		}
		self::$dbc = $dbc;
	}

// Returns number of records in db
	public static function count() {

		self::dbConnect();

		$countQuery = "SELECT COUNT(*) FROM np_details";

		$stmt = self::$dbc->query($countQuery);

		$count = (int) $stmt->fetchColumn();

		return $count;
	}


// Returns all records in db
	public static function all() {

		self::dbConnect();

		$parkQuery = "SELECT * FROM np_details";

		$stmt = self::$dbc->query($parkQuery);

		$allParks = $stmt->fetchAll(PDO::FETCH_OBJ);

		return $allParks;
	}

//Returns resultsPerPage number of results for the given page number
	public static function paginate($pageNo, $resultsPerPage = 4) {

		self::dbConnect();

		$offset = ($pageNo - 1) * $resultsPerPage; 

		$query = "SELECT * FROM np_details LIMIT :resultsPerPage OFFSET :offset";

		$stmt = self::$dbc->prepare($query);

		$stmt->bindValue(':resultsPerPage', $resultsPerPage, PDO::PARAM_INT);
		$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

		$stmt->execute();

		$rows = $stmt->fetchAll(PDO::FETCH_OBJ);
		return $rows;

	}


/*-------------------------------------------------------------------------------------------
							INSTANCE METHODS & PROPERTIES
-------------------------------------------------------------------------------------------*/

// Properties that represent columns from the database
	public $id;
	public $name;
	public $location;
	public $date_established;
	public $area;
	public $description;
	public $type;
	public $tagline;


// Insert a record into the database
	public function insert() {
		self::dbConnect();

		$insert = "
			INSERT INTO np_details(name, location, date_established, area, description, type, tagline)
			VALUES (:name, :location, :date_established, :area, :description, :type, :tagline);";

		$stmt = self::$dbc->prepare($insert);

		$stmt->bindValue(':name', $this->name, PDO::PARAM_STR);
		$stmt->bindValue(':location', $this->location, PDO::PARAM_STR);
		$stmt->bindValue(':date_established', $this->date_established, PDO::PARAM_STR);
		$stmt->bindValue(':area', $this->area, PDO::PARAM_STR);
		$stmt->bindValue(':description', $this->description, PDO::PARAM_STR);
		$stmt->bindValue(':type', $this->type, PDO::PARAM_STR);
		$stmt->bindValue(':tagline', $this->tagline, PDO::PARAM_STR);

		$stmt->execute();

		$this->id = self::$dbc->lastInsertId();

	}
}










