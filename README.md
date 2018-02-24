# RegularNGons

Find new theorems in Euclidean elementary plane geometry by observing distances
between intersections of diagonals of a regular polygon.

Given a regular polygon and four diagonals d, e, f and g of it.
Let the points R and S be the intersections of d and e, and f and g,
respectively.

By using algebraic geometry and elimination it is possible to
set up an equation to express the distance RS by using the
length of the side of the polygon.

This tool uses your web browser to find interesting setups
when RS is a rational number, or a root of a quadratic
polynomial (that is, a quadratic surd).

The computations are performed by the Giac computer algebra system.

## Usage

Put the files in this folder in a directory which is accessible on
the internet by a web browser. Then point your browser to
the index.html file by adding parameters n and s where n
is the number of sides of the regular polygon and s is the
setup to start, in most cases 0.

Example: http://your.web.site/your.folder/index.html?n=5&s=0

The output will be shown like this:
```
Starting RegularNGons with n=5, s=0
s will be incremented until 30
n=5, s=4: A=0, B=2, C=1, D=3, E=0, F=2, G=1, H=4: {-(d^2-3*d+1)*(d^2+3*d+1)}
n=5, s=7: A=0, B=2, C=1, D=3, E=0, F=3, G=1, H=4: {-(d^2-d-1)*(d^2+d-1)}
n=5, s=8: A=0, B=2, C=1, D=3, E=0, F=3, G=2, H=4: {-(d^2-d-1)*(d^2+d-1)}
n=5, s=13: A=0, B=2, C=1, D=3, E=1, F=3, G=2, H=4: {-(d^2-3*d+1)*(d^2+3*d+1)}
n=5, s=18: A=0, B=2, C=1, D=4, E=0, F=2, G=1, H=3: {-(d^2-3*d+1)*(d^2+3*d+1)}
n=5, s=22: A=0, B=2, C=1, D=4, E=0, F=3, G=1, H=4: {-(d^2-3*d+1)*(d^2+3*d+1)}
n=5, s=23: A=0, B=2, C=1, D=4, E=0, F=3, G=2, H=4: {-(d^2-d-1)*(d^2+d-1)}
n=5, s=28: A=0, B=2, C=1, D=4, E=1, F=3, G=2, H=4: {-(d^2-d-1)*(d^2+d-1)}
Finished
```
This means, that in a regular pentagon 30 cases will be observed.
The 4th case describes the setup when the diagonals are as follows:
  * d joins the 0th and 2nd vertices,
  * e joins the 1st and 3rd vertices,
  * f joins the 0th and 2nd vertices,
  * g joins the 1st and 4th vertices.

Now by considering the intersection of d and e (that is, point R), and f and g
(that is, point S), the distance of R and S can be expressed either by
the equation `d^2-3*d+1=0` or `d^2+3*d+1=0`. This means that RS must be
one of the following numbers:
  * 1/2*(-sqrt(5)+3)
  * 1/2*(sqrt(5)+3)
  * 1/2*(-sqrt(5)-3)
  * 1/2*(sqrt(5)-3)

The last two ones are negative numbers, that is, they must be excluded.
But the first two possibilities are indeed possible, the first one
occurs in the standard case, and the second one for a regular star pentagon.

## Issues

  * Note that for bigger n the computations may be slow, or some computation steps may be timed out.
  * Use the console of your browser by pressing F12 on the startup to get more information on the progress.
The HTML page may not be refreshed properly.
