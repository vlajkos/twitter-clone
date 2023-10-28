<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LikeStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $userId = $this->input('user_id');
        return [
            'user_id' => ['required', 'exists:users,id'],
            'tweet_id' => [
                'required',
                'exists:tweets,id',
                Rule::unique('likes')->where(function ($query) use ($userId) {
                    $query->where('user_id', $userId);
                })
            ],
        ];
    }







}