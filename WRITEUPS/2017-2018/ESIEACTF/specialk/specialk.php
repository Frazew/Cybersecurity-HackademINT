<br />
<a href="WRITEUPS/2017-2018/ESIEACTF/specialk/special-k.png">download special-k.png</a>
<br />
<br />
Une image est cachée dans une autre, on utilise binwalk. D'habitude un <code>binwalk -e</code> premet d'extraire le contenu mais pas toujours. On utilise alors:
<br />
<br />
<pre><code>
binwalk special-k.png

DECIMAL       HEXADECIMAL     DESCRIPTION
--------------------------------------------------------------------------------
0             0x0             PNG image, 1000 x 667, 8-bit/color RGB, non-interlaced
159           0x9F            Zlib compressed data, best compression
837364        0xCC6F4         PNG image, 912 x 500, 8-bit grayscale, non-interlaced
837479        0xCC767         Zlib compressed data, best compression

#man dd -->  skip=N: skip N ibs-sized blocks at start of input
dd if=special-k.png skip=1 of=flag.png bs=837364

</code></pre>
