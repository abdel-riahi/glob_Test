# glob_Test


1) on trie la liste des tableaux par ordre croissant et on stock la valeur minimale et maximale du premier tableau ,
= > $list[0] : $min = $list[0][0] , $max = list[0][1]

2) on fait une boucle for sur la liste avec une incrimentation de 1  et on compare la valeur $max avec $list[$i][0] et $list[$i][1]
=> exmeple foo([[0, 5], [3, 10]])
$min = 0 et $max = 5 
 -> si $max (5) < $list[$i][1] (10)  donc $max => 10,et on stock le $min et la nouvelle valuer de $max = 10 dans un tableau  
 -> si $max < $list[$i][0] donc on stack le tableau suivant dans nouveau tableau vide ( $restList[]) --->  $restList[]= $list[$i]
 pour parcourir le rest list encore une fois (recursive) est ainsi de suite.
 
 *)L'objectif de ce test est de trouver et d'afficher l'intervalle min max entre les tableaux qui sont des valeurs incluses
sinon on affiche le min max des tables dans l'ordre par défaut
