<?php

if (!function_exists('active')) {
	function active($segment = null) {
		if (isset(request()->segments()[0])) {
			if ($segment == request()->segments()[0]) return 'active';
		} else {
			if ($segment == null) return 'active';
		}
	}
}

if (!function_exists('isBookAvailable')) {
	function isBookAvailable($book, $fromDate, $toDate) {
		$from = $book->bookings()->whereBetween('from', [$fromDate->format('Y-m-d'), $toDate->format('Y-m-d')])->exists();
		$till =	$book->bookings()->whereBetween('till', [$fromDate->format('Y-m-d'), $toDate->format('Y-m-d')])->exists();

		return ($from || $till) ? true : false;
	}
}