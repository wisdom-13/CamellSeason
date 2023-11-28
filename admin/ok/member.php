<?php

$no = $_POST["no"];
$name = $_POST["name"];
$val = $_POST["val"];

query("update MEMBER set m_{$name} = '{$val}' where m_no = '{$no}' ");



?>