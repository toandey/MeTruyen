<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/talent/v4/job_service.proto

namespace Google\Cloud\Talent\V4\SearchJobsResponse;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Job entry with metadata inside
 * [SearchJobsResponse][google.cloud.talent.v4.SearchJobsResponse].
 *
 * Generated from protobuf message <code>google.cloud.talent.v4.SearchJobsResponse.MatchingJob</code>
 */
class MatchingJob extends \Google\Protobuf\Internal\Message
{
    /**
     * Job resource that matches the specified
     * [SearchJobsRequest][google.cloud.talent.v4.SearchJobsRequest].
     *
     * Generated from protobuf field <code>.google.cloud.talent.v4.Job job = 1;</code>
     */
    private $job = null;
    /**
     * A summary of the job with core information that's displayed on the search
     * results listing page.
     *
     * Generated from protobuf field <code>string job_summary = 2;</code>
     */
    private $job_summary = '';
    /**
     * Contains snippets of text from the
     * [Job.title][google.cloud.talent.v4.Job.title] field most closely matching
     * a search query's keywords, if available. The matching query keywords are
     * enclosed in HTML bold tags.
     *
     * Generated from protobuf field <code>string job_title_snippet = 3;</code>
     */
    private $job_title_snippet = '';
    /**
     * Contains snippets of text from the
     * [Job.description][google.cloud.talent.v4.Job.description] and similar
     * fields that most closely match a search query's keywords, if available.
     * All HTML tags in the original fields are stripped when returned in this
     * field, and matching query keywords are enclosed in HTML bold tags.
     *
     * Generated from protobuf field <code>string search_text_snippet = 4;</code>
     */
    private $search_text_snippet = '';
    /**
     * Commute information which is generated based on specified
     *  [CommuteFilter][google.cloud.talent.v4.CommuteFilter].
     *
     * Generated from protobuf field <code>.google.cloud.talent.v4.SearchJobsResponse.CommuteInfo commute_info = 5;</code>
     */
    private $commute_info = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Cloud\Talent\V4\Job $job
     *           Job resource that matches the specified
     *           [SearchJobsRequest][google.cloud.talent.v4.SearchJobsRequest].
     *     @type string $job_summary
     *           A summary of the job with core information that's displayed on the search
     *           results listing page.
     *     @type string $job_title_snippet
     *           Contains snippets of text from the
     *           [Job.title][google.cloud.talent.v4.Job.title] field most closely matching
     *           a search query's keywords, if available. The matching query keywords are
     *           enclosed in HTML bold tags.
     *     @type string $search_text_snippet
     *           Contains snippets of text from the
     *           [Job.description][google.cloud.talent.v4.Job.description] and similar
     *           fields that most closely match a search query's keywords, if available.
     *           All HTML tags in the original fields are stripped when returned in this
     *           field, and matching query keywords are enclosed in HTML bold tags.
     *     @type \Google\Cloud\Talent\V4\SearchJobsResponse\CommuteInfo $commute_info
     *           Commute information which is generated based on specified
     *            [CommuteFilter][google.cloud.talent.v4.CommuteFilter].
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Talent\V4\JobService::initOnce();
        parent::__construct($data);
    }

    /**
     * Job resource that matches the specified
     * [SearchJobsRequest][google.cloud.talent.v4.SearchJobsRequest].
     *
     * Generated from protobuf field <code>.google.cloud.talent.v4.Job job = 1;</code>
     * @return \Google\Cloud\Talent\V4\Job|null
     */
    public function getJob()
    {
        return $this->job;
    }

    public function hasJob()
    {
        return isset($this->job);
    }

    public function clearJob()
    {
        unset($this->job);
    }

    /**
     * Job resource that matches the specified
     * [SearchJobsRequest][google.cloud.talent.v4.SearchJobsRequest].
     *
     * Generated from protobuf field <code>.google.cloud.talent.v4.Job job = 1;</code>
     * @param \Google\Cloud\Talent\V4\Job $var
     * @return $this
     */
    public function setJob($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Talent\V4\Job::class);
        $this->job = $var;

        return $this;
    }

    /**
     * A summary of the job with core information that's displayed on the search
     * results listing page.
     *
     * Generated from protobuf field <code>string job_summary = 2;</code>
     * @return string
     */
    public function getJobSummary()
    {
        return $this->job_summary;
    }

    /**
     * A summary of the job with core information that's displayed on the search
     * results listing page.
     *
     * Generated from protobuf field <code>string job_summary = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setJobSummary($var)
    {
        GPBUtil::checkString($var, True);
        $this->job_summary = $var;

        return $this;
    }

    /**
     * Contains snippets of text from the
     * [Job.title][google.cloud.talent.v4.Job.title] field most closely matching
     * a search query's keywords, if available. The matching query keywords are
     * enclosed in HTML bold tags.
     *
     * Generated from protobuf field <code>string job_title_snippet = 3;</code>
     * @return string
     */
    public function getJobTitleSnippet()
    {
        return $this->job_title_snippet;
    }

    /**
     * Contains snippets of text from the
     * [Job.title][google.cloud.talent.v4.Job.title] field most closely matching
     * a search query's keywords, if available. The matching query keywords are
     * enclosed in HTML bold tags.
     *
     * Generated from protobuf field <code>string job_title_snippet = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setJobTitleSnippet($var)
    {
        GPBUtil::checkString($var, True);
        $this->job_title_snippet = $var;

        return $this;
    }

    /**
     * Contains snippets of text from the
     * [Job.description][google.cloud.talent.v4.Job.description] and similar
     * fields that most closely match a search query's keywords, if available.
     * All HTML tags in the original fields are stripped when returned in this
     * field, and matching query keywords are enclosed in HTML bold tags.
     *
     * Generated from protobuf field <code>string search_text_snippet = 4;</code>
     * @return string
     */
    public function getSearchTextSnippet()
    {
        return $this->search_text_snippet;
    }

    /**
     * Contains snippets of text from the
     * [Job.description][google.cloud.talent.v4.Job.description] and similar
     * fields that most closely match a search query's keywords, if available.
     * All HTML tags in the original fields are stripped when returned in this
     * field, and matching query keywords are enclosed in HTML bold tags.
     *
     * Generated from protobuf field <code>string search_text_snippet = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setSearchTextSnippet($var)
    {
        GPBUtil::checkString($var, True);
        $this->search_text_snippet = $var;

        return $this;
    }

    /**
     * Commute information which is generated based on specified
     *  [CommuteFilter][google.cloud.talent.v4.CommuteFilter].
     *
     * Generated from protobuf field <code>.google.cloud.talent.v4.SearchJobsResponse.CommuteInfo commute_info = 5;</code>
     * @return \Google\Cloud\Talent\V4\SearchJobsResponse\CommuteInfo|null
     */
    public function getCommuteInfo()
    {
        return $this->commute_info;
    }

    public function hasCommuteInfo()
    {
        return isset($this->commute_info);
    }

    public function clearCommuteInfo()
    {
        unset($this->commute_info);
    }

    /**
     * Commute information which is generated based on specified
     *  [CommuteFilter][google.cloud.talent.v4.CommuteFilter].
     *
     * Generated from protobuf field <code>.google.cloud.talent.v4.SearchJobsResponse.CommuteInfo commute_info = 5;</code>
     * @param \Google\Cloud\Talent\V4\SearchJobsResponse\CommuteInfo $var
     * @return $this
     */
    public function setCommuteInfo($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Talent\V4\SearchJobsResponse\CommuteInfo::class);
        $this->commute_info = $var;

        return $this;
    }

}


