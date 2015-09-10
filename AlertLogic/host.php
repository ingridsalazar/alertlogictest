<?php
include 'db.php';

class Host
{
    public static function getList($only_active = false)
    {
        static $result;
        
        if (!empty($result)) return $result;
        
        $stmt = "SELECT
                    distinct hos.host_id,
                    hos.host_name,
                    hos.ip_address,
                    cre.username
                 FROM hosts hos
                 LEFT JOIN credentials cre ON hos.credential_id = cre.credential_id
                 WHERE
                    hos.deleted       = 0";
        
        //// This code is never use, the only_active is always false, so this filter is not apply
        /*if ($only_active === true) {
            $stmt .= " AND hos.active = 1";
        }*/
        
        $result = DB::getAll($stmt);
        
        return $result;
    }
}
?>