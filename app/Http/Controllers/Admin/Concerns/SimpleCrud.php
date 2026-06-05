<?php

namespace App\Http\Controllers\Admin\Concerns;

use App\Support\MediaUploader;
use Illuminate\Http\Request;

trait SimpleCrud
{
    public function index()
    {
        $items = $this->model::orderBy('sort_order')->orderByDesc('id')->get();

        return view('admin.crud.index', [
            'items' => $items,
            'config' => $this->config,
            'routePrefix' => $this->routePrefix,
        ]);
    }

    public function create()
    {
        return view('admin.crud.form', [
            'item' => new $this->model,
            'config' => $this->config,
            'routePrefix' => $this->routePrefix,
            'venues' => class_exists(\App\Models\Venue::class) ? \App\Models\Venue::orderBy('name')->get() : collect(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->except(['_token', 'image_upload', 'photo_upload', 'video_file_upload', 'thumbnail_upload']);

        foreach ($this->fileFields as $field => $folder) {
            if ($request->hasFile($field.'_upload')) {
                $upload = $request->file($field.'_upload');

                if (str_contains($upload->getMimeType(), 'image')) {
                    [$w, $h] = $this->mediaSizes[$field] ?? [null, null];
                    $data[$field] = MediaUploader::image($upload, $folder, $w, $h);
                } else {
                    $data[$field] = MediaUploader::file($upload, $folder);
                }
            }
        }

        $data['is_active'] = $request->has('is_active');

        $this->model::create($data);

        return redirect()->route($this->routePrefix.'.index')->with('success', 'Data created.');
    }

    public function edit($id)
    {
        $item = $this->model::findOrFail($id);

        return view('admin.crud.form', [
            'item' => $item,
            'config' => $this->config,
            'routePrefix' => $this->routePrefix,
            'venues' => class_exists(\App\Models\Venue::class) ? \App\Models\Venue::orderBy('name')->get() : collect(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $item = $this->model::findOrFail($id);
        $data = $request->except(['_token', '_method', 'image_upload', 'photo_upload', 'video_file_upload', 'thumbnail_upload']);

        foreach ($this->fileFields as $field => $folder) {
            if ($request->hasFile($field.'_upload')) {
                $upload = $request->file($field.'_upload');

                if (str_contains($upload->getMimeType(), 'image')) {
                    [$w, $h] = $this->mediaSizes[$field] ?? [null, null];
                    $data[$field] = MediaUploader::image($upload, $folder, $w, $h);
                } else {
                    $data[$field] = MediaUploader::file($upload, $folder);
                }
            }
        }

        $data['is_active'] = $request->has('is_active');

        $item->update($data);

        return redirect()->route($this->routePrefix.'.index')->with('success', 'Data updated.');
    }

    public function destroy($id)
    {
        $item = $this->model::findOrFail($id);
        $item->delete();

        return back()->with('success', 'Data deleted.');
    }
}
