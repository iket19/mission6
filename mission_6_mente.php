<?php

//データベースの接続
$dsn='データベース名' ;
$username='ユーザー名';
$password='パスワード';
$pdo=new PDO($dsn,$username,$password,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));

//テーブルuserdata メンテ
//

	$sql = 'delete from userData where id not in (select min_id from (select min(t1.id) as min_id from userData as t1 group by name) as t2);';
	$stmt = $pdo->query($sql);
	$stmt->execute();



$sql = 'SELECT * FROM userData';
	$stmt = $pdo->query($sql);
	$results = $stmt->fetchAll();
	foreach ($results as $row){
		//$rowの中にはテーブルのカラム名が入る
		echo $row['id'].',';
		echo $row['name'].',';
		echo $row['password'].'<br>';
	echo "<hr>";
	}