<?php
    require "../../connector/init.php";
    $header = $_POST['header'];
    $text = $_POST['text'];
    $username = $_POST['username'];

    if(!empty($header) && !empty($text) && !empty($username))
    {
        $sql = "InSeRt iNto post (header, text, username) VaLuEs (?,?,?)";
        $data = [$header, $text, $username];

        $db->query($sql, $data);
    }

    header("Location: https://project.skolakrizik.cz/~svecrobert/forum/index.php");
    exit;
?>