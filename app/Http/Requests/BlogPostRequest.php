<?php

namespace App\Http\Requests;

use App\Enums\BlogPostSource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
class BlogPostRequest extends FormRequest
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
        return [
            'title' => ['required'],
            'body' => ['required'],
            'source'=> ['required', new Enum(BlogPostSource::class)],
            'published_at' => ['required', 'date'],
        ];
    }
}
