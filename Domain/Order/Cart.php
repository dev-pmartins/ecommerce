<?php

namespace Order;

use Catalog\Product;

class Cart 
{
	private $products = array();
	//private $cartQuantity = null;
	//private $cartTotal = null;

	public function getProducts()
	{
		return $this->products;
	}

	public function addProduct(Product $product)
	{
		$id = $product->getId();

		if (isset($this->products[$id])) {
			$this->products[$id]['quantity']++;
		} else {
			$this->products[$id] = array(
				'item' => $product,
				'quantity' => 1,
			);
		}
	}

	public function getQuantity()
	{
		//return count($this->products);
		//$this->cartQuantity = count($this->products);
		//return $this->cartQuantity;
		//return count($this->products);
		$result = 0;

		foreach ($this->products as $cartItem) {
			$result += $cartItem['quantity'];
		}

		return $result;
	}

	public function getTotal()
	{
		$result = 0;

		foreach ($this->products as $cartItem) {
			//$this->cartTotal += $product->getOriginalPrice();
			//$quatity = $cartItem['quantity'];
			$result += $cartItem['item']->getOriginalPrice();// * $quatity;
		}

		/*for ($i=0; $i < ($this->cartQuantity); $i++) { 
			$this->cartTotal += ($this->products[$i]->getOriginalPrice());
		}*/
		//return $this->cartTotal;
		return $result;
	}

	public function removeProduct(Product $product)
	{
		//
	}

	// removeProduct(Product $product)
	// getQuantity() = total de itens no carrinho
	// getTotal $$$
}