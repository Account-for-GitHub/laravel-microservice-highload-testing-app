<?php

namespace App\Services\Highload\request\senders;

use App\Models\Highload;
use App\Services\Highload\dto\ResponseDTO;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class HttpSender implements ISender
{
    /**
     * @throws Exception
     */
    public static function send(Highload $highload): ResponseDTO
    {
        $response = Http::withBody($highload->request, 'application/json')
            ->get($highload->url);

        $data = $response->body();
        $status = $response->status();

        if ($response->clientError()) {
            Log::error(
                'status: ' . $status . '; url: ' . $highload->url . '; error code: ' . $response->clientError()
            );

            throw new Exception('Some error with HTTP client');
        }

        Log::info("status: $status : " . Str::limit($response));

        return new ResponseDTO(
            status: $status,
            response: $data,
        );
    }
}
