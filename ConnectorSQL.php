<?php

$connection = pg_connect("host=ec2-54-221-198-156.compute-1.amazonaws.com port=5432 dbname=dcvm369d6sl8tr user=tpxgiylnxuuodr password=3c1187366d0ec071c50a6b23f08463c7cf5c0e83b0d8304df3d6d76ac0bff16e");  
 if(!$connection) {
     die("Database connection failed");
 }
 ?>
