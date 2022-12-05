<?php

class Utils {
    public function drawPager($totalItems, $perPage) {
		$pages = ceil($totalItems / $perPage);
		if(!isset($_GET['page']) || intval($_GET['page']) == 0) {
			$page = 1;
		} else if (intval($_GET['page']) > $totalItems) {
			$page = $pages;
		} else {
			$page = intval($_GET['page']);
		}
		$pager =  "<nav aria-label='Page navigation'>";
        $pager .= "<ul class='pagination'>";
        $pager .= "<li><a href='?page=1' aria-label='Previous'><span aria-hidden='true'>«</span> Back</a></li>";
        if ($page - 1 >= 5 ) {
            $lower = $page - 5;
        } else {
            $lower = 1;
        }
        if ($pages-$page>5) {
            $higher = $page + 5;
        } else {
            $higher = $pages;
        }
        for($i=$lower; $i<=$higher; $i++) {
            $pager .= "<li><a href='?page=". $i."'>" . $i ."</a></li>";
        }
        $pager .= "<li><a href='?page=". $pages ."' aria-label='Next'><span aria-hidden='true'>»</span></a></li>";
        $pager .= "</ul>";
        return $pager;
	}
}