<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SSCBoardQuestion extends JsonResource
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
            'question' => $this->question,
            'optionOne' => $this->optionOne,
            'optionTwo' => $this->optionTwo,
            'optionThree' => $this->optionThree,
            'optionFour' => $this->optionFour,
            'answer' => $this->answer,
            'subjectCode' => $this->subjectCode,
            'boardCode' => $this->boardCode,
            'year' => $this->year,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
