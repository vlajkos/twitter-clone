<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RepostRequest extends FormRequest
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
        $userId = auth()->user()->id;
        return [
                    'body' => ['required', 'min:2', 'max:255'],
                    'tweet_id' => ['required', Rule::unique('tweets')->where(function ($query) use ($userId) {
                        $query->where('user_id', $userId);
                    })]
             ];
    }
}
