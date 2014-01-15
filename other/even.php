 <?php
 
    function is_even($num)
    {
        $num = (int)$num;
        return ($num & 1) ? false : true;
    }
 