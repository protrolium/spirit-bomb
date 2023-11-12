<?php namespace ProcessWire;
class RadioPage extends Page {

    public function init() {
        // test to see if init method is working in the Tracy Debugger Dump
        // bd("init method");

        // Call getMixcloudMetadata() when Page is saved to get the Mixcloud API data
        $this->wire->addHookAfter("Pages::saveReady", $this, "getMixcloudMetadata");
    }

    public function getMixcloudMetadata(HookEvent $event) {
        // for more information check Tracy Debugger by logging bd($event) 
        // … argument 0 is the ProcessWire\Page
        $page = $event->arguments(0);

        $http = new WireHttp();
        $result = $http->get('https://api.mixcloud.com' . $page->mix_cloudcastkey);
        $result = json_decode($result);
        
        // read full API response
        // bd($result);
        
        // set $page fields on Save
        $page->title = $result->name;
        $page->link = $result->url;
        $page->mix_description = $result->description;
        $page->mix_thumbnail_320x320 = $result->pictures->{'320wx320h'};
        $page->mix_thumbnail_640x640 = $result->pictures->{'640wx640h'};

        // time
        $page->mix_created_time = $result->created_time;

        // Extract the 'name' property from each object and create a new array
        $tags = array_map(function($obj) {
            return $obj->name;
        }, $result->tags);

        // Combine the names into a single string, separated by commas
        $tagsString = implode(', ', $tags);
        $page->mix_tags = $tagsString;

        bd($result);

    }
}