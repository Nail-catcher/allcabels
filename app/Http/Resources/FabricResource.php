<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FabricResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'products'=> new ProductsResource($this->whenLoaded('products')),
            'guides'=> new GuidesResource($this->whenLoaded('guides')),
            'patterns'=> new PatternsResource($this->whenLoaded('patterns')),
        ];
    }
}
