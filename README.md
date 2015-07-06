# blobBoundary
blob boundary solution
=== Requirement: ===
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
