<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use function sprintf;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->resource['user_id'],
            'name' => $this->resource['user_name'],
            '_link' => [
                'self' => [
                    'href' => sprintf(
                        '%s/users/%s',
                        env('APP_URL'),
                        $this->resource['user_id']
                    )
                ]
            ]
        ];
    }
}
