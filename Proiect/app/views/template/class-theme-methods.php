<?php
if(!class_exists('ThemeMethods'))
{
    class ThemeMethods
    {
        //This function creates the menu
        public function navigation($items_array,$CssClass)
        {
            $nav='<nav class="'.$CssClass.'">';
            $nav.='<ul class="'.$CssClass.'">';
            
            foreach($items_array as $item)
            {
                $nav.='<li class="'.$CssClass.'"><a class="'.$CssClass.'" href="'.$item['url'].'">'.$item['text'].'</a></li>';
            }
            
            $nav.='</ul>';
            $nav.='</nav>';
            
            return $nav;
        }
    }
}

$themeMethods=new ThemeMethods;
?>