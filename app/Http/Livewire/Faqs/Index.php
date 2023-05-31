<?php

namespace App\Http\Livewire\Faqs;

use Livewire\Component;

use App\Models\Faq;
use App\Models\Settings;

use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $per_page = [10, 25, 50];
    public $per_page_selected = 10;
    public $search = '';
    public $order_by = 'order';
    public $order_type = 'asc';

    protected $listeners = [
        '$refresh'
    ];

    public function delete_faq(Faq $faq)
    {
        $this->emitTo('modal', 'delete_faq', $faq->id);
    }

    public function order_by($order_by)
    {
        if ($order_by == $this->order_by) {
            if ($this->order_type == 'asc') {
                $this->order_type = 'desc';
            } else {
                $this->order_type = 'asc';
            }
        } else {
            $this->order_by = $order_by;
            $this->order_type = 'asc';
        }
    }

    public function move_down($id)
    {
        $current_faq = Faq::find($id);
        $current_faq_order = $current_faq->order;

        $next_faq = Faq::where('order', $current_faq_order + 1)->first();

        if ($next_faq != null) {
            $next_faq_order = $next_faq->order;
            $next_faq->order = $next_faq_order - 1;
            $next_faq->save();
        }

        $current_faq->order = $current_faq_order + 1;
        $current_faq->save();
    }

    public function move_up($id)
    {
        $current_faq = Faq::find($id);
        $current_faq_order = $current_faq->order;

        $previous_faq = Faq::where('order', $current_faq_order - 1)->first();

        if ($previous_faq != null) {
            $previous_faq_order = $previous_faq->order;
            $previous_faq->order = $previous_faq_order + 1;
            $previous_faq->save();
        }

        $current_faq->order = $current_faq_order - 1;
        $current_faq->save();
    }

    public function render()
    {
        $faqs = Faq::where('question', 'like', '%' . $this->search . '%')
            ->orWhere('answer', 'like', '%' . $this->search . '%')
            ->orderBy($this->order_by, $this->order_type)
            ->paginate($this->per_page_selected);

        return view('livewire.faqs.index', [
            'faqs' => $faqs
        ]);
    }
}