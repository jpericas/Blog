<?php

namespace App\Http\Resources;

use Illuminate\Support\Str;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            "identificador" => $this->id, 
            "titol" => Str::upper($this->title),
            'contingut' => $this->when(($this->posted == 'yes'), $this->content),            
            'contingut2' => $this->when(($this->posted == 'yes'), function () {
                return $this->content;
            }),
            $this->mergeWhen(($this->posted == 'yes'), [
                'data_creacio' => $this->created_at->format("d-m-Y"),
                'categoria' => $this->category,           
                "imatge" => $this->image,
            ]), 
            
        ];
    }

    public function with($request){
        return [
            "info" => "Informació del post",    
        ];
    }
}
