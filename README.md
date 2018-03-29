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
polynomial (that is, a quadratic surd). This can be optionally changed.

The computations are performed by the 
[WebAssembly](http://webassembly.org/) version of the 
[Giac](https://www-fourier.ujf-grenoble.fr/~parisse/giac.html)
computer algebra system. Therefore you need a recent web browser,
and also a modern web server.

During processing, a [GeoGebra](http://www.geogebra.org)
file will be created in your browser
that contains all positive outputs of the run. 

## Usage

Put the files in this folder in a directory which is accessible on
the internet by a web browser. Then point your browser to
the index.html file by adding parameters _n_ and _s_ where _n_
is the number of sides of the regular polygon and _s_ is the
setup number to start, in most cases 0.
You can use the parameter _e_ to set the last case to
investigate. If it is not set, the tool assumes that
all cases need to be checked for the given _n_.


Example: http://your.web.site/your.folder/index.html?n=5&s=460&e=470

The output will be shown like this:
```
Welcome to RegularNGons (https://github.com/kovzol/RegularNGons)...
Starting with n=5, s=460
Assuming r=0 ('rationals only' is off), please append &r=1 to the URL to override
Assuming mindegree=1, please append &m=... to the URL to override
Assuming maxdegree=2, please append &M=... to the URL to override
s can be incremented until 990
Computation will stop at 470
Waiting for the CAS...
Elapsed time: 0h 0m 4s
...CAS is up and running
Setting up GeoGebra applet
n=5, s=460: A=0, B=2, C=1, D=2, E=2, F=3, G=3, H=4: {-(d-1)*(d+1)}, {{d=1}}
n=5, s=461: A=0, B=2, C=1, D=2, E=2, F=4, G=3, H=4: {-(d^2-d-1)*(d^2+d-1)}, {{d=(-1/2*(-√5-1))},{d=(1/2*(√5-1))}}
n=5, s=462: A=0, B=2, C=1, D=3, E=0, F=2, G=1, H=4: {-(d^2-3*d+1)*(d^2+3*d+1)}, {{d=(-1/2*(√5-3))},{d=(-1/2*(-√5-3))}}
n=5, s=463: A=0, B=2, C=1, D=3, E=0, F=2, G=2, H=3: {-(d^2-d-1)*(d^2+d-1)}, {{d=(-1/2*(-√5-1))},{d=(1/2*(√5-1))}}
n=5, s=464: A=0, B=2, C=1, D=3, E=0, F=2, G=2, H=4: {-(d^2-d-1)*(d^2+d-1)}, {{d=(-1/2*(-√5-1))},{d=(1/2*(√5-1))}}
n=5, s=466: A=0, B=2, C=1, D=3, E=0, F=3, G=0, H=4: {-(d-1)*(d+1)}, {{d=1}}
n=5, s=468: A=0, B=2, C=1, D=3, E=0, F=3, G=1, H=3: {-(d-1)*(d+1)}, {{d=1}}
n=5, s=469: A=0, B=2, C=1, D=3, E=0, F=3, G=1, H=4: {-(d^2-d-1)*(d^2+d-1)}, {{d=(-1/2*(-√5-1))},{d=(1/2*(√5-1))}}
Elapsed time: 0h 0m 6s
Finished after finding 8 solutions
```
This means, that in a regular pentagon 990 cases will be observed.
For example, case #462 describes the setup when the diagonals are as follows:
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

The parameter _r_ can be used to restrict outputs to rational
values. This setting is off by default.

The parameter _u_ will force searching for results given as parameters.
For example, _u_=2 considers only the outputs that are of _RS_=2.

By adding _m_=... or _M_=... the minimal and maximal degree of outputs
can be controlled. By default _m_=1 and _M_=2.

The option _S_=0 tries to avoid checking cases that were already checked
in an symmetrically equivalent position. When this is set, only
the _A_=0, _B_≤_n_/2 cases will be checked.    

## Examples

The following theorems have been found by using **RegularNGons**:
  * [A property of the regular heptagon](https://www.geogebra.org/m/trpuKnDs)   
  * [A property of the regular nonagon](https://www.geogebra.org/m/xByk6ESM)
  * [Some interesting properties of the regular decagon](https://www.geogebra.org/m/WRpmrAmH)
  * [Some properties of a regular 17-gon](https://www.geogebra.org/m/V6Zdjzza)

## Known issues

  * Note that for bigger _n_ the computations may be slow, or some computation steps may be timed out or the application can crash.
  * You may use the console of your browser by pressing F12 on the startup to get more information on the progress.
  * Some checked cases are duplicated because intersecting different diagonals may result in the same point.
  * Some browsers are not working properly.