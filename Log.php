<?php 


class Log
{

	public $filename; 

	public $handle; 

	public function __construct($prefix = "log")
	{
		$this->filename = $prefix . date("-Y-m-d") . ".log";

		$this->handle = fopen($this->filename, 'a');

	}

	public function __destruct()
	{
		fclose($this->handle);
	}

	public function logMessage($logLevel, $message)
	{
		// $this->filename = "log" . date("-Y-m-d") . ".log";

		// $handle = fopen($this->filename, 'a');

		// $this->handle;

		$logFormat = date("Y-m-d H:i:s") . "[" . $logLevel . "]" . $message . PHP_EOL; 

		fwrite($this->handle, $logFormat);

		// fclose($handle);

	}

	public function info($message)
	{

		$this->logMessage("INFO", $message);
	}


	public function error($message)
	{

		$this->logMessage("ERROR", $message);

	}



}




 ?>
