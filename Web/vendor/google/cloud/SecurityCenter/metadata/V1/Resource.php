<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/securitycenter/v1/resource.proto

namespace GPBMetadata\Google\Cloud\Securitycenter\V1;

class Resource
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Cloud\Securitycenter\V1\Folder::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
-google/cloud/securitycenter/v1/resource.protogoogle.cloud.securitycenter.v1+google/cloud/securitycenter/v1/folder.proto"�
Resource
name (	
display_name (	
type (	
project (	
project_display_name (	
parent (	
parent_display_name (	<
folders (2&.google.cloud.securitycenter.v1.FolderB�AB�
"com.google.cloud.securitycenter.v1B
        , true);

        static::$is_initialized = true;
    }
}
