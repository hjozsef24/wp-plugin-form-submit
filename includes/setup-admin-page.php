<?php
require_once(FORM_SUBMITS_PATH . "/includes/get-database-records.php");

function addAdminMenuPage()
{
    add_menu_page(
        'Üzenetek',
        'Üzenetek',
        'manage_options',
        'form-submits',
        'createAdminPage',
        'dashicons-email-alt',
        25
    );
}
add_action('admin_menu', 'addAdminMenuPage');


function createDataTable()
{
    $dbRecords = getDatabaseRecords();

    $table = "<table><thead><tr>";
    $table .= "<th>Beküldés ideje</th>";
    $table .= "<th>Név</th>";
    $table .= "<th>Cégnév</th>";
    $table .= "<th>E-mail cím</th>";
    $table .= "<th>Telefonszám</th>";
    $table .= "<th>Üzenet</th>";
    $table .= "<th>CV</th>";
    $table .= "<th>GDPR</th>";
    $table .= "</tr></thead><tbody>";

    foreach ($dbRecords as $record) {
        $table .= "<tr>";

        $submitTime  = $record->submit_time;
        $name        = $record->name;
        $companyName = $record->company_name;
        $email       = $record->email;
        $phone       = $record->phone;
        $message     = $record->message;
        $cv          = $record->cv;
        $gdpr        = $record->gdpr;

        $table .= "<td>$submitTime</td>";
        $table .= "<td>$name</td>";
        $table .= "<td>$companyName</td>";
        $table .= "<td>$email</td>";
        $table .= "<td>$phone</td>";
        $table .= "<td>$message</td>";
        $table .= "<td>$cv</td>";
        $table .= "<td>$gdpr</td>";

        $table .= "</tr>";
    }

    $table .= "</tbody></table>";
    return $table;
}

function createAdminPage()
{
    $table = createDataTable();

    echo $table;
}
