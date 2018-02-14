<?php
namespace Bicycle;
// Недоделано
class XmlDB
{
	const path = '/php/library/bicycle/xml/';
	private $name, $file;

	function __construct(string $name)
	{
		$this->name = $name;
		$this->file = __ROOT__.self::path.$name.'.xml';

		if (!file_exists($this->file))
		{
			$file = fopen($this->file, "w");
			fwrite($file, '<?xml version=\'1.0\'?><data></data>');
			fclose($file);	
		}
	}

	private function xml()
	{
		return simplexml_load_file($this->file);
	}

	// значения и какие уникальные
	public function insert(array $values, array $unique = [])
	{
		// проверка на уникальность (ГК...)
		foreach ($unique as $key)
		{
			$row = $this->select([$key => $values[$key]]);
			
			if (count($row) > 0)
			{
				return false;
			}
		}

		// коряво считаем ид
		$id = 0;
		foreach ($this->select() as $row)
		{
			if ($row['id'] > $id)
			{
				$id = $row['id'];
			}
		}
		$values['id'] = ++$id;

		// добавление
		$xml = $this->xml();
		$row = $xml->addChild($this->name);

		foreach ($values as $key => $value)
		{
			$row->addChild($key, $value);
		}
		$xml->asXML($this->file);

		return true;
	}


	public function select(array $where = [])
	{
		$xml = $this->xml();
		$node = $this->name;
		$rows = array();

		foreach ($xml->$node as $item)
		{
			$row = array();
			foreach ($item as $col)
			{
				$row[$col->getName()] = (string)$col;
			}

			if (count($where) > 0) {
				$true = 0;
				foreach ($where as $col => $value)
				{
					if ((string)$row[$col] == $value)
						$true++;
				}

				if ($true == count($where))
					return $row;
			}
			else
			{
				$rows[] = $row;
			}
		}
		return $rows;
	}

	// неуспел
	public function update()
	{
		$xml = $this->xml();
	}
	// неуспел
	public function delete()
	{
		$xml = $this->xml();
	}

}