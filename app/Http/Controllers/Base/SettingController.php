<?php

namespace App\Http\Controllers\Base;

use App\DataTables\Base\SettingDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Base\CreateSettingRequest;
use App\Http\Requests\Base\UpdateSettingRequest;
use App\Repositories\Base\SettingRepository;
use Flash;
use Response;

class SettingController extends AppBaseController
{
    /** @var SettingRepository */
    private $settingRepository;

    public function __construct(SettingRepository $settingRepo)
    {
        $this->settingRepository = $settingRepo;
    }

    /**
     * Display a listing of the Setting.
     *
     * @return Response
     */
    public function index(SettingDataTable $settingDataTable)
    {
        return $settingDataTable->render('base.settings.index');
    }

    /**
     * Show the form for creating a new Setting.
     *
     * @return Response
     */
    public function create()
    {
        return view('base.settings.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created Setting in storage.
     *
     * @return Response
     */
    public function store(CreateSettingRequest $request)
    {
        $input = $request->all();

        $setting = $this->settingRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/settings.singular')]));

        return redirect(route('base.settings.index'));
    }

    /**
     * Display the specified Setting.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $setting = $this->settingRepository->find($id);

        if (empty($setting)) {
            Flash::error(__('models/settings.singular').' '.__('messages.not_found'));

            return redirect(route('base.settings.index'));
        }

        return view('base.settings.show')->with('setting', $setting);
    }

    /**
     * Show the form for editing the specified Setting.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $setting = $this->settingRepository->find($id);

        if (empty($setting)) {
            Flash::error(__('messages.not_found', ['model' => __('models/settings.singular')]));

            return redirect(route('base.settings.index'));
        }

        return view('base.settings.edit')->with('setting', $setting)->with($this->getOptionItems());
    }

    /**
     * Update the specified Setting in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateSettingRequest $request)
    {
        $setting = $this->settingRepository->find($id);

        if (empty($setting)) {
            Flash::error(__('messages.not_found', ['model' => __('models/settings.singular')]));

            return redirect(route('base.settings.index'));
        }

        $setting = $this->settingRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/settings.singular')]));

        return redirect(route('base.settings.index'));
    }

    /**
     * Remove the specified Setting from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $setting = $this->settingRepository->find($id);

        if (empty($setting)) {
            Flash::error(__('messages.not_found', ['model' => __('models/settings.singular')]));

            return redirect(route('base.settings.index'));
        }

        $this->settingRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/settings.singular')]));

        return redirect(route('base.settings.index'));
    }

    /**
     * Provide options item based on relationship model Setting from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        return [
        ];
    }
}
