<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use GuzzleHttp\Client;

class ReCaptcha implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }

    public function validate($attribute, $value, $parameters, $validator)
    {
        $client = new Client();

        $response = $client->post(
            "https://www.google.com/recaptcha/api/siteverify",
            ['form_params'=>
                [
                    'secret'=>'6LfyD4YUAAAAAIVZHgrnifN0j9dXf9GHTwqDvj9g',
                    'response'=>$value
                ]
            ]
        );

        $body = json_decode((string)$response->getBody());
        return $body->success;
    }

}
