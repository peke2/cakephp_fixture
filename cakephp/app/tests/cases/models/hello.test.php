<?php

App::import('Model', 'Hello');

//	参照先DBを変更したモデルクラスを定義
//	クラス名は「Test」＋「モデルクラス名」にするらしい？
class TestHello extends Hello
{
	var $cacheSource = false;
	var $useDbConfig = 'test_suite';	//	参照先のDB設定を変更
}


class HelloTestCase extends CakeTestCase
{
	var $fixtures = array('app.hello');

	/**
	 * テスト毎の開始・終了時に呼ばれる
	 */
	public function startTest($method)
	{
		$this->Hello = &ClassRegistry::init('Hello');
		echo "テスト[$method]を開始<br>";
	}

	public function endTest($method)
	{
		echo "テスト[$method]を終了<br>";
		unset($this->Hello);
		ClassRegistry::flush();
	}

	/**
	 * before と after はテスト全体の最初と最後に呼ばれる
	 * 親クラスのメソッドを呼び出さないとうまく動かないので注意
	 */
	public function before($method)
	{
		parent::before($method);
	}

	public function after($method)
	{
		parent::after($method);
	}


	/**
	 *
	 */
	public function test_findAll()
	{
		$result = $this->Hello->findAll();
		var_dump($result);

		//	fixture の設定がうまくいっていないときは以下のテストは pass する
		//$this->assertTrue( empty($result) );

		$this->assertTrue( !empty($result) );
		$this->assertEqual(3, count($result));

		$expected = array(
			'こんばんは',
			'おはよう'  ,
			'こんにちは',
		);

		foreach($result as $index=>$info)
		{
			//	カラム名(配列のインデックス)は大文字、小文字を識別するので注意
			$this->assertEqual($expected[$index], $info['hello']['comment']);
		}
	}

	/**
	 *
	 */
	public function test_getHeader()
	{
		$result = $this->Hello->getHeader();
		//var_dump($result);

		$this->assertTrue( !empty($result) );
		$this->assertEqual( 3, count($result) );

		$expected = array('id', 'comment', 'value');
		foreach($result as $index=>$column)
		{
			$this->assertEqual($expected[$index], $column['COLUMNS']['Field']);
		}
	}
}
