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

		// function addBook($book)
		// {
		// 	$GLOBALS['DB']->exec("INSERT INTO books_authors (book_id, author_id) VALUES ({$book->getId()}, {$this->getId()});");
		// }
		// function getBooks()
		// {
		// 	$query = $GLOBALS['DB']->query("SELECT books.* FROM authors
		// 		JOIN books_authors ON (authors.id = books_authors.author_id)
		// 		JOIN books ON (books_authors.book_id = books.id)
		// 		WHERE authors.id = {$this->getId()};");
		// 	$book_ids = $query->fetchAll(PDO::FETCH_ASSOC);
		// 	$books = array();
		// 	foreach($book_ids as $book) {
		// 		$title = $book['title'];
		// 		$id = $book['id'];
		// 		$new_book = new Book($title, $id);
		// 		array_push($books, $new_book);
		// 	}
		// 	return $books;
		// }
		// static function findByStore($search_name)
		// {
		// 	$found_author = null;
		// 	$authors = Store::getAll();
		// 	foreach($authors as $author) {
		// 		if ($search_name == $author->getName()) {
		// 			$found_author = $author;
		// 		}
		// 	}
		// 	return $found_author;
		// }
	}
 ?>
