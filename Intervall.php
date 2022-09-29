<?php
 
class Intervall {
 
    function foo(array $list): array
    {
        $toArray = [];        
 
        array_multisort($list, SORT_ASC);    
        $current = array_shift($list);
 
        return $this->foo_recursive($current, $list);
    }
 
    private function foo_recursive(array $current, array $list): array {
        $result = [];
        $restList = [];
 
        $min = $current[0]; 
        $max = $current[1]; // 5
 
        $sizeList = count($list); // 1
 
        for($i=0; $i < $sizeList; $i++) {
            if ($max < $list[$i][0]) {
                $restList[]= $list[$i];
                continue;
            } 
            if ($list[$i][1] > $max) {
                $max = $list[$i][1]; 
            }
        }
 
        $result[] = [$min, $max];
 
        if(!empty($restList)) {
            $next = array_shift($restList);
            $result = array_merge($result, $this->foo_recursive( $next, $restList ));
        }
        return $result;
    }
}
