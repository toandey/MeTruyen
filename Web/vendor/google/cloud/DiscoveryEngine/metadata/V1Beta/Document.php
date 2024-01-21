<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/discoveryengine/v1beta/document.proto

namespace GPBMetadata\Google\Cloud\Discoveryengine\V1Beta;

class Document
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Protobuf\Struct::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
2google/cloud/discoveryengine/v1beta/document.proto#google.cloud.discoveryengine.v1betagoogle/api/resource.protogoogle/protobuf/struct.proto"�
Document.
struct_data (2.google.protobuf.StructH 
	json_data (	H 
name (	B�A
id (	B�A
	schema_id (	F
content
 (25.google.cloud.discoveryengine.v1beta.Document.Content
parent_document_id (	9
derived_struct_data (2.google.protobuf.StructB�AK
Content
	raw_bytes (H 
uri (	H 
	mime_type (	B	
content:��A�
\'discoveryengine.googleapis.com/Documentfprojects/{project}/locations/{location}/dataStores/{data_store}/branches/{branch}/documents/{document}projects/{project}/locations/{location}/collections/{collection}/dataStores/{data_store}/branches/{branch}/documents/{document}B
dataB�
\'com.google.cloud.discoveryengine.v1betaBDocumentProtoPZQcloud.google.com/go/discoveryengine/apiv1beta/discoveryenginepb;discoveryenginepb�DISCOVERYENGINE�#Google.Cloud.DiscoveryEngine.V1Beta�#Google\\Cloud\\DiscoveryEngine\\V1beta�&Google::Cloud::DiscoveryEngine::V1betabproto3'
        , true);

        static::$is_initialized = true;
    }
}

