<?php
// Know method/Data-form wich is submit (Only support 1 form)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo 'data sent by POST';
} else {
    echo 'data sent by GET';
}
// If we have 2+ Forms
/* if (isset($_POST['submit-form2'])) {
    echo 'data sent';
    print_r($_POST['submit']);
} */