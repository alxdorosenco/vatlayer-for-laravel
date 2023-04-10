<?php

namespace AlxDorosenco\VatlayerForLaravel\Tests\Unit\Http;

use AlxDorosenco\VatlayerForLaravel\Http\Error;
use PHPUnit\Framework\TestCase;

class ErrorTest extends TestCase
{
    /**
     * @return array[]
     */
    public function providerTypes()
    {
        return [
            '404_not_found' => ['404_not_found', 404, 'User requested a resource which does not exist.'],
            'missing_access_key' => ['missing_access_key', 101, 'User did not supply an Access Key.'],
            'invalid_access_key' => ['invalid_access_key', 101, 'User entered an invalid Access Key.'],
            'invalid_api_function' => ['invalid_api_function', 103, 'User requested a non-existent API Function.'],
            'usage_limit_reached' => ['usage_limit_reached', 104, 'User has reached or exceeded his Subscription Plan\'s monthly API Request Allowance.'],
            'no_vat_number_supplied' => ['no_vat_number_supplied', 210, 'User did not provide a VAT Number.'],
            'https_access_restricted' => ['https_access_restricted', 105, 'The user\'s current Subscription Plan does not support HTTPS Encryption.'],
            'inactive_user' => ['inactive_user', 102, 'The user\'s account is not active. User will be prompted to get in touch with Customer Support.'],
            'no_country_code_or_ip_supplied' => ['no_country_code_or_ip_supplied', 310, 'User did not provide a Country Code or IP Address.'],
            'both_country_code_and_ip_supplied' => ['both_country_code_and_ip_supplied', 311, 'User provided both Country Code and IP Address. Only one of the two can be processed.'],
            'invalid_ip_address' => ['invalid_ip_address', 410, 'User provided an invalid IP Address. [Example: 213.162.68.117]'],
            'could_not_resolve_ip' => ['could_not_resolve_ip', 411, 'Our system failed allocating the supplied IP Address.'],
            'invalid_country_code' => ['invalid_country_code', 510, 'User provided an invalid Country Code. (Required format: 2-letter Code - Example: GB)'],
            'invalid_amount' => ['invalid_amount', 610, 'User provided an invalid "amount" value. (Required format: integer - Example: 10)'],
            'invalid_type' => ['invalid_type', 611, 'User provided an invalid "type" value. See Types of Goods. (Example: medical)']
        ];
    }

    /**
     * @param string $type
     * @param int $code
     * @param string $message
     *
     * @dataProvider providerTypes
     * @return void
     */
    public function testThrowExceptionByTypeMethod(string $type, int $code, string $message)
    {
        $this->expectException(\Exception::class);

        $error = new Error($message, $code);
        $error->throwExceptionByType($type);
    }
}
