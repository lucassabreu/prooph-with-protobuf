<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: commands.proto

namespace Hooks\Commands;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Protobuf type <code>hooks.commands.SendEmail</code>
 */
class SendEmail extends \Google\Protobuf\Internal\Message
{
    /**
     * <code>string email = 1;</code>
     */
    private $email = '';

    public function __construct() {
        \GPBMetadata\Commands::initOnce();
        parent::__construct();
    }

    /**
     * <code>string email = 1;</code>
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * <code>string email = 1;</code>
     */
    public function setEmail($var)
    {
        GPBUtil::checkString($var, True);
        $this->email = $var;
    }

}

