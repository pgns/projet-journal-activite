<?php
	class CategorieLieu{
		public function __construct(array $CategorieLieu)
		{
			if(!empty(CategorieLieu))
				$this->hydrate($CategorieLieu);
		}
		public function hydrate(array $donnees)
		{
			foreach($donnees as $key => $value)
		{	
				$this->$key = $value;
			}
		}

		public function __get($name)
		{
			if (isset($this->$name))
				return $this->$name;
		}

		public function __set($name, $value)
		{
			$this->$name = $value;
		}
	}
?>