<?php

require_once("ServiceChannel.class.php");

class SwApiClient {
    private $_serviceChannel;

    const SWAPI_SERVICE_URI = 'https://api.kramesstaywell.com';

    public function __construct($applicationId, $applicationSecret, $serviceUri = SWAPI_SERVICE_URI) {

        $this->_serviceChannel = new ServiceChannel($applicationId, $applicationSecret, $serviceUri);

    }

    public function getContent($bucketSlug, $contentSlug, $options = array('includeBody' => 'true')) {

        $url = 'Content/' . $bucketSlug . '/' . $contentSlug;

        return $this->_serviceChannel->get($url, $options);
    }

    public function searchContent($offset, $count, $filters = array()) {

        $filters['$skip'] = $offset;
        $filters['$top'] = $count;

        return $this->_serviceChannel->get('Content', $filters);
    }
}

?>