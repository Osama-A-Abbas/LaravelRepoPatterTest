<?php

namespace App\DataTransferObjects;

use App\Enums\BlogPostSource;
use App\Http\Requests\BlogPostRequest;
use Carbon\Carbon;

class BlogPostDto  // DTO = Data Transfer Object
{
    public function __construct(
        public readonly string $title,
        public readonly string $body,
        public readonly BlogPostSource $source,
        public readonly ?Carbon $publishedAt,
    )
    {}

    public static function fromRequest(BlogPostRequest $request)
    {
        return new self(
            title: $request->validated('title'),
            body: $request->validated('body'),
            source: BlogPostSource::from($request->validated('body')),
            publishedAt: Carbon::parse($request->validated('body')),
        );
    }
}




//DTO class EXPLANATION
// The readonly keyword in PHP is used to define properties in a class that can only be assigned a value once, typically during object construction. This feature was introduced in PHP 8.1 as part of its support for immutable objects and data structures. When a property is marked as readonly, it ensures that the property cannot be modified after it has been initialized, providing a safeguard against accidental changes to critical data.
// For example, if you declare a property as readonly, you can assign its value in the constructor or during property initialization, but any attempt to modify it afterward will result in a runtime error. This is particularly useful when working with Data Transfer Objects (DTOs), like your BlogPostDto.php file, where immutability is often desired to ensure data consistency.
// Here’s a quick example for context:
// In this example, the title property is marked as readonly, so it can only be set once during the object's construction. Any subsequent attempt to modify it will result in an error, ensuring the integrity of the object's state.
// Using readonly can improve code reliability and make your intentions clear to other developers, as it explicitly communicates that certain properties are immutable.



//fromRequest method EXPLANATION
// The fromRequest method in the provided code is a factory method designed to create a new instance of the BlogPostDto class using data extracted from a BlogPostRequest object. This method simplifies the process of transforming validated request data into a structured Data Transfer Object (DTO), which is commonly used to encapsulate and transport data between different layers of an application.

// Key Details:
// Parameter:

// The method accepts a single parameter, $request, which is an instance of BlogPostRequest. This class likely extends Laravel's FormRequest and provides validation logic for incoming HTTP requests.
// Validated Data:

// The $request->validated() method is used to retrieve data that has already been validated according to the rules defined in the BlogPostRequest class. This ensures that only clean, expected data is used to create the DTO.
// Object Instantiation:

// The new self(...) syntax creates a new instance of the BlogPostDto class. Named arguments are used to map the validated data directly to the DTO's properties, improving readability and reducing the risk of errors.
// Property Assignments:

// title and body are directly assigned from the validated request data.
// source is derived by calling the BlogPostSource::from() method, which likely converts or maps the body data into a specific BlogPostSource enum or class.
// publishedAt is parsed into a Carbon instance using Carbon::parse(). This ensures that the publishedAt property is stored as a date-time object, making it easier to work with in the application.
// Example Usage:
// This method would typically be called in a controller or service class to create a BlogPostDto from an incoming HTTP request. For example:

// Benefits:
// Encapsulation: The method encapsulates the logic for creating a BlogPostDto, keeping the instantiation process clean and consistent.
// Validation Assurance: By relying on the validated() method, it ensures that only properly validated data is used.
// Readability: The use of named arguments and helper methods like Carbon::parse() and BlogPostSource::from() makes the code self-explanatory and easier to maintain.
