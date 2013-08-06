<?php

namespace Httpstatuses;

class Httpstatuses
{
    public function spec_list()
    {
        $specs = json_decode(file_get_contents("specs/specs.json"), true);
        return $specs;
    }
    
    public function statuses($spec, $class = "*")
    {
        $class_files = glob("specs/{$spec}/{$class}.json");
        
        foreach($class_files as $class_file)
        {
            $class = json_decode(file_get_contents($class_file), true);
            $classes[$class["class"]["class"]] = $class;
        }
        
        return $classes;
    }
    
    public function status($code, $spec)
    {
        $class = substr($code, 0, 1);
        $specs = $this->spec_list();
        $spec_codes = array();
        
        foreach($specs as $spec => $properties) {
            if(file_exists("specs/{$spec}/{$class}.json")) {
                $spec_class_file = json_decode(file_get_contents("specs/{$spec}/{$class}.json"), true);
                if(isset($spec_class_file['codes'][$code]))
                    $spec_codes[$spec] = $spec_class_file['codes'][$code];
            }
        }
        
        if(empty($spec_codes))
            return false;
        
        return $spec_codes;
    }
}