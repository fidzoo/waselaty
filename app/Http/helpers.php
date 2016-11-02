<?php

use App\Category;
use App\SiteContent;

//to count number of Companies in a Category
function compCounter($id){
    $category= Category::find($id);
    return count($category->jobs()->get()); 
}

//Social Media Links
function social($social){
	//get Social Media Links
    $url= SiteContent::where('item', $social)->first();

    return $url->ar_content;
}