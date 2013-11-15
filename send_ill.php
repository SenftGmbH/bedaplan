<?php
include("/xmpp.php");
$conn = new XMPP('xmppserver', 5222, 'xmppuser', 'xmpppassword', 'xmpphp', '', $printlog=False, $loglevel=LOGGING_INFO);
$conn->connect();
$conn->processUntil('session_start');
$conn->message('xmpp-destination-user', 'Ich bin krank!');
$conn->disconnect();
?>
