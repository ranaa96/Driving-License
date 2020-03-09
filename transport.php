<?php

include_once "share.php";
class transport extends share{

    public function calcTotal($cc,$money){

        $data;
        if($cc<=1030) $data=225;
        elseif($cc<=1330) $data=350;
        elseif($cc<=1630) $data=750;
        elseif($cc<=2030){

            $data=(1.5/100)*$money;
            if($data<1500){$data=1500;}
        }
        
        elseif($cc>2030) {

            $data=(2.5/100)*$money;
            if($data<2000){$data=2000;}
        }
        
        return $data;

    }


}






?>