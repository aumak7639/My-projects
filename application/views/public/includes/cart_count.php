<?php
	$cart_count = 0;
	if(isset($_SESSION['cart_items']))
	{
		foreach($_SESSION['cart_items'] as $item):
			$cart_count = $cart_count + $item->product_quantity;
		endforeach;
	}
	echo $cart_count;
?>