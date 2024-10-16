<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponseTrait
{
    protected $response = [
        'success' => true,
        'message' => '',
        'data' => [],
        'meta' => [
            'timestamp' => null,
            'version' => '1.0.0',
        ],
        'error' => null,
        // 'media_type' => 'application/json',
    ];

    /**
     * Set response message and success flag.
     *
     * @param bool|null $success
     * @param string|null $message
     * @return $this
     */
    public function apiResponse($success = null, $message = null)
    {
        // If success is provided, set it
        if ($success !== null) {
            $this->response['success'] = $success;
        }

        // Set message if provided
        $this->response['message'] = $message ?? ($this->response['success'] ? 'Request was successful' : 'Request failed');

        // Set timestamp
        $this->response['meta']['timestamp'] = now()->toIso8601String();

        return $this;
    }

    /**
     * Add data to the response with a custom key.
     *
     * @param mixed $data
     * @param bool $separate
     * @param string $key
     * @return $this
     */
    public function data($data, $separate = false, $key = 'data')
    {
        if ($separate) {
            // Jika `true`, tambahkan data sebagai properti terpisah
            foreach ($data as $k => $value) {
                $this->response[$k] = $value;
            }
        } else {
            // Jika `false`, gunakan kunci yang ditentukan untuk menyimpan data
            $this->response[$key] = $data;
        }

        return $this;
    }

    /**
     * Add data to the response with a custom key.
     *
     * @param mixed $data
     * @param bool $separate
     * @param string $key
     * @return $this
     */
    public function services($data, $separate = false, $key = 'data')
    {
        if (!empty($data['success'])) {
            $this->success($data['success']);
            // unset($data['success']);
        }
        
        if (!empty($data['message'])) {
            $this->message($data['message']);
            unset($data['message']);
        }

        if (!empty($data['statusCode'])) {
            $this->statusCode($data['statusCode']);
            unset($data['statusCode']);
        }

        if ($separate) {
            // Jika `true`, tambahkan data sebagai properti terpisah
            foreach ($data as $k => $value) {
                $this->response[$k] = $value;
            }
        } else {
            // Jika `false`, gunakan kunci yang ditentukan untuk menyimpan data
            $this->response[$key] = $data;
        }

        return $this;
    }

    /**
     * Set the API version.
     *
     * @param string $version
     * @return $this
     */
    public function version($version)
    {
        $this->response['meta']['version'] = $version;
        return $this;
    }

    /**
     * Set error details.
     *
     * @param string $error
     * @return $this
     */
    public function error($error)
    {
        $this->response['error'] = $error;
        return $this;
    }

    /**
     * Set response media type.
     *
     * @param string $mediaType
     * @return $this
     */
    public function mediaType($mediaType)
    {
        $this->response['media_type'] = $mediaType;
        return $this;
    }

    /**
     * Set response message.
     *
     * @param string $message
     * @return $this
     */
    public function message($message)
    {
        $this->response['message'] = $message;
        return $this;
    }

    /**
     * Set response success status.
     *
     * @param bool $success
     * @return $this
     */
    public function success($success)
    {
        $this->response['success'] = $success;
        return $this;
    }

    /**
     * Set HTTP status code.
     *
     * @param int $statusCode
     * @return $this
     */
    public function statusCode($statusCode = 200)
    {
        $this->response['statusCode'] = $statusCode;
        http_response_code($statusCode);
        return $this;
    }

    /**
     * Get the final JSON response.
     *
     * @return JsonResponse
     */
    public function send($statusCode = null): JsonResponse
    {
        // Hapus kunci 'data' jika arraynya kosong
        if (empty($this->response['data'])) {
            unset($this->response['data']);
        }
        
        // Jika ada error, set success menjadi false
        if ($this->response['error'] !== null) {
            $this->response['success'] = false;
        }

        if (empty($this->response['error'])) {
            unset($this->response['error']);
        }

        // Hapus kunci 'status_code' jika tidak disetel
        if (!isset($this->response['statusCode'])) {
            $statusCode = $this->response['success'] ? 200 : 400;
        } else {
            $statusCode = $this->response['statusCode'];
        }
        unset($this->response['statusCode']);
        
        if ($statusCode) {
            $this->response['success'] = false;
            unset($this->response['data']['success']);
        }

        return response()->json($this->response, $statusCode);
    }
}
