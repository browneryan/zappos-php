<?php

	class Store
	{
        private $id;
		private $name;

		function __construct($id, $name)
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
			$GLOBALS['DB']->exec("INSERT INTO shoe_stores (name) VALUES ('{$this->getName()}');");
			$this->id = $GLOBALS['DB']->lastInsertId();
		}

		static function getAll()
		{
			$query = $GLOBALS['DB']->query("SELECT * FROM shoe_stores;");
			$stores = array();
			foreach($query as $store) {
                $id = $store['id'];
				$name = $store['name'];
				$new_store = new Store($id, $name);
				array_push($stores, $new_store);
			}
			return $stores;
		}

		static function deleteAll()
		{
			$GLOBALS['DB']->exec("DELETE FROM shoe_stores;");
		}

		function addBrand($brand)
		{
			$GLOBALS['DB']->exec("INSERT INTO stores_brands (store_id, brand_id) VALUES ({$this->getId()}, {$brand->getId()});");
		}

		function getBrands()
		{
			$query = $GLOBALS['DB']->query("SELECT brands.* FROM shoe_stores
				JOIN stores_brands ON (shoe_stores.id = stores_brands.store_id)
				JOIN brands ON (stores_brands.brand_id = brands.id)
				WHERE shoe_stores.id = {$this->getId()};");
			$brand_ids = $query->fetchAll(PDO::FETCH_ASSOC);

			$brands = array();
			foreach($brand_ids as $brand) {
				$id = $brand['id'];
				$name = $brand['name'];
				$new_brand = new Brand($id, $name);
				array_push($brands, $new_brand);
			}
			return $brands;
		}

		static function findByStore($search_name)
		{
			$found_store = null;
			$stores = Store::getAll();
			foreach($stores as $store) {
				if ($search_name == $store->getName()) {
					$found_store = $store;
				}
			}
			return $found_store;
		}

		function deleteStore()
		{
			$GLOBALS['DB']->exec("DELETE FROM shoe_stores WHERE id = {$this->getId()};");
			$GLOBALS['DB']->exec("DELETE FROM stores_brands WHERE store_id = {$this->getId()};");
		}

	}
 ?>
