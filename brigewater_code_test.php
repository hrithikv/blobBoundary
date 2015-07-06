<?php
/*
 * brigewater_code_test.php
 * === Requirement: ===
 * A Blob is a shape in two-dimensional integer coordinate space where all cells 
 * have at least one adjoining cell to the right, left, top, or bottom that is also occupied. 
 * Given a 10x10 array of boolean values that represents a Blob uniformly selected at random 
 * from the set of all possible Blobs that could occupy that array, write a program that will 
 * determine the Blob boundaries. Optimize first for finding the correct result, second for 
 * performing a minimum number of cell Boolean value reads, and third for the elegance and 
 * clarity of the solution.
 * 
 * <=== Solution: ===>
 * Sum the integer of Hotizontal and Vertical into to according array,   
 * The first and last non-zero keys are the left/top and right/bottom values. 
 * 
 * @php_version: 5.5.19
 * @author bjiang 06/01/2015
 * 
 */

$testfile = empty($_GET["testdata"]) ? 1 : $_GET["testdata"] ;

//== Open the Input file as txt, Read input from STDIN.
//== Output on URL Example: (there are 2 test data included, switch by 'testdata' param.)
//== http://.../brigewater_code_test.php?testdata=2
$fh = fopen ("./testdata".$testfile.".txt","r");
$top=$lft=$btm=$rgt=0;
$r=$reads=0;  //-- $r for rows counter, $reads for actual number of times doing the reads.

$hArray = array(); //-- Horizontal data array.
$vArray = array(); //-- Vertical data array.

//== the loop to Sum() the the Horizontal and Vertical.
while ($line = fgets($fh)) {
    $rowArray = str_split(rtrim($line));
    for($i=0; $i < count($rowArray); $i++) {
        if($rowArray[$i]>0){
            $reads++;
            $hArray[$i] += $rowArray[$i];
            if($rowArray[$i] > 0 && $lft == 0)
                $lft=$i;
        }
    }
    $vArray[$r] = array_sum($rowArray);
    $reads++;
    $r++;
}

//== find the fist/last key for Left/Right value.
$hArray = array_filter($hArray);
$lft = key($hArray);
end($hArray);
$rgt = key($hArray);

//== find the fist/last key for Top/Bottom value.
$vArray = array_filter($vArray);
$top = key($vArray);
end($vArray);
$btm = key($vArray);

//== Output.
echo "Cell Reads: ". $reads. "<br>";
echo "Top: ". $top. "<br>";
echo "Left: ". $lft. "<br>";
echo "Bottom: ". $btm. "<br>";
echo "Right: ". $rgt. "<br>";

fclose($fh);

?>