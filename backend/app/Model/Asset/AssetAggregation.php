<?php

namespace App\Model\Asset;

use App\Model\Asset\ModelEloquent\Asset;
use App\Model\Asset\ModelEloquent\Category;
use App\Model\Asset\ModelEloquent\AssetStatus;
use \DB;

class AssetAggregation
{
    public function __construct()
    {
    }

    public function save($assetData)
    {
        $asset = new Asset($assetData);
        $asset->save();
        return $asset;
    }

    public function get($assetId)
    {
        $asset = Asset::find($assetId);
        return $asset;
    }

    public function list()
    {
        return DB::table('asset')
            ->select(
                'asset.id',
                'asset.code',
                'asset.name',
                DB::raw('max(maintenance.created_at) as date_of_last_maintenance'),
                'category.description as categoryDescription'
            )
            ->join('category', 'asset.category_id', '=', 'category.id')
            ->leftJoin('maintenance', 'asset.id', '=', 'maintenance.asset_id')
            ->whereNull('asset.deleted_at')
            ->groupBy('asset.id')
            ->get()->toArray();
    }

    public function listCategory()
    {
        return Category::all();
    }

    public function listStatus()
    {
        return AssetStatus::all();
    }
}
