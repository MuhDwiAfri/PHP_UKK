<?php
	session_start();
	session_destroy();
	echo "<script>alert('Terima Kasih, Anda Telah Logout!');document.location.href='../'</script>/n";
?>