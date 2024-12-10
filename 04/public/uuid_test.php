<?php
echo uniqid(time(), true);

/* We can also prefix the uniqid, this the same as
 * doing:
 *
 * $uniqid = $prefix . uniqid();
 * $uniqid = uniqid($prefix);
 */
printf("uniqid('php_'): %s\r\n", uniqid('php_'));