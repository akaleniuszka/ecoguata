<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StatusResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'fields' => [
                'origen' => $this->origen,
                'destino' => $this->destino,
                'tipo' => $this->tipo,
                'cantidad' => $this->cantidad,
                'comentario' => $this->comentario,
            ],
            'user' => UserResource::make($this->user),
            'ago' => $this->created_at->diffForHumans(),
            'is_liked' => $this->isLiked(),
            'likes_count' => $this->LikesCount(),
            'comments' => CommentResource::collection($this->comments)
        ];
    }
}
