<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatternResource extends JsonResource
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
            'fabric'=> new FabricResource($this->whenLoaded('fabric')),
//            'guides'=> new GuidesResource($this->whenLoaded('guides')),
//            'constants'=> new GuidesResource($this->whenLoaded('guides')),
            'guides'=> $this->guides,
            'cconstants'=> $this->constants,
        ];
    }
}
