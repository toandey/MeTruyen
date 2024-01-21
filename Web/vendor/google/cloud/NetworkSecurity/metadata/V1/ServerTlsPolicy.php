<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/networksecurity/v1/server_tls_policy.proto

namespace GPBMetadata\Google\Cloud\Networksecurity\V1;

class ServerTlsPolicy
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Cloud\Networksecurity\V1\Tls::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        \GPBMetadata\Google\Protobuf\Timestamp::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
7google/cloud/networksecurity/v1/server_tls_policy.protogoogle.cloud.networksecurity.v1google/api/resource.proto)google/cloud/networksecurity/v1/tls.proto google/protobuf/field_mask.protogoogle/protobuf/timestamp.proto"�
ServerTlsPolicy
name (	B�A
description (	4
create_time (2.google.protobuf.TimestampB�A4
update_time (2.google.protobuf.TimestampB�AL
labels (2<.google.cloud.networksecurity.v1.ServerTlsPolicy.LabelsEntry

allow_open (P
server_certificate (24.google.cloud.networksecurity.v1.CertificateProviderP
mtls_policy (2;.google.cloud.networksecurity.v1.ServerTlsPolicy.MTLSPolicyY

MTLSPolicyK
client_validation_ca (2-.google.cloud.networksecurity.v1.ValidationCA-
LabelsEntry
key (	
value (	:8:��A
.networksecurity.googleapis.com/ServerTlsPolicyMprojects/{project}/locations/{location}/serverTlsPolicies/{server_tls_policy}"�
ListServerTlsPoliciesRequest9
parent (	B)�A�A#
!locations.googleapis.com/Location
	page_size (

page_token (	"�
ListServerTlsPoliciesResponseM
server_tls_policies (20.google.cloud.networksecurity.v1.ServerTlsPolicy
next_page_token (	"a
GetServerTlsPolicyRequestD
name (	B6�A�A0
.networksecurity.googleapis.com/ServerTlsPolicy"�
CreateServerTlsPolicyRequestF
parent (	B6�A�A0.networksecurity.googleapis.com/ServerTlsPolicy!
server_tls_policy_id (	B�AP
server_tls_policy (20.google.cloud.networksecurity.v1.ServerTlsPolicyB�A"�
UpdateServerTlsPolicyRequest4
update_mask (2.google.protobuf.FieldMaskB�AP
server_tls_policy (20.google.cloud.networksecurity.v1.ServerTlsPolicyB�A"d
DeleteServerTlsPolicyRequestD
name (	B6�A�A0
.networksecurity.googleapis.com/ServerTlsPolicyB�
#com.google.cloud.networksecurity.v1BServerTlsPolicyProtoPZMcloud.google.com/go/networksecurity/apiv1/networksecuritypb;networksecuritypb�Google.Cloud.NetworkSecurity.V1�Google\\Cloud\\NetworkSecurity\\V1�"Google::Cloud::NetworkSecurity::V1bproto3'
        , true);

        static::$is_initialized = true;
    }
}

