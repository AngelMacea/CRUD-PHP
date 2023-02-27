<?php
    class conexion
    {
        private $con;
        function getCon()
        {
            $servername1 = "DESKTOP-O89JS42";
            $connectionInfo = array("Database"=>"ProyectoPHP", "UID"=>"AdminDB", "PWD"=>"123", "CharacterSet"=>"UTF-8");

            $con = sqlsrv_connect($servername1, $connectionInfo);

            return $con;
        }
    }
?>