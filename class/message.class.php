<?php
	class Message{
		public function __construct(array $message)
		{
			if(!empty($message))
				$this->hydrate($message);
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