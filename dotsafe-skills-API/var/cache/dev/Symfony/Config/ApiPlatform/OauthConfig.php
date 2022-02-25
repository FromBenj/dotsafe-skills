<?php

namespace Symfony\Config\ApiPlatform;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 */
class OauthConfig 
{
    private $enabled;
    private $clientId;
    private $clientSecret;
    private $type;
    private $flow;
    private $tokenUrl;
    private $authorizationUrl;
    private $refreshUrl;
    private $scopes;
    
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
     * The oauth client id.
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function clientId($value): static
    {
        $this->clientId = $value;
    
        return $this;
    }
    
    /**
     * The oauth client secret.
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function clientSecret($value): static
    {
        $this->clientSecret = $value;
    
        return $this;
    }
    
    /**
     * The oauth type.
     * @default 'oauth2'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function type($value): static
    {
        $this->type = $value;
    
        return $this;
    }
    
    /**
     * The oauth flow grant type.
     * @default 'application'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function flow($value): static
    {
        $this->flow = $value;
    
        return $this;
    }
    
    /**
     * The oauth token url.
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function tokenUrl($value): static
    {
        $this->tokenUrl = $value;
    
        return $this;
    }
    
    /**
     * The oauth authentication url.
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function authorizationUrl($value): static
    {
        $this->authorizationUrl = $value;
    
        return $this;
    }
    
    /**
     * The oauth refresh url.
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function refreshUrl($value): static
    {
        $this->refreshUrl = $value;
    
        return $this;
    }
    
    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function scopes(ParamConfigurator|array $value): static
    {
        $this->scopes = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['enabled'])) {
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }
    
        if (isset($value['clientId'])) {
            $this->clientId = $value['clientId'];
            unset($value['clientId']);
        }
    
        if (isset($value['clientSecret'])) {
            $this->clientSecret = $value['clientSecret'];
            unset($value['clientSecret']);
        }
    
        if (isset($value['type'])) {
            $this->type = $value['type'];
            unset($value['type']);
        }
    
        if (isset($value['flow'])) {
            $this->flow = $value['flow'];
            unset($value['flow']);
        }
    
        if (isset($value['tokenUrl'])) {
            $this->tokenUrl = $value['tokenUrl'];
            unset($value['tokenUrl']);
        }
    
        if (isset($value['authorizationUrl'])) {
            $this->authorizationUrl = $value['authorizationUrl'];
            unset($value['authorizationUrl']);
        }
    
        if (isset($value['refreshUrl'])) {
            $this->refreshUrl = $value['refreshUrl'];
            unset($value['refreshUrl']);
        }
    
        if (isset($value['scopes'])) {
            $this->scopes = $value['scopes'];
            unset($value['scopes']);
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
        if (null !== $this->clientId) {
            $output['clientId'] = $this->clientId;
        }
        if (null !== $this->clientSecret) {
            $output['clientSecret'] = $this->clientSecret;
        }
        if (null !== $this->type) {
            $output['type'] = $this->type;
        }
        if (null !== $this->flow) {
            $output['flow'] = $this->flow;
        }
        if (null !== $this->tokenUrl) {
            $output['tokenUrl'] = $this->tokenUrl;
        }
        if (null !== $this->authorizationUrl) {
            $output['authorizationUrl'] = $this->authorizationUrl;
        }
        if (null !== $this->refreshUrl) {
            $output['refreshUrl'] = $this->refreshUrl;
        }
        if (null !== $this->scopes) {
            $output['scopes'] = $this->scopes;
        }
    
        return $output;
    }

}
