<?php
	echo '"For orders between","' . date('d M Y', strtotime($startDate)) . '"," and ","' . date('d M Y', strtotime($endDate)) . '",' . "\n";
	echo '"Product","Quantity Sold","Total Amount",' . "\n";

	foreach ($products as $id => $product) {
		echo implode(',', $product) . "\n";
	}