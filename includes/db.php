<?php
final class DBSelector
{
    public static function selectDB($dbtype)
    {
        if (require_once('db/' . $dbtype . '.db.php')) {
            $dbclassname = $dbtype. '_DBConnection';
            return $dbclassname;
        } else {
            trigger_error('Database File not found');
        }
    }
}
?>
