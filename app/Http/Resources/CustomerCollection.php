<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use JsonException;

class CustomerCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'success' => true,
            'message' => 'Customers List',
            'data' => CustomerResource::collection($this->collection),
            'pagination' => [
                'page_url' => url()->current(),
                'first_page_url' => $this->url(1),
                'last_page_url' => $this->url($this->lastPage()),
                'next_page_url' => $this->nextPageUrl(),
                'prev_page_url' => $this->previousPageUrl(),
                'from' => $this->currentPage(),
                'last_page' => $this->lastPage(),
                'per_page' => $this->perPage(),
                'to' => $this->count(),
                'total' => $this->total(),
                'page_count' => ceil($this->total()/$this->perPage())
            ]
        ];
    }

    /**
     * @param $request
     * @param $response
     * @return void
     * @throws JsonException
     */
    public function withResponse($request, $response)
    {
        $jsonResponse = json_decode($response->getContent(), true, 512, JSON_THROW_ON_ERROR);
        unset($jsonResponse['links'],$jsonResponse['meta']);
        $response->setContent(json_encode($jsonResponse, JSON_THROW_ON_ERROR));
    }
}
