<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/run/v2/job.proto

namespace GPBMetadata\Google\Cloud\Run\V2;

class Job
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\LaunchStage::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Api\Routing::initOnce();
        \GPBMetadata\Google\Cloud\Run\V2\Condition::initOnce();
        \GPBMetadata\Google\Cloud\Run\V2\Execution::initOnce();
        \GPBMetadata\Google\Cloud\Run\V2\ExecutionTemplate::initOnce();
        \GPBMetadata\Google\Cloud\Run\V2\K8SMin::initOnce();
        \GPBMetadata\Google\Cloud\Run\V2\VendorSettings::initOnce();
        \GPBMetadata\Google\Iam\V1\IamPolicy::initOnce();
        \GPBMetadata\Google\Iam\V1\Policy::initOnce();
        \GPBMetadata\Google\Longrunning\Operations::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Protobuf\Timestamp::initOnce();
        $pool->internalAddGeneratedFile(
            '
�&
google/cloud/run/v2/job.protogoogle.cloud.run.v2google/api/client.protogoogle/api/field_behavior.protogoogle/api/launch_stage.protogoogle/api/resource.protogoogle/api/routing.proto#google/cloud/run/v2/condition.proto#google/cloud/run/v2/execution.proto,google/cloud/run/v2/execution_template.proto!google/cloud/run/v2/k8s.min.proto)google/cloud/run/v2/vendor_settings.protogoogle/iam/v1/iam_policy.protogoogle/iam/v1/policy.proto#google/longrunning/operations.protogoogle/protobuf/duration.protogoogle/protobuf/timestamp.proto"�
CreateJobRequest.
parent (	B�A�Arun.googleapis.com/Job*
job (2.google.cloud.run.v2.JobB�A
job_id (	B�A


name (	B�A�A
run.googleapis.com/Job"l
UpdateJobRequest*
job (2.google.cloud.run.v2.JobB�A


ListJobsRequest.
parent (	B�A�Arun.googleapis.com/Job
	page_size (

page_token (	
show_deleted ("S
ListJobsResponse&
jobs (2.google.cloud.run.v2.Job
next_page_token (	"e
DeleteJobRequest,
name (	B�A�A
run.googleapis.com/Job

etag (	"�

name (	B�A�A
run.googleapis.com/Job

etag (	?
	overrides (2,.google.cloud.run.v2.RunJobRequest.Overrides�
	Overrides[
container_overrides (2>.google.cloud.run.v2.RunJobRequest.Overrides.ContainerOverride

task_count (B�A*
timeout (2.google.protobuf.Durationw
ContainerOverride
name (	
args (	B�A(
env (2.google.cloud.run.v2.EnvVar

clear_args (B�A"�	
Job
name (	
uid (	B�A

generation (B�A4
labels (2$.google.cloud.run.v2.Job.LabelsEntry>
annotations (2).google.cloud.run.v2.Job.AnnotationsEntry4
create_time (2.google.protobuf.TimestampB�A4
update_time (2.google.protobuf.TimestampB�A4
delete_time (2.google.protobuf.TimestampB�A4
expire_time	 (2.google.protobuf.TimestampB�A
creator
 (	B�A

client (	
client_version
launch_stage (2.google.api.LaunchStageF
binary_authorization (2(.google.cloud.run.v2.BinaryAuthorization=
template (2&.google.cloud.run.v2.ExecutionTemplateB�A 
observed_generation (B�A?
terminal_condition (2.google.cloud.run.v2.ConditionB�A7

conditions (2.google.cloud.run.v2.ConditionB�A
execution_count (B�AN
latest_created_execution (2\'.google.cloud.run.v2.ExecutionReferenceB�A
reconciling (B�A

etagc (	B�A-
LabelsEntry
key (	
value (	:82
AnnotationsEntry
key (	
value (	:8:R�AO
run.googleapis.com/Job2projects/{project}/locations/{location}/jobs/{job}R"�
ExecutionReference/
name (	B!�A
run.googleapis.com/Execution/
create_time (2.google.protobuf.Timestamp3
completion_time (2.google.protobuf.Timestamp2�
Jobs�
	CreateJob%.google.cloud.run.v2.CreateJobRequest.google.longrunning.Operation"����/"(/v2/{parent=projects/*/locations/*}/jobs:job���-+
parent!projects/*/locations/{location=*}�Aparent,job,job_id�A

JobJob�
GetJob".google.cloud.run.v2.GetJobRequest.google.cloud.run.v2.Job"k���*(/v2/{name=projects/*/locations/*/jobs/*}���.,
name$projects/*/locations/{location=*}/**�Aname�
ListJobs$.google.cloud.run.v2.ListJobsRequest%.google.cloud.run.v2.ListJobsResponse"l���*(/v2/{parent=projects/*/locations/*}/jobs���-+
parent!projects/*/locations/{location=*}�Aparent�
	UpdateJob%.google.cloud.run.v2.UpdateJobRequest.google.longrunning.Operation"����32,/v2/{job.name=projects/*/locations/*/jobs/*}:job���20
job.name$projects/*/locations/{location=*}/**�Ajob�A

JobJob�
	DeleteJob%.google.cloud.run.v2.DeleteJobRequest.google.longrunning.Operation"x���**(/v2/{name=projects/*/locations/*/jobs/*}���.,
name$projects/*/locations/{location=*}/**�Aname�A

JobJob�
RunJob".google.cloud.run.v2.RunJobRequest.google.longrunning.Operation"����1",/v2/{name=projects/*/locations/*/jobs/*}:run:*���.,
name$projects/*/locations/{location=*}/**�Aname�A
	Execution	Execution�
GetIamPolicy".google.iam.v1.GetIamPolicyRequest.google.iam.v1.Policy"A���;9/v2/{resource=projects/*/locations/*/jobs/*}:getIamPolicy�
SetIamPolicy".google.iam.v1.SetIamPolicyRequest.google.iam.v1.Policy"D���>"9/v2/{resource=projects/*/locations/*/jobs/*}:setIamPolicy:*�
TestIamPermissions(.google.iam.v1.TestIamPermissionsRequest).google.iam.v1.TestIamPermissionsResponse"J���D"?/v2/{resource=projects/*/locations/*/jobs/*}:testIamPermissions:*F�Arun.googleapis.com�A.https://www.googleapis.com/auth/cloud-platformBP
com.google.cloud.run.v2BJobProtoPZ)cloud.google.com/go/run/apiv2/runpb;runpbbproto3'
        , true);

        static::$is_initialized = true;
    }
}
