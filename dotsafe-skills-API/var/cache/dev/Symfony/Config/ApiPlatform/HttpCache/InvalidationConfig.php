<?php

namespace Symfony\Config\ApiPlatform\HttpCache;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 */
class InvalidationConfig 
{
    private $enabled;
    private $varnishUrls;
    private $maxHeaderLength;
    private $requestOptions;
    
    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function enabled($value): static
    {
        $this->enabled = $value;
    
        return $this;
    }
    
    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function varnishUrls(ParamConfigurator|array $value): static
    {
        $this->varnishUrls = $value;
    
        return $this;
    }
    
    /**
     * Max header length supported by the server
     * @default 7500
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function maxHeaderLength($value): static
    {
        $this->maxHeaderLength = $value;
    
        return $this;
    }
    
    /**
     * To pass options to the client charged with the request.
     * @default array (
    )
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function requestOptions(mixed $value = array (
    )): static
    {
        $this->requestOptions = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['enabled'])) {
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }
    
        if (isset($value['varnish_urls'])) {
            $this->varnishUrls = $value['varnish_urls'];
            unset($value['varnish_urls']);
        }
    
        if (isset($value['max_header_length'])) {
            $this->maxHeaderLength = $value['max_header_length'];
            unset($value['max_header_length']);
        }
    
        if (isset($value['request_options'])) {
            $this->requestOptions = $value['request_options'];
            unset($value['request_options']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->enabled) {
            $output['enabled'] = $this->enabled;
        }
        if (null !== $this->varnishUrls) {
            $output['varnish_urls'] = $this->varnishUrls;
        }
        if (null !== $this->maxHeaderLength) {
            $output['max_header_length'] = $this->maxHeaderLength;
        }
        if (null !== $this->requestOptions) {
            $output['request_options'] = $this->requestOptions;
        }
    
        return $output;
    }

}
