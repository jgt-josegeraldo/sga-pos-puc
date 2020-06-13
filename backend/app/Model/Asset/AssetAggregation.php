<?php

namespace App\Model\Asset;

use App\Model\Asset\ModelEloquent\Asset;
use App\Model\Asset\ModelEloquent\Category;
use App\Model\Asset\ModelEloquent\Trigger;
use App\Model\Asset\ModelEloquent\Webhook;
use App\Model\Asset\ModelEloquent\AssetStatus;
use App\Model\Asset\ModelEloquent\Mantenance;
use \DB;
use GuzzleHttp\Client;

class AssetAggregation
{
    public function __construct()
    {
    }

    public function save($assetData)
    {
        $asset = new Asset($assetData);
        $asset->save();
        $this->sendWebhook($asset);
        return $asset;
    }

    public function saveWebhook($webhookData)
    {
        $webhook = new Webhook($webhookData);
        $webhook->save();
        return $webhook;
    }

    public function saveMaintenance($maintenanceData)
    {
        $maintenance = new Mantenance($maintenanceData);
        $maintenance->save();
        return $maintenance;
    }

    public function sendWebhook($asset)
    {
        $webhook = DB::table('webhook')
            ->select(
                'webhook.id',
                'webhook.link'
            )
            ->where('webhook.trigger_id', '=', '1')
            ->whereNull('webhook.deleted_at')
            ->get()->toArray();
        if ($webhook && is_array($webhook)) {
            $client = new Client();
            $response = $client->request(
                'POST',
                $webhook[0]->link,
                [
                    'json' => $asset,
                ]
            );
        }
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
                'asset.created_at as date_created',
                'category.description as categoryDescription'
            )
            ->join('category', 'asset.category_id', '=', 'category.id')
            ->leftJoin('maintenance', 'asset.id', '=', 'maintenance.asset_id')
            ->whereNull('asset.deleted_at')
            ->groupBy('asset.id')
            ->orderBy('asset.created_at', 'desc')
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

    public function listTriggers()
    {
        return Trigger::all();
    }

    public function listWebhooks()
    {
        return  DB::table('webhook')
            ->select(
                'webhook.id',
                'webhook.link',
                'trigger.description as trigger'
            )
            ->join('trigger', 'webhook.trigger_id', '=', 'trigger.id')
            ->whereNull('webhook.deleted_at')
            ->get()->toArray();
    }
}
