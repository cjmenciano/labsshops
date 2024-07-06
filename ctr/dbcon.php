<?php

/*$uri = "postgres://postgres.mxspiilrivyunwezpyvy:1glilaIDjGV4iT7r@aws-0-ap-southeast-1.pooler.supabase.com:6543/postgres";
$fields = parse_url($uri);

// build the DSN including SSL settings
$conn = "mysql:";
$conn .= "host=" . $fields["host"];
$conn .= ";port=" . $fields["port"];;
$conn .= ";dbname=lsd_sched_monitoring";
$conn .= ";sslmode=verify-ca;sslrootcert='C:/xampp/htdocs/mysql-ca.pem'";

try {
  $db = new PDO($conn, $fields["user"], $fields["pass"]);

    //$stmt1 = $db->query("SELECT VERSION()");
    //print($stmt1->fetch()[0]);

} catch (Exception $e) {
  echo "Error: " . $e->getMessage();
}*/

$uri = "mysql://avnadmin:AVNS_Nkh4nhKQD24I9gG073L@lsd-sched-monitoring-cjmenciano-a9f6.f.aivencloud.com:11146/lsd_sched_monitoringde?ssl-mode=REQUIRED";
$fields = parse_url($uri);

// build the DSN including SSL settings
$conn = "mysql:";
$conn .= "host=" . $fields["host"];
$conn .= ";port=" . $fields["port"];;
$conn .= ";dbname=lsd_sched_monitoring";
$conn .= ";sslmode=verify-ca;sslrootcert='C:/xampp/htdocs/mysql-ca.pem'";

try {
  $db = new PDO($conn, $fields["user"], $fields["pass"]);

    //$stmt1 = $db->query("SELECT VERSION()");
    //print($stmt1->fetch()[0]);

} catch (Exception $e) {
  echo "Error: " . $e->getMessage();
}

/*$uri = "postgres://postgres.mxspiilrivyunwezpyvy:1glilaIDjGV4iT7r@aws-0-ap-southeast-1.pooler.supabase.com:6543/postgres";
$fields = parse_url($uri);

$conn = "pgsql:";
$conn .= "host=" . $fields["host"];
$conn .= ";port=" . $fields["port"];;
$conn .= ";dbname=postgres";  
$conn .= ";sslmode=verify-ca;sslrootcert='C:/xampp/htdocs/prod-ca-2021.crt'";

try {
  $db = new PDO($conn, $fields["user"], $fields["pass"]);

    //$stmt1 = $db->query("SELECT VERSION()");
    //print($stmt1->fetch()[0]);

} catch (Exception $e) {
  echo "Error: " . $e->getMessage();
}*/
?>