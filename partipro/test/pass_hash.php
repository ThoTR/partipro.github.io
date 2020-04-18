<?php
    //test fonction password_verify
    $hash = '$2y$10$WUXmfWOTO3gf.QIwxuHH0ecG51cmEsgW5YmHbQaAHcYL6wV11GgOm';
    if (password_verify('admin', $hash)) {
        echo 'Password is valid!';
    } else {
        echo 'Invalid password.';
    }
