<?php

namespace App\Http\Livewire;

use App\Models\PayoutHistory;
use Livewire\Component;
use Livewire\WithFileUploads;

class PayOuts extends Component
{
    use WithFileUploads;

    public $payoutID;
    public $is_approved;
    public $listeners = ['bindEdit'];
    public $receipt;

    public function render()
    {
        return view('livewire.pay-outs');
    }

    public function bindEdit($id)
    {
        $result = PayoutHistory::find($id)->first();

        $this->is_approved = $result->is_approved;
        $this->payoutID    = $result->id;
    }

    public function update()
    {
        PayoutHistory::where('id', $this->payoutID)
            ->update([
                'approved_by' => auth()->id(),
                'is_approved' => $this->is_approved,
            ]);

        if ($this->receipt) {
            PayoutHistory::where('id', $this->payoutID)
                ->update([
                    'receipt_path' => $this->receipt->store('receipt'),
                ]);
        }


        $this->emit('refreshDatatable');
    }
}
