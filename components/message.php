<?php
if (isset($this->data['error'])) {
	echo $this->data['error'];
	echo "<p class='errorMessage'>{$this->data['error']}</p>";
} else {
	echo "<p class='errorMessage'></p>";
}
?>
	</div>

	<div class="container">