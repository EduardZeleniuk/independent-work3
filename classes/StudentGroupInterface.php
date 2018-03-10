<?php

interface StudentGroupInterface {

	/**
	 * Конструктор, создающий текстовый файл с именем группы
	 * для хранения данных по студентах 
	 *
	 * @param $name Имя группы
	 */
	public function __construct($name);

	/**
	 * Метод для получения всех студентов ИЛИ(!) их среза
	 *
	 * @param int $offset Смещение выборки
	 * @param int $limit Ограничение выборки
	 * @return array
	 */
	public function all($offset, $limit);

	/**
	 * Метод для получения конкретного студента
	 *
	 * @param int $id ID студента, данные которого требуется получить
	 * @return array
	 */
	public function get($id);

	/**
	 * Метод для поиска студентов в группе
	 *
	 * @param string $query Поисковый запрос
	 * @return array 
	 */
	public function find($query);

	/**
	 * Метод для создания нового студента в группе
	 *
	 * @param array $data Ассоциативный массив с данными студента
	 * @return boolean
	 */
	public function add($data);

	/**
	 * Метод для редактирования данных о студенте
	 *
	 * @param int $id ID студента, данные которого изменяются
	 * @param array $data Ассоциативный массив с данными, которые требуется изменить
	 * @return boolean
	 */
	public function edit($id, $data);

	/**
	 * Метод для удаления студента из группы
	 *
	 * @param int $id ID студента, которого требуется удалить
	 * @return boolean
	 */
	public function delete($id);

}