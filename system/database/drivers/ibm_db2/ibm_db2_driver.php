<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CI_DB_ibm_db2_driver extends CI_DB {

    var $dbdriver = 'ibm_db2';
    var $conn_id = NULL;
    var $stmt_id = NULL;

    public function db_connect($persistent = FALSE)
    {
        $conn_string = "DATABASE={$this->database};HOSTNAME={$this->hostname};PORT={$this->port};PROTOCOL=TCPIP;UID={$this->username};PWD={$this->password};";

        if ($persistent) {
            $this->conn_id = db2_pconnect($conn_string, '', '');
        } else {
            $this->conn_id = db2_connect($conn_string, '', '');
        }

        return $this->conn_id;
    }

    public function db_select()
    {
        // DB2 tidak perlu ganti database setelah connect
        return TRUE;
    }

    public function db_set_charset($charset)
    {
        // DB2 tidak perlu set charset manual
        return TRUE;
    }

    public function _execute($sql)
    {
        $this->stmt_id = db2_exec($this->conn_id, $sql);
        return $this->stmt_id;
    }

    public function trans_begin($test_mode = FALSE)
    {
        return db2_autocommit($this->conn_id, DB2_AUTOCOMMIT_OFF);
    }

    public function trans_commit()
    {
        return db2_commit($this->conn_id);
    }

    public function trans_rollback()
    {
        return db2_rollback($this->conn_id);
    }

    public function escape_str($str, $like = false)
    {
        return str_replace("'", "''", $str);
    }

    public function affected_rows()
    {
        return db2_num_rows($this->stmt_id);
    }

    public function insert_id()
    {
        $result = db2_exec($this->conn_id, "VALUES IDENTITY_VAL_LOCAL()");
        $row = db2_fetch_array($result);
        return $row[0];
    }

    public function _close()
    {
        return db2_close($this->conn_id);
    }

    public function _error_message()
    {
        return db2_stmt_errormsg();
    }

    public function _error_number()
    {
        return db2_stmt_error();
    }

    public function _escape_identifiers($item)
    {
        return '"' . str_replace('"', '""', $item) . '"';
    }

    public function _list_tables($prefix_limit = FALSE)
    {
        return "SELECT TABNAME FROM SYSCAT.TABLES WHERE TYPE='T'";
    }

    public function _list_columns($table = '')
    {
        return "SELECT COLNAME FROM SYSCAT.COLUMNS WHERE TABNAME='" . strtoupper($table) . "'";
    }

    public function _from_tables()
    {
        return $this->_from_tables;
    }
}
