<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CI_DB_ibm_db2_result extends CI_DB_result {

    public function num_rows()
    {
        return db2_num_rows($this->result_id);
    }

    public function num_fields()
    {
        return db2_num_fields($this->result_id);
    }

    public function list_fields()
    {
        $field_names = array();
        for ($i = 0; $i < $this->num_fields(); $i++) {
            $field_names[] = db2_field_name($this->result_id, $i);
        }
        return $field_names;
    }

    public function field_data()
    {
        $retval = array();
        for ($i = 0; $i < $this->num_fields(); $i++) {
            $F = new stdClass();
            $F->name = db2_field_name($this->result_id, $i);
            $F->type = db2_field_type($this->result_id, $i);
            $F->max_length = db2_field_display_size($this->result_id, $i);
            $retval[] = $F;
        }
        return $retval;
    }

    public function free_result()
    {
        if (is_resource($this->result_id)) {
            db2_free_result($this->result_id);
            $this->result_id = FALSE;
        }
    }

    protected function _fetch_assoc()
    {
        return db2_fetch_assoc($this->result_id);
    }

    protected function _fetch_object($class_name = 'stdClass')
    {
        $row = db2_fetch_object($this->result_id);
        if ($row && $class_name != 'stdClass') {
            $obj = new $class_name();
            foreach ($row as $key => $val) {
                $obj->$key = $val;
            }
            return $obj;
        }
        return $row;
    }
}
