<?php
// echo '<pre>';
// print_r($this->data);
// echo '</pre>';

$t = time();
for ($i = 0; $i < count($this->js); $i++) {
	echo "<script src='/school/js/{$this->js[$i]}'></script>";
}



?>




  </body>

  </html>