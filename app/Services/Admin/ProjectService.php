<?php

namespace App\Services\Admin;

use App\Models\Project;
use App\Enums\ModuleEnum;
use Illuminate\Support\Str;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use App\Models\ProjectTranslate;
use Illuminate\Database\Eloquent\Model;

class ProjectService extends BaseService
{
    protected $imageService;
    protected $fileService;
    protected $project;

    public function __construct(Project $project)
    {
        parent::__construct($project, ModuleEnum::Project);
        $this->imageService = new ImageService(ModuleEnum::Project);
        $this->fileService = new FileService(ModuleEnum::Project);
    }

    public function create(Object $request)
    {
        $data = new Request([
            "slug" => Str::slug($request->title[app()->getLocale()]),
            "status" => $request->status,
            // "category_id" => $request->category_id,
            "video" => $request->video,
            // "model3D" => $request->model3D,
            // "start_date" => $request->start_date,
            // "end_date" => $request->end_date,
            "order" => $request->order
        ]);

        if (isset($request->image) && $request->image->isValid()) {
            $data->merge(["image" => $this->imageService->upload($request->image)]);
        }

        if (isset($request->thumbnail) && $request->thumbnail->isValid()) {
            $data->merge(["thumbnail" => $this->imageService->upload($request->thumbnail, true)]);
        }

        if (isset($request->brochure) && $request->brochure->isValid()) {
            $data->merge(["brochure" => $this->fileService->upload($request->brochure)]);
        }

        $query = parent::create($data);
        if ($query->id) {
            $this->translations($query->id, $request);
        }

        return $query;
    }

    public function update(Object $request, Model $project)
    {
        $data = new Request([
            "slug" => Str::slug($request->title[app()->getLocale()]),
            "status" => $request->status,
            // "category_id" => $request->category_id,
            "video" => $request->video,
            // "model3D" => $request->model3D,
            // "start_date" => $request->start_date,
            // "end_date" => $request->end_date,
            "order" => $request->order
        ]);

        if (isset($request->imageDelete)) {
            parent::imageDelete($project);
        }

        if (isset($request->thumbnailDelete)) {
            if ($project->thumbnail)
                $this->imageService->delete($project->thumbnail);
            $data->merge(["thumbnail" => null]);
        }

        if (isset($request->brochureDelete)) {
            if ($project->brochure)
                $this->fileService->delete($project->brochure);
            $data->merge(["brochure" => null]);
        }

        if (isset($request->image) && $request->image->isValid()) {
            $data->merge(["image" => $this->imageService->upload($request->image)]);
            if ($data->image && !is_null($project->image))
                $this->imageService->delete($project->image);
        }

        if (isset($request->thumbnail) && $request->thumbnail->isValid()) {
            $data->merge(["thumbnail" => $this->imageService->upload($request->thumbnail, true)]);
            if ($data->thumbnail && !is_null($project->thumbnail))
                $this->imageService->delete($project->thumbnail);
        }

        if (isset($request->brochure) && $request->brochure->isValid()) {
            $data->merge(["brochure" => $this->fileService->upload($request->brochure)]);
            if ($data->brochure && !is_null($project->brochure))
                $this->fileService->delete($project->brochure);
        }

        $query = parent::update($data, $project);

        if ($query) {
            $this->translations($project->id, $request);
        }

        return $query;
    }

    public function translations(int $projectId, Object $request)
    {
        $languages = languageList();
        foreach ($languages as $language) {
            if (!empty($request->title[$language->code]) || !empty($request->description[$language->code])) {
                ProjectTranslate::updateOrCreate(
                    [
                        "project_id" => $projectId,
                        "lang" => $language->code
                    ],
                    [
                        "title" => $request->title[$language->code] ?? null,
                        "description" => $request->description[$language->code] ?? null,
                        "shortdescription" => $request->shortdescription[$language->code] ?? null,
                        // "features" => trim($request->features[$language->code]) ?? null
                    ]
                );
            }
        }
    }

    public function imageUpload(Object $request)
    {
        $data = new Request([
            "project_id" => $request->project_id,
            "image" => $this->imageService->upload($request->file),
        ]);

        return ProjectImage::create($data->all());
    }

    public function imageAllDelete(Model $project)
    {
        if (!$project->images->isEmpty()) {
            $this->imageService->delete($project->images->pluck("image")->toArray());
        }
        return ProjectImage::where("project_id", $project->id)->delete();
    }

    public function delete(Model $project)
    {
        $this->imageAllDelete($project);
        return parent::delete($project);
    }
}
