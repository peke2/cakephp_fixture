<?php

class HelloFixture extends CakeTestFixture
{
	var $name = 'Hello';
	var $import = 'Hello';	//	参照先のモデルが見ているテーブルからカラムの情報をインポート？

	var $table = 'hello';

	//	fixture はテーブルごと削除、作成するので注意
	//	使用するDBはテスト用に別に用意する必要あり
/*
	var $fields = array(
		'id' => array(
			'type' => 'integer',
			'null' => false,
			'key' => 'primary',
		),
		'comment' => array(
			'type' => 'text',
			'default' => null,
		),
		'value' => array(
			'type' => 'integer',
			'default' => null,
		),
	);
*/
	var $records = array(
		array('id'=>1, 'comment'=>'こんばんは', 'value'=>123),
		array('id'=>2, 'comment'=>'おはよう'  , 'value'=>35),
		array('id'=>3, 'comment'=>'こんにちは', 'value'=>987),
	);

}
