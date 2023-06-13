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
            'name' => $this->name,
            'code' => $this->code,
            'description' => $this->description,
            'created_at' => date('d-m-Y h:i:s a', strtotime($this->created_at)),
            'updated_at' => date('d-m-Y h:i:s a', strtotime($this->updated_at)),
            'deleted_at' => $this->whenNotNull($this->deleted_at, date('d-m-Y h:i:s a', strtotime($this->deleted_at))),
        ]; //parent::toArray($request);
    }
}
