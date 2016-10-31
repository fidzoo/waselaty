<?php

use App\Category;

//to count number of Companies in a Category
function compCounter($id){
    $category= Category::find($id);
    return count($category->jobs()->get()); 
}

