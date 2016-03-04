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

		function save()
		{
			$GLOBALS['DB']->exec("INSERT INTO brands (name) VALUES ('{$this->getName()}');");
			$this->id = $GLOBALS['DB']->lastInsertId();
		}

		static function getAll()
		{
			$query = $GLOBALS['DB']->query("SELECT * FROM brands;");
			$brands = array();
			foreach($query as $brand) {
                $id = $brand['id'];
				$name = $brand['name'];
				$new_brand = new Brand($id, $name);
				array_push($brands, $new_brand);
			}
			return $brands;
		}

		static function deleteAll()
		{
			$GLOBALS['DB']->exec("DELETE FROM brands;");
		}

		static function find($search_id)
		{
			$found_brand = null;
			$brands = Brand::getAll();
			foreach($brands as $brand) {
				if($search_id == $brand->getId()) {
					$found_brand = $brand;
				}
			}
			return $found_brand;
		}

		static function findByName($search_name)
		{
			$found_brand = null;
			$brands = Brand::getAll();
			foreach($brands as $brand) {
				if($search_name == $brand->getName()) {
					$found_brand = $brand;
				}
			}
			return $found_brand;
		}

		function addStore($store)
		{
			$GLOBALS['DB']->exec("INSERT INTO stores_brands (store_id, brand_id) VALUES ({$store->getId()}, {$this->getId()});");
		}

		function getStores()
		{
			$query = $GLOBALS['DB']->query("SELECT shoe_stores.* FROM brands
				JOIN stores_brands ON (brands.id = stores_brands.brand_id)
				JOIN shoe_stores ON (stores_brands.store_id = shoe_stores.id)
				WHERE brands.id = {$this->getId()};");
			$stores = $query->fetchAll(PDO::FETCH_ASSOC);

			$stores_result = array();
			foreach($stores as $store) {
				$id = $store['id'];
				$name = $store['name'];
				$new_store = new Store($id, $name);
				array_push($stores_result, $new_store);
			}
			return $stores_result;
		}

		function deleteBrand()
		{
			$GLOBALS['DB']->exec("DELETE FROM brands WHERE id = {$this->getId()};");
			$GLOBALS['DB']->exec("DELETE FROM stores_brands WHERE brand_id = {$this->getId()};");
		}

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
