<?php

namespace App\Http\Resources;

use App\Models\Fabric;
use Illuminate\Http\Resources\Json\JsonResource;

class GuideResource extends JsonResource
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
            'description'=> $this->description,
            'fabric'=> new FabricResource($this->whenLoaded('fabric')),
            'points'=> new PointsResource($this->whenLoaded('points')),
            'conflicts'=> new ConflictsResource($this->whenLoaded('conflicts')),

        ];
    }
}
