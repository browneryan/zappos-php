<?php
	/**
	* @backupGlobals disabled
	* @backupStaticAttributes disabled
	*/
	require_once "src/Brand.php";
	require_once "src/Store.php";

	$server = 'mysql:host=localhost;dbname=shoes_test';
	$user = 'root';
	$password = 'root';
	$DB = new PDO($server, $user, $password);

	class BrandTest extends PHPUnit_Framework_TestCase
	{
		protected function tearDown()
        {
			Brand::deleteAll();
			Store::deleteAll();
		}

		function testGetName()
		{
			//Arrange
			$name = "Vivobarefoot";
			$test_brand = new Brand($id = null, $name);

			//Act
			$result = $test_brand->getName();

			//Assert
			$this->assertEquals($name, $result);
		}

		function testGetId()
		{
			//Arrange
			$id = 1;
			$name = "Vivobarefoot";
			$test_brand = new Brand($id, $name);

			//Act
			$result = $test_brand->getId();

			//Assert
			$this->assertEquals(1, $result);
		}

		function testSave()
		{
			//Arrange
			$id = 1;
			$name = "Vivobarefoot";
			$test_brand = new Brand($id, $name);

			//Act
			$test_brand->save();

			//Assert
			$result = Brand::getAll();
			$this->assertEquals($test_brand, $result[0]);
		}

		function testGetAll()
		{
			//Arrange
			$name = "Vivobarefoot";
			$test_brand = new Brand($id = null, $name);
			$test_brand->save();

			$name2 = "Toms";
			$test_brand2 = new Brand($id2 = null, $name2);
			$test_brand2->save();

			//Act
			$result = Brand::getAll();

			//Assert
			$this->assertEquals([$test_brand, $test_brand2], $result);
		}

		function testDeleteAll()
		{
			//Arrange
			$name = "Vivobarefoot";
			$test_brand = new Brand($id = null, $name);
			$test_brand->save();

			$name2 = "Toms";
			$test_brand2 = new Brand($id2 = null, $name2);
			$test_brand2->save();

			//Act
			Brand::deleteAll();
			$result = Brand::getAll();

			//Assert
			$this->assertEquals([], $result);
		}

		function testFind()
		{
			//Arrange
			$name = "Vivobarefoot";
			$test_brand = new Brand($id = null, $name);
			$test_brand->save();

			$name2 = "Toms";
			$test_brand2 = new Brand($id2 = null, $name2);
			$test_brand2->save();

			//Act
			$result = Brand::find($test_brand->getId());

			//Assert
			$this->assertEquals($test_brand, $result);
		}

		function testFindByName()
		{
			//Arrange
			$name = "Vivobarefoot";
			$test_brand = new Brand($id = null, $name);
			$test_brand->save();

			$name2 = "Toms";
			$test_brand2 = new Brand($id2 = null, $name2);
			$test_brand2->save();

			//Act
			$result = Brand::findByName($test_brand->getName());

			//Assert
			$this->assertEquals($test_brand, $result);
		}

		function testAddStore()
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
			$test_brand->addStore($test_store);

			//Assert
			$this->assertEquals([$test_store], $test_brand->getStores());
		}

		function testGetStores()
		{
			//Arrange
			$name = "Vivobarefoot";
			$test_brand = new Brand($id = null, $name);
			$test_brand->save();

			$store_name = "Pie Footwear";
			$test_store = new Store($id = null, $store_name);
			$test_store->save();

			$store_name2 = "The Shoe Store PDX";
			$test_store2 = new Store($id2 = null, $store_name2);
			$test_store2->save();

			//Act
			$test_brand->addStore($test_store);
			$test_brand->addStore($test_store2);

			//Assert
			$this->assertEquals([$test_store, $test_store2], $test_brand->getStores());
		}

		function testDeleteBrand()
		{
			//Arrange
			$name = "Vivobarefoot";
			$test_brand = new Brand($id = null, $name);
			$test_brand->save();

			$store_name = "Pie Footwear";
			$test_store = new Store($id = null, $store_name);
			$test_store->save();

			//Act
			$test_brand->addStore($test_store);
			$test_brand->deleteBrand();

			//Assert
			$this->assertEquals([], $test_store->getBrands());
		}
		
	}
?>
