<?php

use Illuminate\Http\JsonResponse;

function sendSuccessResponse($message, $extra = []): JsonResponse
{
    return response()->json(['status' => 'success', 'message' => $message, 'extra' => $extra], 200);
}

function sendErrorResponse($message, $extra = [], $statusCode = 200): JsonResponse
{
    return response()->json(['status' => 'error', 'message' => $message, 'extra' => $extra], $statusCode);
}

function sendValidationErrorResponse($errors, $message, $extra = [], $statusCode = 422): JsonResponse
{
    return response()->json(['status' => 'validation_error', 'errors' => $errors, 'message' => $message, 'extra' => $extra], $statusCode);
}

function error404($error = 'Page not found.'): JsonResponse
{
    if(request()->ajax()){
        return response()->json(['status' => 'error', 'error' => $error],404);
    }

    return abort(404, $error);
}

function error403($error = 'You don\'t have permission to Access This Section'):JsonResponse
{
    if(request()->ajax()){
        return response()->json(['status'=>'error','error_code'=>403,'error'=>$error,'message'=>$error],403);
    }
    abort(404, 'You don\'t have permission to Access This Section');
}

function error500($code=null,$error = 'Something went wrong'): JsonResponse
{
    if(request()->ajax()){
        return response()->json(['status'=>'error','error_code'=>500,'error'=>$error,'message'=>$error,
            'coder'=>$code],500);
    }

    return abort(500,$error);
}


function amountStringToDouble(string $value) : float
{
    return (double) preg_replace('/[^0-9.]/', '', $value);
}
function amountDoubleToString(float $value, string $prependString = '₹', int $decimals = 2) : string
{
    return $prependString . number_format($value, $decimals);
}

function dateStringToDate(string $dateString, $format = 'Y-m-d') : string
{
    $timestamp = strtotime($dateString);
    return date('Y-m-d', $timestamp);
}
