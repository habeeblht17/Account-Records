<?php

namespace App\Http\Livewire;

use App\Exports\AssetExport;
use App\Models\Asset;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Assets extends Component
{
    use WithPagination;

    public $modalFormVisible = false;
    public $modalConfirmDeleteVisible = false;

    public $modelId;
    public $amount;
    public $type;
    public $description;

    public $q;
    public $qq;
    public $qqq;
    public $sortBy = 'id';
    public $sortDesc = true;

    public $selectedRows = [];
    public $selectPageRows = false;


    public function modelData()
    {
        return [
            'amount' => $this->amount,
            'type' => $this->type,
            'description' => $this->description,
        ];
    }

    public function rules()
    {
        return[
            'amount' => 'required|numeric',
            'type' => 'required|string',
            'description' => 'required|string|min:5',
        ];
    }

    public function mount()
    {
        $this->resetPage();
    }

    public function resetModelData()
    {
        $this->modelId = null;
        $this->amount = null;
        $this->type = null;
        $this->description = null;
    }

    public function save()
    {
        $this->validate();
        Asset::create($this->modelData());
        $this->modalFormVisible = false;
        $this->resetModelData();
        session()->flash('success', 'Asset Added Successfully!');
    }

    public function showAddAsset()
    {
        $this->resetValidation();
        $this->resetModelData();
        $this->modalFormVisible = true;
    }

    public function showUpdateAsset($id)
    {
        $this->resetValidation();
        $this->resetModelData();
        $this->modelId = $id;
        $this->modalFormVisible = true;
        $this->loadModel();
    }

    public function showDeleteAsset($id)
    {
        $this->modelId = $id;
        $this->modalConfirmDeleteVisible = true;
    }

    public function loadModel()
    {
        $assets = Asset::find($this->modelId);
        $this->amount = $assets->amount;
        $this->type = $assets->type;
        $this->description = $assets->description;
    }

    public function update()
    {
        $this->validate();
        Asset::find($this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;
        session()->flash('success', 'Asset Updated Successfully!');
    }

    public function delete()
    {
        Asset::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        session()->flash('success', 'Asset Deleted Successfully!');
        $this->resetPage();
    }

    public function updatedSelectPageRows($value)
    {

        if($value) {
            $this->selectedRows = $this->assets->pluck('id')->map(function($id) {
                return (string) $id;
            });
        }else {
            $this->reset(['selectedRows', 'selectPageRows']);
        }

    }

    public function getAssetsProperty()
    {
        return Asset::when($this->q, function($query) {
            return $query->where(function($query) {
                $query->where('amount', 'like', '%'. $this->q .'%')
                ->orwhere('type', 'like', '%'. $this->q .'%');
            });
        })
        ->when($this->qq, function($query) {
            return $query->where('type', 'inflow');
        })
        ->when($this->qqq, function($query) {
            return $query->where('type', 'outflow');
        })
        ->orderBy($this->sortBy, $this->sortDesc ? 'desc' : 'asc')
        ->paginate(10);
    }

    public function sortBy($data)
        {
        $this->sortBy = $data;
    }

    public function deleteSelectedRows()
    {
        Asset::whereIn('id', $this->selectedRows)->delete();
        session()->flash('success', 'All the selected Assets has been successfully deleted');
        $this->reset(['selectedRows', 'selectPageRows']);
    }

    public function export()
    {
        return (new AssetExport($this->selectedRows))->download('assets.xls');
    }

    public function render()
    {
        $assets = $this->assets;
        return view('livewire.assets', ['assets' => $assets])->layout('layouts.base');
    }


}
