<?php


namespace Core;


abstract class BaseModel
{
    public function loadData(array $data){
        foreach ($data as $key => $value){
            if(property_exists($this, $key)){
                $this->$key = $value;
            }else{
                echo "property $key not exists";
            }
        }
    }

    public function validate(){

    }
}