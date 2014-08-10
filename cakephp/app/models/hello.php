<?php

class Hello extends AppModel
{
	var	$name = 'Hello';
	var	$useTable = 'hello';
	var	$useDbConfig = 'test_db_info';

	public function findAll()
	{
		$query = 'SELECT * FROM '.$this->useTable.'';
		$result = $this->query($query);

		return	$result;
	}


	public function getHeader()
	{
		$query = 'SHOW COLUMNS FROM '.$this->useTable.'';
		$result = $this->query($query);

		return	$result;
	}

}
