<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ConflictResource extends JsonResource
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

            'firstPoint' => new PointResource($this->whenLoaded('firstPoint')),
            'secondPoint' => new PointResource($this->whenLoaded('secondPoint')),

        ];
    }
}
