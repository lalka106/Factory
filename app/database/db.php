<?php
session_start();

require('connect.php');

function tt($value)
{
	echo '<pre>';
	print_r($value);
	echo '<pre>';
	exit();
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
	$delete = "DELETE FROM $table WHERE id = $id";

	$query = $pdo->prepare($delete);
	$query->execute();
	doCheckError($query);
	// return $query->fetch();
}

// delete('users', 3, $params);



//выбор автора для постов
function selectAllfromPostsWithUsers($table1, $table2)
{
	global $pdo;
	$select = "SELECT t1.id,t1.title,t1.img,t1.content,t1.status,t1.id_category,t1.created_date,t2.username from $table1 as t1 
	JOIN $table2 as t2 ON t1.id_user = t2.id";

	$query = $pdo->prepare($select);
	$query->execute();
	doCheckError($query);
	return $query->fetchAll();
}


//выбор автора для постов в новостях
function selectAllPosts($table1, $table2)
{
	global $pdo;
	$select = "SELECT t1.*,t2.username from $table1 as t1 
	JOIN $table2 as t2 ON t1.id_user = t2.id
	WHERE t1.status = 1";

	$query = $pdo->prepare($select);
	$query->execute();
	doCheckError($query);
	return $query->fetchAll();
}



//выбор директора в дилерах для постов
function selectAllDirectorsForDealers($table1, $table2)
{
	global $pdo;
	$select = "SELECT t1.*,t2.* from $table1 as t1 
	JOIN $table2 as t2 ON t1.id_director = t2.id
	WHERE t1.status = 1 ";

	$query = $pdo->prepare($select);
	$query->execute();
	doCheckError($query);
	return $query->fetchAll();
}

//поиск по содержимому и заголовкам
function searchWithTitleAndContent($text, $table1, $table2)
{
	global $pdo;
	$text = trim(strip_tags(stripcslashes(htmlspecialchars($text))));
	$select = "SELECT t1.*,t2.username from $table1 as t1 
	JOIN $table2 as t2 ON t1.id_user = t2.id
	WHERE t1.status = 1 AND t1.title like '%$text%' OR t1.content like '%$text%'";

	$query = $pdo->prepare($select);
	$query->execute();
	doCheckError($query);
	return $query->fetchAll();
}


//выод записей по отдельности
function selectSinglePost($table1, $table2, $id)
{
	global $pdo;
	$select = "SELECT t1.*,t2.username from $table1 as t1 
	JOIN $table2 as t2 ON t1.id_user = t2.id
	WHERE t1.id = $id";

	$query = $pdo->prepare($select);
	$query->execute();
	doCheckError($query);
	return $query->fetch();
}
