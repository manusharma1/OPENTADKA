<?php
class Paginationfunctions
{

	function PrintPagination($records_count,$pagination_num_limit,$DT_PGBREAK,$page_url,$selected_class){

	$num_divide = explode(".",$records_count/$pagination_num_limit); // No Float Values
	$num_reminder = $records_count%$pagination_num_limit;
	$total_num_pages = $num_divide[0];
	
	if($num_reminder != 0){
	$total_num_pages = $total_num_pages + 1;
	}
	$total_num_rem_pages = $total_num_pages-$DT_PGBREAK;
	
	if($records_count>$pagination_num_limit){

		$pagination_html = '<div class="paging"><ul>';

		if($DT_PGBREAK>1){
		$pagination_html .= '<li><a href="'.$page_url.'&pg='.($DT_PGBREAK-1).'">Previous</a></li>';
		}

		if($total_num_rem_pages<=0 && $DT_PGBREAK !=2){
		$pagination_html .= '<li><a href="'.$page_url.'&pg='.($DT_PGBREAK-2).'">'.($DT_PGBREAK-2).'</a></li>';
		}
		if($total_num_rem_pages<=1 && $DT_PGBREAK !=1){
		$pagination_html .= '<li><a href="'.$page_url.'&pg='.($DT_PGBREAK-1).'">'.($DT_PGBREAK-1).'</a></li>';
		}


		if($total_num_pages>=$DT_PGBREAK+1){
		$pagination_html .= '<li><a href="'.$page_url.'&pg='.($DT_PGBREAK).'" class="'.$selected_class.'">'.($DT_PGBREAK).'</a></li>';
		$pagination_html .= '<li><a href="'.$page_url.'&pg='.($DT_PGBREAK+1).'">'.($DT_PGBREAK+1).'</a></li>';
			if($total_num_pages>=$DT_PGBREAK+2){
		$pagination_html .= '<li><a href="'.$page_url.'&pg='.($DT_PGBREAK+2).'">'.($DT_PGBREAK+2).'</a></li>';
			}
		}else if($total_num_pages>=$DT_PGBREAK+2){
		$pagination_html .= '<li><a href="'.$page_url.'&pg='.($DT_PGBREAK+1).'">'.($DT_PGBREAK+1).'</a></li>';
		$pagination_html .= '<li><a href="'.$page_url.'&pg='.($DT_PGBREAK+2).'">'.($DT_PGBREAK+2).'</a></li>';
		}else{
		$pagination_html .= '<li><a href="'.$page_url.'&pg='.$DT_PGBREAK.'" class="'.$selected_class.'">'.$DT_PGBREAK.'</a></li>';
		}

		if($total_num_pages>$DT_PGBREAK){
		$pagination_html .= '<li><a href="'.$page_url.'&pg='.($DT_PGBREAK+1).'">Next</a></li>';
		}

		$pagination_html .= '</ul></div>';

		return $pagination_html;
	}
	
  }

} // Class 
?>