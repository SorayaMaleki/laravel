<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\MissingValue;

class UserResourceCollection extends ResourceCollection
{
        public $collects=UserResource::class;
//        public static $wrap="sfhskjdf";
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);

    }
    public function with($request)
    {
        return[
            'status'=>'success'
        ];
//        return parent::with($request);
    }
}
