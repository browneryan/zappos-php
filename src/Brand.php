<?php
	 class Brand
	{
        private $id;
		private $name;

		function __construct($id = null, $name)
		{
            $this->id = $id;
			$this->name = $name;

		}

		function getId()
		{
			return $this->id;
		}

        function getName()
		{
			return $this->name;
		}

		// function save()
		// {
		// 	$GLOBALS['DB']->exec("INSERT INTO brands (name) VALUES ('{$this->getName()}');");
		// 	$this->id = $GLOBALS['DB']->lastInsertId();
		// }
		// static function getAll()
		// {
		// 	$query = $GLOBALS['DB']->query("SELECT * FROM brands;");
		// 	$brands = array();
		// 	foreach($query as $brand) {
		// 		$name = $brand['name'];
		// 		$id = $brand['id'];
		// 		$new_brand = new Brand($name, $id);
		// 		array_push($brands, $new_brand);
		// 	}
		// 	return $brands;
		// }
		// static function deleteAll()
		// {
		// 	$GLOBALS['DB']->exec("DELETE FROM brands;");
		// }
		// static function find($search_id)
		// {
		// 	$found_brand = null;
		// 	$brands = Brand::getAll();
		// 	foreach($brands as $brand) {
		// 		if($search_id == $brand->getId()) {
		// 			$found_brand = $brand;
		// 		}
		// 	}
		// 	return $found_brand;
		// }
		// static function findByName($search_name)
		// {
		// 	$found_brand = null;
		// 	$brands = Brand::getAll();
		// 	foreach($brands as $brand) {
		// 		if($search_name == $brand->getName()) {
		// 			$found_brand = $brand;
		// 		}
		// 	}
		// 	return $found_brand;
		// }
		// function addAuthor($author)
		// {
		// 	$GLOBALS['DB']->exec("INSERT INTO brands_authors (brand_id, author_id) VALUES ({$this->getId()}, {$author->getId()});");
		// }
		// function getAuthors()
		// {
		// 	$query = $GLOBALS['DB']->query("SELECT authors.* FROM brands
		// 		JOIN brands_authors ON (brands.id = brands_authors.brand_id)
		// 		JOIN authors ON (brands_authors.author_id = authors.id)
		// 		WHERE brands.id = {$this->getId()};");
		// 	$authors = $query->fetchAll(PDO::FETCH_ASSOC);
		// 	$authors_result = array();
		// 	foreach($authors as $author) {
		// 		$name = $author['name'];
		// 		$id = $author['id'];
		// 		$new_author = new Author($name, $id);
		// 		array_push($authors_result, $new_author);
		// 	}
		// 	return $authors_result;
		// }
		// function deleteBrand()
		// {
		// 	$GLOBALS['DB']->exec("DELETE FROM brands WHERE id = {$this->getId()};");
		// 	$GLOBALS['DB']->exec("DELETE FROM brands_authors WHERE brand_id = {$this->getId()};");
		// }
		// function addCopy($brand)
		// {
		// 	$GLOBALS['DB']->exec("INSERT INTO copies (brand_id) VALUES ({$brand->getId()});");
		// }
		// function getCopies()
		// {
		// 	$query = $GLOBALS['DB']->query("SELECT * FROM copies WHERE brand_id = {$this->getId()};");
		// 	$copies = $query->fetchAll(PDO::FETCH_ASSOC);
		// 	$copy_results = array();
		// 	foreach($copies as $copy) {
		// 		$id = $copy['id'];
		// 		$brand_id = $copy['brand_id'];
		// 		$checkout = $copy['checkout'];
		// 		$due_date = $copy['due_date'];
		// 		$new_copy = new Copy($id, $brand_id, $checkout, $due_date);
		// 		array_push($copy_results, $new_copy);
		// 	}
		// 	return $copy_results;
		// }
	}
 ?>
