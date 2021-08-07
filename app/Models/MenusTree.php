<?php

namespace App\Models;

use App\Models\Base as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Kalnoy\Nestedset\NodeTrait;

/**
 * @SWG\Definition(
 *      definition="Menus",
 *      required={"name", "status"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="status",
 *          description="status",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="icon",
 *          description="icon",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="route",
 *          description="route",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="parent_id",
 *          description="parent_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="seq_number",
 *          description="seq_number",
 *          type="boolean"
 *      )
 * )
 */
class MenusTree extends Model
{
    use HasFactory;
    use NodeTrait;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const CREATED_BY = null;
    const UPDATED_BY = null;

    public $table = 'menus';
    public $fillable = [
        'name',
        'description',
        'status',
        'icon',
        'route',
        'parent_id',
        'seq_number',
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(\App\Models\Permission::class, 'menu_permissions', 'menu_id');
    }

    public function menuPermission()
    {
        return $this->hasMany(\App\Models\MenuPermissions::class);
    }

    public function parent()
    {
        return $this->belongsTo(\App\Models\Menus::class, 'parent_id');
    }

    public function setParentIdAttribute($value)
    {
        if ($this->getParentId() == $value) return;

        if ($value) {
            $this->appendToNode($this->toNode(\App\Models\Menus::findOrFail($value)));
        } else {
            $this->makeRoot();
        }
    }

    private function toNode(Menus $menu){
        $node = new \App\Models\MenusTree();
        $node->id = $menu->getKey();
        foreach(array_merge($menu->getFillable(),['id','_lft','_rgt']) as $f){
            $node->{$f} = $menu->{$f};
        }
        $node->syncOriginal();
        return $node;
    }
}
