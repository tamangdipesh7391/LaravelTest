<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentResource extends JsonResource
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
            'id' =>(string) $this->id,
            'type' => 'departments',
            'attributes' => [
                'name' => $this->name,
                'created_at' => (string) $this->created_at,
                'updated_at' => (string) $this->updated_at,
            ],
            
        ];
    }
}
