<?php
require('connect.php');

function tt($value)
{
	echo '<pre>';
	print_r($value);
	echo '<pre>';
}

function doCheckError($query)
{
	$errorInfo = $query->errorInfo();
	if ($errorInfo[0] !== PDO::ERR_NONE) {
		echo $errorInfo[2];
		exit();
	}
	return true;
}

$params = [
	'admin' => 1,
];


function selectAll($table, $params = [])
{
	global $pdo;
	$select = "SELECT * from $table";

	if (!empty($params)) {
		$i = 0;
		foreach ($params as $key => $value) {
			if (!is_numeric($value)) {
				$value = "'" . $value . "'";
			}
			if ($i === 0) {
				$select = $select . " WHERE $key = $value";
			} else {
				$select = $select . " AND $key = $value";
			}
			$i++;
		}
	}
	$query = $pdo->prepare($select);
	$query->execute();
	doCheckError($query);
	return $query->fetchAll();
}



function selectONE($table, $params = [])
{
	global $pdo;
	$select = "SELECT * from $table";

	if (!empty($params)) {
		$i = 0;
		foreach ($params as $key => $value) {
			if (!is_numeric($value)) {
				$value = "'" . $value . "'";
			}
			if ($i === 0) {
				$select = $select . " WHERE $key = $value";
			} else {
				$select = $select . " AND $key = $value";
			}
			$i++;
		}
	}
	// $select = $select . " LIMIT 1";

	$query = $pdo->prepare($select);
	$query->execute();
	doCheckError($query);
	return $query->fetch();
}
// tt(selectONE('users', $params));


// $arrData = [
// 	'admin' => '0',
// 	'username' => 'ed222',
// 	'email' => 'privet@mail.ru',
// 	'password' => '192200'
// ];
function insert($table, $params)
{
	global $pdo;
	$i = 0;
	$column = '';
	$mask = '';
	foreach ($params as $key => $value) {
		if ($i === 0) {
			$column = $column . "$key";
			$mask = $mask . "'$value'";
		} else {
			$column = $column . ", $key";
			$mask = $mask . ", '$value'";
		}
		$i++;
	}

	$insert = "INSERT into $table ($column) values ($mask)";

	$query = $pdo->prepare($insert);
	$query->execute($params);
	doCheckError($query);
	return $pdo->lastInsertId();
}

// insert('users', $arrData);


function update($table, $id, $params)
{
	global $pdo;
	$i = 0;
	$str = '';
	foreach ($params as $key => $value) {
		if ($i === 0) {
			$str = $str . $key . " = '$value'";
		} else {
			$str = $str . ", $key" . " = '$value'";
		}
		$i++;
	}

	$update = "UPDATE $table SET $str WHERE id = $id";

	$query = $pdo->prepare($update);
	$query->execute($params);
	doCheckError($query);
	// return $query->fetch();
}

// update('users', 3, $params);



function delete($table, $id)
{
	global $pdo;
	$i = 0;
	$str = '';
	$delete = "DELETE FROM $table WHERE id = $id";

	$query = $pdo->prepare($delete);
	$query->execute();
	doCheckError($query);
	// return $query->fetch();
}

// delete('users', 3, $params);
