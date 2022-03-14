<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'index' => $this->index,
            'description'=> $this->description,
            'seo_title' => $this->seo_title,
            'seo_description'=> $this->seo_description,
            'fabric'=> new FabricResource($this->whenLoaded('fabric')),
            'points'=> new PointsResource($this->whenLoaded('points')),
            'pattern'=> new PatternResource($this->whenLoaded('pattern')),
        ];
    }


}
