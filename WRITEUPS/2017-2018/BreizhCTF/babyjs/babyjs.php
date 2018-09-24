<br />
<a href="WRITEUPS/2017-2018/BreizhCTF/babyjs/baby.js">download baby.js</a>
<br />
<a href="WRITEUPS/2017-2018/BreizhCTF/babyjs/extracted.js">download extracted.js</a>
<br />
<a href="WRITEUPS/2017-2018/BreizhCTF/babyjs/solve.py">download solve.py</a>
<br />
<br />
JsFuck:
<br />
Encode : http://jscrew.it/
<br />
Decode : http://ooze.ninja/javascript/poisonjs/
<br />
<br />
baby.js
<pre><code class="hljs javascript">
[][(![]+[])[+[]]+([![]]+[][[]])[+!+[]+[+[]]]]
...
[]+!+[]+!+[]+!+[]]+([][[]]+[])[!+[]+!+[]]))()

</code></pre>
extracted.js
<pre><code class="hljs javascript">
function breizHash(string, method)  {   
    if (!('ENCRYPT' == method || 'DECRYPT' == method)) {
        method = 'ENCRYPT';
    }
    if ('ENCRYPT' == method){
        var output = '';
        for (var x = 0, y = string.length, charCode, hexCode; x < y; ++x) {
            charCode = string.charCodeAt(x);
            if (128 > charCode) {
                charCode += 128;       
            } else if (127 < charCode) {
                charCode -= 128;
            }       
            charCode = 255 - charCode;
            hexCode = charCode.toString(16);
            if (2 > hexCode.length) {         
                hexCode = '0' + hexCode;       
            }        
            output += hexCode;     
        }     
        return output;   

</code></pre>
solve.py
<pre><code class="hljs python">
#! /usr/bin/env python3
import binascii
string="3d25373c2b39044f1d390a4a1c4b484e4f11204e4a20114f48204a4c3c0a0d16480620084c131c4f124c200b4f20352c20084f0d131b02"
plain=""
for i in range(1,len(string),2):
    duo=string[i-1:i+1]
    x=ord(binascii.unhexlify(duo))
    x=255-x
    if x<=128:
        x-=128
    elif x>=128:
        x-=128
    plain+=chr(x)
print (plain)

</code></pre>

