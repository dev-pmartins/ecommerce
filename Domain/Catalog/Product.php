<?php

namespace Domain\Catalog;

class Product 
{

	private $name;

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param string $name
	 */
	public function setName($name)
	{
		$this->name = $name;
	}

	public function getSku()
	{
		return $this->sku;
	}

	public function setSku($sku)
	{
		$this->sku = $sku;
	}

	public function getOriginalPrice()
	{
		return $this->price;
	}

	public function setOriginalPrice($price)
	{
		$this->price = $price;
	}

	public function getSizes()
	{
		return $this->originalSizes;
	}

	public function setSizes($sizes)
	{
		$this->sizes = $sizes;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function setDescription($description)
	{
		$this->description = $description;
	}
}