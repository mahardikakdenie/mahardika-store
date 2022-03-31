<?php

namespace App\Http\Controllers\API;

class Json
{

    protected static $response = [
        "meta" => [
            "status" => true,
            "message" => "success",
            "code" => 404
        ],
        "data" => null
    ];

    public static function response($data = null, $message = "Success",)
    {
        Self::$response["meta"]["message"] = $message;
        Self::$response["meta"]["status"] = true;
        Self::$response["meta"]["code"] = 200;
        Self::$response["data"] = $data;

        return response()->json(Self::$response);
    }

    public static function exception($message = null, $code = 400, $error = null, $status = false)
    {
        Self::$response["meta"]["status"] = $status;
        Self::$response["meta"]["code"] = $code;
        Self::$response["data"] = [];
        if ($error instanceof \ErrorException) {
            $response['meta']['message'] = $error->getMessage();
            $response['error']['file'] = $error->getFile();
            $response['error']['line'] = $error->getLine();
        } else {
            $response['error'] = $error;
        }

        return response()->json(Self::$response);
    }
}
