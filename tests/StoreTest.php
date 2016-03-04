<?php

	/**
	* @backupGlobals disabled
	* @backupStaticAttributes disabled
	*/

	require_once "src/Store.php";
	require_once "src/Brand.php";

	$server = 'mysql:host=localhost;dbname=shoes_test';
	$user = 'root';
	$password = 'root';
	$DB = new PDO($server, $user, $password);

	class StoreTest extends PHPUnit_Framework_TestCase
	{

		protected function tearDown()
		{
			Store::deleteAll();
			Brand::deleteAll();
		}

		function testGetName()
		{
			//Arrange
			$store_name = "Pie Footwear";
			$test_store = new Store($id = null, $store_name);

			//Act
			$result = $test_store->getName();

			//Assert
			$this->assertEquals($store_name, $result);
		}

		function testGetId()
		{
			//Arrange
			$store_name = "Pie Footwear";
			$test_store = new Store($id = 1, $store_name);

			//Act
			$result = $test_store->getId();

			//Assert
			$this->assertEquals(1, $result);
		}

		function testSave()
		{
			//Arrange
			$store_name = "Pie Footwear";
			$test_store = new Store($id = null, $store_name);

			//Act
			$test_store->save();

			//Assert
			$result = Store::getAll();
			$this->assertEquals($test_store, $result[0]);
		}

		function testGetAll()
		{
			//Arrange
			$store_name = "Pie Footwear";
			$test_store = new Store($id = null, $store_name);
			$test_store->save();

			$store_name2 = "The Shoe Store PDX";
			$test_store2 = new Store($id2 = null, $store_name2);
			$test_store2->save();

			//Act
			$result = Store::getAll();

			//Assert
			$this->assertEquals([$test_store, $test_store2], $result);
		}

		function testDeleteAll()
		{
			//Arrange
			$store_name = "Pie Footwear";
			$test_store = new Store($id = null, $store_name);
			$test_store->save();

			$store_name2 = "The Shoe Store PDX";
			$test_store2 = new Store($id2 = null, $store_name2);
			$test_store2->save();

			//Act
			Store::deleteAll();
			$result = Store::getAll();

			//Assert
			$this->assertEquals([], $result);
		}

		function testAddBrand()
		{
			//Arrange
			$name = "Vivobarefoot";
			$test_brand = new Brand($id = null, $name);
			$test_brand->save();

			$store_name = "Pie Footwear";
			$test_store = new Store($id = null, $store_name);
			$test_store->save();

			//Act
			$test_store->addBrand($test_brand);

			//Assert
			$this->assertEquals([$test_brand], $test_store->getBrands());
		}

		function testGetBrands()
		{
			//Arrange
			$store_name = "Pie Footwear";
			$test_store = new Store($id = null, $store_name);
			$test_store->save();

			$name = "Vivobarefoot";
			$test_brand = new Brand($id = null, $name);
			$test_brand->save();

			$name2 = "Toms";
			$test_brand2 = new Brand($id2 = null, $name2);
			$test_brand2->save();

			//Act
			$test_store->addBrand($test_brand);
			$test_store->addBrand($test_brand2);

			//Assert
			$this->assertEquals([$test_brand, $test_brand2], $test_store->getBrands());
		}

		function testFindByStore()
		{
			//Arrange
			$store_name = "Pie Footwear";
			$test_store = new Store($id = null, $store_name);
			$test_store->save();

			$name = "Vivobarefoot";
			$test_brand = new Brand($id = null, $name);
			$test_brand->save();

			//Act
			$result = Store::findByStore($test_store->getName());

			//Assert
			$this->assertEquals($test_store, $result);
		}

		function testDeleteStore()
		{
			//Arrange
			$name = "Vivobarefoot";
			$test_brand = new Brand($id = null, $name);
			$test_brand->save();

			$store_name = "Pie Footwear";
			$test_store = new Store($id = null, $store_name);
			$test_store->save();

			//Act
			$test_store->addBrand($test_brand);
			$test_store->deleteStore();

			//Assert
			$this->assertEquals([], $test_brand->getStores());
		}
		
	}
?>
