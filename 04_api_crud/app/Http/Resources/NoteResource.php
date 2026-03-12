<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NoteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> 'ID #'.$this->id,
            'title'=> 'Title: '.$this->title,
            'content'=> 'Content: '.$this->content,
            'first_separator'=> '------------------',
            'second_separator'=> '( ·  ·  )',
        ];
    }
}
