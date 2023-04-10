<?php

namespace AlxDorosenco\VatlayerForLaravel\Http;

use AlxDorosenco\VatlayerForLaravel\Http\Exceptions\BothCountryCodeAndIpSuppliedException;
use AlxDorosenco\VatlayerForLaravel\Http\Exceptions\CouldNotResolveIpException;
use AlxDorosenco\VatlayerForLaravel\Http\Exceptions\HttpsAccessRestrictedException;
use AlxDorosenco\VatlayerForLaravel\Http\Exceptions\InactiveUserException;
use AlxDorosenco\VatlayerForLaravel\Http\Exceptions\InvalidAccessKeyException;
use AlxDorosenco\VatlayerForLaravel\Http\Exceptions\InvalidAmountException;
use AlxDorosenco\VatlayerForLaravel\Http\Exceptions\InvalidApiFunctionException;
use AlxDorosenco\VatlayerForLaravel\Http\Exceptions\InvalidCountryCodeException;
use AlxDorosenco\VatlayerForLaravel\Http\Exceptions\InvalidIpAddressException;
use AlxDorosenco\VatlayerForLaravel\Http\Exceptions\InvalidTypeException;
use AlxDorosenco\VatlayerForLaravel\Http\Exceptions\MissingAccessKeyException;
use AlxDorosenco\VatlayerForLaravel\Http\Exceptions\NoCountryCodeOrIpSuppliedException;
use AlxDorosenco\VatlayerForLaravel\Http\Exceptions\NotFoundException;
use AlxDorosenco\VatlayerForLaravel\Http\Exceptions\NoVatNumberSuppliedException;
use AlxDorosenco\VatlayerForLaravel\Http\Exceptions\UsageLimitReachedException;

class Error
{
    /**
     * @var string
     */
    private $message;

    /**
     * @var int
     */
    private $code;

    /**
     * @param string $message
     * @param int $code
     */
    public function __construct(string $message, int $code)
    {
        $this->message = $message;
        $this->code = $code;
    }

    /**
     * @param string $type
     * @return mixed
     */
    public function throwExceptionByType(string $type)
    {
        switch ($type)
        {
            case '404_not_found':
                throw new NotFoundException($this->message, $this->code);

            case 'missing_access_key':
                throw new MissingAccessKeyException($this->message, $this->code);

            case 'invalid_access_key':
                throw new InvalidAccessKeyException($this->message, $this->code);

            case 'invalid_api_function':
                throw new InvalidApiFunctionException($this->message, $this->code);

            case 'usage_limit_reached':
                throw new UsageLimitReachedException($this->message, $this->code);

            case 'no_vat_number_supplied':
                throw new NoVatNumberSuppliedException($this->message, $this->code);

            case 'https_access_restricted':
                throw new HttpsAccessRestrictedException($this->message, $this->code);

            case 'inactive_user':
                throw new InactiveUserException($this->message, $this->code);

            case 'no_country_code_or_ip_supplied':
                throw new NoCountryCodeOrIpSuppliedException($this->message, $this->code);

            case 'both_country_code_and_ip_supplied':
                throw new BothCountryCodeAndIpSuppliedException($this->message, $this->code);

            case 'invalid_ip_address':
                throw new InvalidIpAddressException($this->message, $this->code);

            case 'could_not_resolve_ip':
                throw new CouldNotResolveIpException($this->message, $this->code);

            case 'invalid_country_code':
                throw new InvalidCountryCodeException($this->message, $this->code);

            case 'invalid_amount':
                throw new InvalidAmountException($this->message, $this->code);

            case 'invalid_type':
                throw new InvalidTypeException($this->message, $this->code);

            default:
                throw new \RuntimeException('Unknown error');
        }
    }
}
