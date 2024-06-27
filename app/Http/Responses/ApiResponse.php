<?php 

namespace App\Http\Responses;

class ApiResponse{
    
    public static function success($message="Success", $status=200, $data=[]){
        
        return response()->json([
            'message' => $message,
            'status' => $status,
            'error' => false,
            'data' => $data
        ], $status);
        
    }
}

?>