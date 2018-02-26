# RegularNGons

Find new theorems in elementary plane geometry by observing distances
between intersections of diagonals of a regular polygon.

Given a regular polygon and four diagonals _d_, _e_, _f_ and _g_ of it.
Let the points _R_ and _S_ be the intersections of _d_ and _e_, and _f_ and _g_,
respectively.

By using algebraic geometry and elimination it is possible to
set up an equation to express the distance _RS_ by using the
length of the side of the polygon.

This tool uses your web browser to find interesting setups
when _RS_ is a rational number, or a root of a quadratic
polynomial (that is, a quadratic surd).

The computations are performed by the 
[Giac](https://www-fourier.ujf-grenoble.fr/~parisse/giac.html)
computer algebra system. If your web server and browser
are compatible, the calculations will use
the [WebAssembly](http://webassembly.org/) version of Giac, provided by the
[GeoGebra](http://www.geogebra.org) Team. 

## Usage

Put the files in this folder in a directory which is accessible on
the internet by a web browser. Then point your browser to
the index.html file by adding parameters _n_ and _s_ where _n_
is the number of sides of the regular polygon and _s_ is the
setup number to start, in most cases 0.

Example: http://your.web.site/your.folder/index.html?n=5&s=0

The output will be shown like this:
```
Starting RegularNGons with n=5, s=0
s can be incremented until 30
n=5, s=4: A=0, B=2, C=1, D=3, E=0, F=2, G=1, H=4: {-(d^2-3*d+1)*(d^2+3*d+1)}, {{d=(-1/2*(√5-3))},{d=(-1/2*(-√5-3))}}
n=5, s=7: A=0, B=2, C=1, D=3, E=0, F=3, G=1, H=4: {-(d^2-d-1)*(d^2+d-1)}, {{d=(-1/2*(-√5-1))},{d=(1/2*(√5-1))}}
n=5, s=8: A=0, B=2, C=1, D=3, E=0, F=3, G=2, H=4: {-(d^2-d-1)*(d^2+d-1)}, {{d=(-1/2*(-√5-1))},{d=(1/2*(√5-1))}}
n=5, s=13: A=0, B=2, C=1, D=3, E=1, F=3, G=2, H=4: {-(d^2-3*d+1)*(d^2+3*d+1)}, {{d=(-1/2*(√5-3))},{d=(-1/2*(-√5-3))}}
n=5, s=18: A=0, B=2, C=1, D=4, E=0, F=2, G=1, H=3: {-(d^2-3*d+1)*(d^2+3*d+1)}, {{d=(-1/2*(√5-3))},{d=(-1/2*(-√5-3))}}
n=5, s=22: A=0, B=2, C=1, D=4, E=0, F=3, G=1, H=4: {-(d^2-3*d+1)*(d^2+3*d+1)}, {{d=(-1/2*(√5-3))},{d=(-1/2*(-√5-3))}}
n=5, s=23: A=0, B=2, C=1, D=4, E=0, F=3, G=2, H=4: {-(d^2-d-1)*(d^2+d-1)}, {{d=(-1/2*(-√5-1))},{d=(1/2*(√5-1))}}
n=5, s=28: A=0, B=2, C=1, D=4, E=1, F=3, G=2, H=4: {-(d^2-d-1)*(d^2+d-1)}, {{d=(-1/2*(-√5-1))},{d=(1/2*(√5-1))}}
Elapsed time: 0h 0m 7s
Finished
```
This means, that in a regular pentagon 30 cases will be observed.
The 4th case describes the setup when the diagonals are as follows:
  * _d_ joins the 0th and 2nd vertices,
  * _e_ joins the 1st and 3rd vertices,
  * _f_ joins the 0th and 2nd vertices,
  * _g_ joins the 1st and 4th vertices.

Now by considering the intersection of _d_ and _e_ (that is, point _R_), and _f_ and _g_
(that is, point _S_), the distance of _R_ and _S_ can be expressed either by
the equation `d^2-3*d+1=0` or `d^2+3*d+1=0`. Since only the positive
roots have a geometric meaning, _RS_ must be one of the following numbers:
  * (3-√5)/2
  * (3+√5)/2

Both results are possible geometrically. The first one
occurs in the standard case, and the second one for a regular star-pentagon:
![a regular pentagon](/fig/pentagon-small.png?raw=true "A regular pentagon")
![a regular star-pentagon](/fig/star-pentagon-small.png?raw=true "A regular star-pentagon")

### Other parameters

You can use the parameter _e_ to set the last case to
investigate. If it is not set, the tool assumes that
all cases need to be checked for the given _n_.

## Examples

The following theorems have been found by using **RegularNGons**:
  * [A property of the regular heptagon](https://www.geogebra.org/m/trpuKnDs)   
  * [A property of the regular nonagon](https://www.geogebra.org/m/xByk6ESM)
  * [Some interesting properties of the regular decagon](https://www.geogebra.org/m/WRpmrAmH)
  * [Some properties of a regular 17-gon](https://www.geogebra.org/m/V6Zdjzza)

## Known issues

  * Note that for bigger _n_ the computations may be slow, or some computation steps may be timed out.
  * Use the console of your browser by pressing F12 on the startup to get more information on the progress.
The HTML page may not be refreshed properly.
  * The case _n_=11, _s_=104663 makes Giac/WebAssembly crash when starting with case s=0.
  * Some checked cases are duplicated because of ignored symmetry.