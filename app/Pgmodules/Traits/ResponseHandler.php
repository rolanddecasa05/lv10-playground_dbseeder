<?php

namespace App\Pgmodules\Traits;

trait ResponseHandler {

    public function setData($data = []) {
        $this->data = $data;
        return $this;
    }

    public function setMessage(string $message = null) {
        $this->message = $message;
        return $this;
    }

    public function setStatus(int $status_code = 200) {
        $this->status_code = $status_code;
        return $this;
    }

    public function getResponse() {
        $status_code = (isset($this->status)) ? $this->status: 200;

        return response()->json([
            'message' => (isset($this->message)) ? $this->message: 'Data has been fetched..',
            'statusCode' => $status_code,
            'data' => (isset($this->data)) ? $this->data: []
        ], $status_code);

    }

    public function setSuccessResponse($message, $data) {
        return response()->json([
            'message' => ($message) ? $message: 'Request has been succesfully executed..',
            'data' => ($data) ? $data: [],
        ],200);
    }

    public function setErrorResponse($message) {
        return response()->json([
            'message' => ($message) ? $message: 'Error on processing request..',
        ],422);
    }

}