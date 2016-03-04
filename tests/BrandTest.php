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
		//   Store::deleteAll();
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

            $name2 = "Vivobarefoot";
			$test_brand2 = new Brand($id = null, $name);
            $test_brand2->save();

			//Act
			$result = Brand::getAll();

			//Assert
			$this->assertEquals([$test_brand, $test_brand2], $result);
		}

		// function testDeleteAll()
		// {
		// 	//Arrange
		// 	$name = "Slaughterhouse Five";
		// 	$id = 1;
		// 	$test_brand = new Brand($name, $id);
        //     $test_brand->save();
		// 	$name2 = "A Visit from the Goon Squad";
		// 	$id2 = 2;
		// 	$test_brand2 = new Brand($name2, $id2);
		// 	$test_brand2->save();
		// 	//Act
		// 	Brand::deleteAll();
		// 	$result = Brand::getAll();
		// 	//Assert
		// 	$this->assertEquals([], $result);
		// }
		// function testFind()
        // {
        //     //Arrange
		// 	$name = "Slaughterhouse Five";
		// 	$id = 1;
		// 	$test_brand = new Brand($name, $id);
        //     $test_brand->save();
		// 	$name2 = "A Visit from the Goon Squad";
		// 	$id2 = 2;
		// 	$test_brand2 = new Brand($name2, $id2);
		// 	$test_brand2->save();
        //     //Act
        //     $result = Brand::find($test_brand->getId());
        //     //Assert
        //     $this->assertEquals($test_brand, $result);
        // }
		// function testFindByName()
        // {
        //     //Arrange
		// 	$name = "Slaughterhouse Five";
		// 	$id = 1;
		// 	$test_brand = new Brand($name, $id);
        //     $test_brand->save();
		// 	$name2 = "A Visit from the Goon Squad";
		// 	$id2 = 2;
		// 	$test_brand2 = new Brand($name2, $id2);
		// 	$test_brand2->save();
        //     //Act
        //     $result = Brand::findByName($test_brand->getName());
        //     //Assert
        //     $this->assertEquals($test_brand, $result);
        // }
		// function testAddAuthor()
		// {
		// 	//Arrange
		// 	$name = "Slaughterhouse Five";
		// 	$id = 1;
		// 	$test_brand = new Brand($name, $id);
        //     $test_brand->save();
		// 	$name = "Kurt Vonnegut";
        //     $id = 1;
        //     $test_author = new Author($name, $id);
		// 	$test_author->save();
		// 	//Act
		// 	$test_brand->addAuthor($test_author);
		// 	//Assert
		// 	$this->assertEquals([$test_author], $test_brand->getAuthors());
		// }
		// function testGetAuthors()
        // {
        //     //Arrange
		// 	$name = "Gardners Art Through the Ages";
		// 	$id = 1;
		// 	$test_brand = new Brand($name, $id);
        //     $test_brand->save();
        //     $name = "Richard Tansev";
        //     $id = 1;
        //     $test_author = new Author($name, $id);
        //     $test_author->save();
        //     $name2 = "Horst De La Croix";
        //     $id2 = 2;
        //     $test_author2 = new Author($name2, $id2);
        //     $test_author2->save();
        //     //Act
        //     $test_brand->addAuthor($test_author);
        //     $test_brand->addAuthor($test_author2);
        //     //Assert
        //     $this->assertEquals([$test_author, $test_author2], $test_brand->getAuthors());
        // }
		// function testDeleteBrand()
		// {
		// 	//Arrange
		// 	$name = "A Visit from the Goon Squad";
		// 	$id = 1;
		// 	$test_brand = new Brand($name, $id);
		// 	$test_brand->save();
		// 	$name = "Jennifer Egan";
		// 	$id = 2;
		// 	$test_author = new Author($name, $id);
		// 	$test_author->save();
		// 	//Act
		// 	$test_brand->addAuthor($test_author);
		// 	$test_brand->deleteBrand();
		// 	//Assert
		// 	$this->assertEquals([], $test_author->getBrands());
		// }
		// function testAddCopy()
		// {
		// 	//Arrange
		// 	$name = "Gardners Art Through the Ages";
		// 	$id = 7;
		// 	$test_brand = new Brand($name, $id);
		// 	$test_brand->save();
		// 	$id = 1;
		// 	$brand_id = $test_brand->getId();
		// 	$checkout = 0;
		// 	$due_date = "2016-03-02";
		// 	$test_copy = new Copy($id, $brand_id, $checkout, $due_date);
		// 	$test_copy->save();
		// 	//Act
		// 	$test_brand->addCopy($test_copy);
		// 	//Assert
		// 	$this->assertEquals([$test_copy], $test_brand->getCopies());
		// }
		// function testGetCopies()
		// {
		// 	//Arrange
		// 	$name = "Gardners Art Through the Ages";
		// 	$id = 7;
		// 	$test_brand = new Brand($name, $id);
		// 	$test_brand->save();
		// 	$id = 1;
		// 	$brand_id = $test_brand->getId();
		// 	$checkout = 0;
		// 	$due_date = "2016-03-02";
		// 	$test_copy = new Copy($id, $brand_id, $checkout, $due_date);
		// 	$test_copy->save();
		// 	$id2 = 2;
		// 	$brand_id = $test_brand->getId();
		// 	$checkout2 = 0;
		// 	$due_date2 = "2016-03-01";
		// 	$test_copy2 = new Copy($id2, $brand_id, $checkout2, $due_date2);
		// 	$test_copy2->save();
		// 	//Act
		// 	$test_brand->addCopy($test_copy);
		// 	$test_brand->addCopy($test_copy2);
		// 	//Assert
		// 	$this->assertEquals([$test_copy, $test_copy2], $test_brand->getCopies());
		// }
	}
?>
