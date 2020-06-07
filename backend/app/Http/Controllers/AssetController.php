<?php

namespace App\Http\Controllers;
use Validator;
use App\Model\Asset\AssetAggregation;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->assetAggregation = new AssetAggregation();
    }

    public function save(Request $request)
    {
        $this->validate(
            $request,
            [
                'code' => 'required',
                'category_id' => 'required',
                'name' => 'required'
            ],
            [
                'code.required' => 'Informe o código de aquisição.',
                'category.required' => 'Informe a categoria do ativo.',
                'name.required' => 'Informe nome do ativo.'
            ]
        );
        $asset = $this->assetAggregation->save($request->all());
        if ($asset) {
            return response()->json([
                'success' => true,
                'id' => $asset->id
            ]);
        }
        return response()->json([
            'success' => false,
            'error' => 'Ocorreu um erro inesperado no sistema.'
        ]);
    }

    public function get(Request $request)
    {
        $data = $this->assetAggregation->save($request->assetId);
        if ($data) {
            return response()->json([
                'success' => true,
                'data' => $data,
                'token' => App('session')->getId()
            ]);
        }
        return response()->json([
            'success' => false,
            'error' => 'Ocorreu um erro inesperado no sistema.'
        ]);
    }

    public function list(Request $request)
    {
        $data = $this->assetAggregation->list();
        if ($data) {
            return response()->json([
                'success' => true,
                'data' => $data
            ]);
        }
        return response()->json([
            'success' => false,
            'error' => 'Ocorreu um erro inesperado no sistema.'
        ]);
    }

    public function listCategory(Request $request)
    {
        $data = $this->assetAggregation->listCategory();
        if ($data) {
            return response()->json([
                'success' => true,
                'data' => $data
            ]);
        }
        return response()->json([
            'success' => false,
            'error' => 'Ocorreu um erro inesperado no sistema.'
        ]);
    }

    public function listStatus(Request $request)
    {
        $data = $this->assetAggregation->listStatus();
        if ($data) {
            return response()->json([
                'success' => true,
                'data' => $data
            ]);
        }
        return response()->json([
            'success' => false,
            'error' => 'Ocorreu um erro inesperado no sistema.'
        ]);
    }

    public function listTriggers(Request $request)
    {
        \DB::connection()->enableQueryLog();
        $data = $this->assetAggregation->listTriggers();
        if ($data) {
            return response()->json([
                'success' => true,
                'data' => $data,
                'query' => \DB::getQueryLog(),
                'token' => App('session')->getId()
            ]);
        }
        return response()->json([
            'success' => false,
            'query' => \DB::getQueryLog(),
            'error' => 'Ocorreu um erro inesperado no sistema.'
        ]);
    }

    public function listWebhooks(Request $request)
    {
        \DB::connection()->enableQueryLog();
        $data = $this->assetAggregation->listWebhooks();
        if ($data) {
            return response()->json([
                'success' => true,
                'data' => $data,
                'query' => \DB::getQueryLog(),
                'token' => App('session')->getId()
            ]);
        }
        return response()->json([
            'success' => false,
            'query' => \DB::getQueryLog(),
            'error' => 'Ocorreu um erro inesperado no sistema.'
        ]);
    }
}
