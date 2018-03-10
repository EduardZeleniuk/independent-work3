<?php

	class StudentGroup implements StudentGroupInterface {

		private $handler;

		public function __construct($name_group = false) {
			if(!$name_group){
				echo ('не передано название группы <br>');
				return false;
			}	

			$this->handler = fopen($name_group.'.txt', 'a+');
			if($this->handler === FALSE)
				throw new Exception('Unable to open file');
		}


		public function __destruct() {
			fclose($this->handler);
		}


		public function all($offset = false, $limit = false) {
			if($offset === false OR $limit === false){
				echo ('не переданы параметры <br>');
				return false;
			}

			if(get_resource_type($this->handler) == 'Unknown')
				throw new Exception ('Call Open method first');

			$offset = (int)$offset;
			$limit = (int)$limit;

			fseek($this->handler, 0, 0);

			$content = '';
			$length = 1000;
			while($part = fread($this->handler, $length)) {
				$content .= $part;
			}

			$data = explode("\r\n", $content);
			array_pop($data);
			$dataLenght = count($data);

			if($dataLenght < $offset) {
				echo 'offset превышает длину массива <br>';
				return false;
			}

			$data = array_slice($data, $offset, $limit);

			return $data;
		}


		public function get($id = false) {
			if($id === false){
				echo ('не передан id студента <br>');
				return false;
			}

			if(get_resource_type($this->handler) == 'Unknown')
				throw new Exception ('Call Open method first');

			$id = (int)$id;

			fseek($this->handler, 0, 0);

			$content = '';
			$length = 1000;
			while($part = fread($this->handler, $length)) {
				$content .= $part;
			}

			$data = explode("\r\n", $content);
			array_pop($data);
			$dataLenght = count($data);

			if($dataLenght-1 < $id) {
				echo 'такой записи нет';
				return false;
			}	

			$dataKey = ['id', 'name', 'birthdate', 'phone'];

			$data[$id] = explode(" ", $data[$id]);

			foreach ($data[$id] as $key => $value) {
				$student[$dataKey[$key]] = $value;
			}

			return $student;
		}


		public function find($query) {

		}


		public function add($data = false) {
			if(!is_array($data)) {
				echo ('введте массив с параметрами <br>');
				return false;
			}

			if(get_resource_type($this->handler) == 'Unknown')
				throw new Exception ('Call Open method first');

    	$data = implode (" " , $data) . "\r\n";

			fwrite($this->handler, $data);

			return true;
		}


		public function edit($id, $data) {

		}


		public function delete($id = false) {
			if($id === false){
				echo ('не передан id студента <br>');
				return false;
			}

			if(get_resource_type($this->handler) == 'Unknown')
				throw new Exception ('Call Open method first');

			$id = (int)$id;

			fseek($this->handler, 0, 0);

			$content = '';
			$length = 1000;
			while($part = fread($this->handler, $length)) {
				$content .= $part;
			}

			$data = explode("\r\n", $content);
			array_pop($data);
			$dataLenght = count($data);
			

			if($dataLenght-1 < $id) {
				echo 'такой записи нет <br>';
				return false;
			}

			unset($data[$id]);

			$data = implode ("\r\n", $data)."\r\n";

			ftruncate($this->handler, 0); 
			fwrite($this->handler, $data);

			return true;
		}

	}