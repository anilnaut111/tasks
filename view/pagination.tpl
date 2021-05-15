<?php
  function number_pageing($resultSet=array(),$controller='',$function='',$start=0,$order='',$sort='') {
	global $SITE_URL;
	global $RECORDS_PER_PAGE;
	global $PAGE_TO_SHOW;
		
	$record_per_page = $RECORDS_PER_PAGE;
	$pages = $PAGE_TO_SHOW;

		
    $totalrows = count($resultSet);


    $total_pages = ceil($totalrows / $record_per_page);
    $current_page = ($start + $record_per_page) / $record_per_page;
    $loop_counter = ceil($current_page / $pages);
    
    $start_loop = ($loop_counter * $pages - $pages) - 2;
    if($start_loop <= 0){
      $start_loop = 1;
	}
    $end_loop = ($pages * $loop_counter) + 4;

    $start_loop = ($loop_counter * $pages - $pages) + 1;
    $end_loop = ($pages * $loop_counter) + 1;

    if($end_loop > $total_pages) {
      $end_loop = $total_pages + 1;
    }

    $pagination_html = '<ul class="pagination justify-content-end" style="margin:20px 0">';
	$url = $SITE_URL . '/index.php/'.$controller.'/'.$function;
	$order = '&orderby='.$order.'&sort='.$sort;
    if($start > 0) {
      $pagination_html.='<li class="page-item"><a href="'.$url.'?start=0'.$order.'" class="page-link link2">First</a></li>';
	  
      $pagination_html.='<li class="page-item"><a href="' . $url . '?start=' . ($start - $record_per_page) . $order . '" class="page-link link2">Prev</a></li>';
    }

	for($i = $start_loop; $i < $end_loop; $i++) {
		if($current_page == $i) {
		  $pagination_html.='<li class="page-item active"><a href="javascript:;" class="page-link">' . $i . '</a></li>';
		}
		else {
		  $pagination_html.='<li class="page-item"><a href="' . $url.'?start=' . ($i - 1) * $record_per_page . $order . '" class="page-link link2">' . $i . '</a></li>';
		}
	}
    
    if($start + $record_per_page < $totalrows) {      
      $pagination_html.='<li class="page-item"><a href="' . $url . '?start=' . ($start + $record_per_page) . $order . '" class="page-link link2">Next</a></li>';
      
      $pagination_html.='<li class="page-item"><a href="' . $url . '?start=' . (($total_pages - 1) * $record_per_page) . $order . '" class="page-link link2">Last</a></li>';
    }
    
    $pagination_html.='</ul>';

	return $pagination_html;
  }
