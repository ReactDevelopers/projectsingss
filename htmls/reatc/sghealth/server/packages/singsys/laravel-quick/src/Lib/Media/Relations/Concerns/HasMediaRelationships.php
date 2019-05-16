<?php

namespace Singsys\LQ\Lib\Media\Relations\Concerns;

use Singsys\LQ\Lib\Media\Relations\HasOneMedia;
use Singsys\LQ\Lib\Media\Relations\BelongToMedia;
use Singsys\LQ\Lib\Media\Relations\BelongToMediaJson;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

trait HasMediaRelationships {
     /**
     * Define a one-to-one relationship.
     *
     * @param  string  $related
     * @param  string  $foreignKey
     * @param  string  $localKey
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function hasOneMedia($related, $foreignKey = null, $localKey = null)
    {
        
        $instance = $this->newRelatedInstance($related);

        $foreignKey = $foreignKey ?: $this->getForeignKey();

        $localKey = $localKey ?: $this->getKeyName();

        return $this->newHasOneMedia($instance->newQuery(), $this, $instance->getTable().'.'.$foreignKey, $localKey);
    }
    /**
     * Define an inverse one-to-one or many JSON relationship.
     *
     * @param  string  $related
     * @param  string  $foreignKey
     * @param  string  $ownerKey
     * @param  string  $relation
     * @return \Staudenmeir\EloquentJsonRelations\Relations\BelongsToJson
     */
    public function belongsToMediaJson($related, $foreignKey, $ownerKey = null, $relation = null)
    {
        if (is_null($relation)) {
            $relation = $this->guessBelongsToRelation();
        }

        $instance = $this->newRelatedInstance($related);

        $ownerKey = $ownerKey ?: $instance->getKeyName();

        return $this->newBelongsToMediaJson(
            $instance->newQuery(), $this, $foreignKey, $ownerKey, $relation
        );
    }
     /**
     * Define an inverse one-to-one or many JSON relationship.
     *
     * @param  string  $related
     * @param  string  $foreignKey
     * @param  string  $ownerKey
     * @param  string  $relation
     * @return \Staudenmeir\EloquentJsonRelations\Relations\BelongsToJson
     */
    public function belongsToMedia($related, $foreignKey, $ownerKey = null, $relation = null)
    {
        if (is_null($relation)) {
            $relation = $this->guessBelongsToRelation();
        }

        $instance = $this->newRelatedInstance($related);

        $ownerKey = $ownerKey ?: $instance->getKeyName();

        return $this->newBelongsToMedia(
            $instance->newQuery(), $this, $foreignKey, $ownerKey, $relation
        );
    }

    /**
     * Instantiate a new HasOne relationship.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  \Illuminate\Database\Eloquent\Model  $parent
     * @param  string  $foreignKey
     * @param  string  $localKey
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    protected function newHasOneMedia(Builder $query, Model $parent, $foreignKey, $localKey)
    {
        return new HasOneMedia($query, $parent, $foreignKey, $localKey);
    }

     /**
     * Instantiate a new BelongsToJson relationship.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  \Illuminate\Database\Eloquent\Model  $child
     * @param  string  $foreignKey
     * @param  string  $ownerKey
     * @param  string  $relation
     * @return \Staudenmeir\EloquentJsonRelations\Relations\BelongsToJson
     */
    protected function newBelongsToMediaJson(Builder $query, Model $child, $foreignKey, $ownerKey, $relation)
    {
        return new BelongToMediaJson($query, $child, $foreignKey, $ownerKey, $relation);
    }
    /**
     * Instantiate a new BelongsToJson relationship.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  \Illuminate\Database\Eloquent\Model  $child
     * @param  string  $foreignKey
     * @param  string  $ownerKey
     * @param  string  $relation
     * @return \Staudenmeir\EloquentJsonRelations\Relations\BelongsToJson
     */
    protected function newBelongsToMedia(Builder $query, Model $child, $foreignKey, $ownerKey, $relation)
    {
        return new BelongToMedia($query, $child, $foreignKey, $ownerKey, $relation);
    }
}
