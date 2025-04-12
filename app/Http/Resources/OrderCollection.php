<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class OrderCollection extends ResourceCollection
{
    protected $pagination;
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */

     public function __construct($resource){

        $this->pagination = [
            'total' => $resource->total(),
            'count' => $resource->count(),
            'per_page' => $resource->perPage(),
            'current_page' => $resource->currentPage(),
            'total_pages' => $resource->lastPage()
        ];

        $resource = $resource->getCollection();
        parent::__construct($resource);

    }

    public function toArray(Request $request): array
    {
        return [
            "message" => "Success",
            "data" => [
            "orders" => OrderResource::collection($this->collection),
            'pagination' => $this->pagination,
            ]
        ];
    }
}
