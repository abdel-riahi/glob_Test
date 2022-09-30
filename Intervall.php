<html>
<body>
<?php
 
class Intervall {
 
   public array $list;
   
   public function __construct(array $list) {
     $this->list = $list;
   }

   function foo(): array
   {
     $toArray = [];        
 
     array_multisort($this->list, SORT_ASC);    
     $current = array_shift($this->list);
 
    return $this->foo_recursive($current, $this->list);
    }
 
    private function foo_recursive(array $current, array $list): array {
     $result = [];
     $restList = [];
 
     $min = $current[0]; 
     $max = $current[1]; 
 
     $sizeList = count($list); 
 
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
$entry1 = new Intervall([[0, 3], [6, 10]]);
$entry2 = new Intervall([[0, 5], [3, 10]]);
$entry3 = new Intervall([[0, 5], [2, 4]]);
$entry4 = new Intervall([[7, 8], [3, 6], [2, 4]]);
$entry5 = new Intervall([[3, 6], [3, 4], [15, 20], [16, 17], [1, 4], [6, 10], [3, 6]]);

print_r($entry5->foo());
?>
 
</body>
</html>
