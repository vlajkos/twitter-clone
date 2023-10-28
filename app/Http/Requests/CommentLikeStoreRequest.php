<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CommentLikeStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $loggedInUserId = auth()->id();

        return [
            'user_id' => ['required', Rule::in([$loggedInUserId])],
            'comment_id' => ['required', 
             Rule::unique('comment_likes')->where(function ($query) use ( $loggedInUserId) {
             $query->where('user_id', $loggedInUserId);
            })]
        ];
    }
}
