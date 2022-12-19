<?php

namespace App\Traits;


trait ApiResponser {

  protected function successResponse($data = [], $message = null, $statusCode = 200)
	{
		return response()->json([
			'status'=> $statusCode,
			'message' => $message,
			'data' => $data,
		], $statusCode);
	}

	protected function errorResponse($message = null, $statusCode = 422, $data = [])
	{
		return response()->json([
			'status'=> $statusCode,
			'message' => $message,
			'data' => $data,
		], $statusCode);
	}
}
