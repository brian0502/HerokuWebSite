<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>BrianPan WebSite</title>
</head>
<body>
	<div>
		<h3>1. 寫出一個亂數產生器，一次產生六個號碼，號碼區間為 1-50</h3>
		<span>備註：</span>
		<span>1. 號碼不可重複</span>
		<span>2. 號碼須為偶數</span>
	</div>
	<div>
		<h3>2. 透過程式產生下列圖型</h3>
		<span>
			   &ensp;&ensp;&ensp;&ensp;*&ensp;<BR>
			  &ensp;&ensp;&ensp;***&ensp;<BR>
			 &ensp;&ensp;*****&ensp;<BR>
			&ensp;*******&ensp;<BR>
		</span>
		<span>備註：</span>
		<span>1. html 空格符號使用 半形的空格，語法可看參考網址(<a href="https://shunnien.github.io/2017/06/03/html-nbsp-emsp-emsp-difference/" target="_blank">參考網址</a>)</span>
	</div>
	<div>
		<?php
			$users = [
				[
					'id' => 1,
					'name' => 'brian'
				],
				[
					'id' => 2,
					'name' => 'david'
				],
			];
			$orders = [
				[
					'id' => 3,
					'user_id' => 2,
					'order_id' => '202104070003',
					'title' => '測試訂單3',
					'create_time' => '2021/01/20',
					'update_time' => '2021/01/21',
				],
				[
					'id' => 1,
					'user_id' => 1,
					'order_id' => '202104070001',
					'title' => '測試訂單1',
					'create_time' => '2021/01/18',
					'update_time' => '2021/01/22',
				],
				[
					'id' => 4,
					'user_id' => 2,
					'order_id' => '202104070004',
					'title' => '測試訂單4',
					'create_time' => '2021/01/22',
					'update_time' => '2021/01/23',
				],
				[
					'id' => 2,
					'user_id' => 1,
					'order_id' => '202104070002',
					'title' => '測試訂單2',
					'create_time' => '2021/01/19',
					'update_time' => '2021/01/24',
				],
			];
			$orderDetails = [
				[
					'id' => 1,
					'order_id' => '202104070001',
					'products' => [
						[
							'id' => 1,
							'name' => '商品A',
							'price' => 400,
							'count' => 5
						],
					],
				],
				[
					'id' => 2,
					'order_id' => '202104070002',
					'products' => [
						[
							'id' => 1,
							'name' => '商品A',
							'price' => 400,
							'count' => 3
						],
						[
							'id' => 2,
							'name' => '商品B',
							'price' => 430,
							'count' => 1
						]
					],
				],
				[
					'id' => 3,
					'order_id' => '202104070003',
					'products' => [
						[
							'id' => 2,
							'name' => '商品B',
							'price' => 430,
							'count' => 7
						]
					],
				],
				[
					'id' => 4,
					'order_id' => '202104070004',
					'products' => [
						[
							'id' => 1,
							'name' => '商品A',
							'price' => 400,
							'count' => 4
						],
						[
							'id' => 2,
							'name' => '商品B',
							'price' => 430,
							'count' => 2
						]
					],
				],
			];
			$coupons = [
				[
					'id' => 1,
					'product_id' => 1,
					'discount' => 99,
					'end_date' => '2021/01/19'
				],
				[
					'id' => 2,
					'product_id' => 2,
					'discount' => 50,
					'end_date' => '2021/01/22'
				]
			];
			$data = [];
			
			foreach ($users as $user) {
				foreach ($orders as $order) {
					foreach ($orderDetails as $orderDetail) {
						if ($user['id'] === $order['user_id'] && $order['order_id'] === $orderDetail['order_id']) {
							$data[$user['name']][$order['order_id']] = [
								'title' => $order['title'],
							];
							$totalPrice = 0;
							
							foreach ($orderDetail['products'] as $product) {
								foreach ($coupons as $coupon) {
									if ($product['id'] === $coupon['product_id']) {
										$couponPrice = strtotime($coupon['end_date']) >= strtotime($order['create_time']) ? $coupon['discount'] : 0;
										$totalPrice += ($product['price'] - $couponPrice) * $product['count'];
									}
								}
								
								$data[$user['name']][$order['order_id']]['products'][$product['name']] = [
									'price' => $product['price'],
									'count' => $product['count'],
									'discount' => $couponPrice
								];
							}
							
							$data[$user['name']][$order['order_id']]['totalPrice'] = $totalPrice;
						}
					}
				}
			}

			function dd() {
				echo '<pre>';
				array_map(function($x) { print_r($x); }, func_get_args());
			}
		?>
		<h3>3. 透過程式整理下列資料</h3>
		<h4>用戶資料</h4>
		<span><?php dd($users);?></span>
		<h4>單頭資料</h4>
		<span><?php dd($orders);?></span>
		<h4>單身資料</h4>
		<span><?php dd($orderDetails);?></span>
		<h4>折扣資料</h4>
		<span><?php dd($coupons);?></span>
		<h4>產生下列資料</h4>
		<span><?php dd($data);?></span>
		<span>備註：</span>
		<span>1. html 空格符號使用 半形的空格，語法可看參考網址(<a href="https://shunnien.github.io/2017/06/03/html-nbsp-emsp-emsp-difference/" target="_blank">參考網址</a>)</span>
	</div>
</body>
</html>
