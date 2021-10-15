<?php

namespace App\Http\Services;

use Exception;

class Service{

    protected function getResponseData($data){
        $result = ['status' => 200];
        
        try {
            $result['data'] = $data;
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return $result;
    }

}