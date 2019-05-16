<?php

namespace Singsys\LQ\Lib\Media\Relations\Concerns;

use Singsys\LQ\Lib\Media\MediaUploader;

trait MediaFeature {

    /**
     * Store the Media File and update in relation.
     */
    public function addMedia(Array $files, $path = null, $should_update = true) {

        if(!isset($files[0])) {
            $files = [$files];
        }

        $media_data = [];
        $uploaded_data = [];
        foreach($files as $file) {

            $uploader = new MediaUploader($file, $path);
            $media = $uploader->storeInDB();
            $media_data[] = $media->id;
            $uploaded_data[] = $media;
        }

        $isJson = $this->parent->hasCast($this->getForeignKey(), ['array', 'json', 'object', 'collection']);
        $data = $isJson ? $media_data : $media_data[0];
        $uploaded_data = $isJson ? $uploaded_data : $uploaded_data[0];
        
        $this->parent->setRelation($this->relation, $uploaded_data);

        if($should_update){
            return $this->parent->update([$this->getForeignKey() => $data]);
        }
        else {
            return $this->parent->setAttribute($this->getForeignKey() , $data);
        }
    }
}
