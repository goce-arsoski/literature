<?php

namespace App\Http\Livewire\Subscribers;

use Livewire\Component;

use App\Models\Subscriber;

use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $per_page = [10, 25, 50];
    public $per_page_selected = 10;
    public $search = '';
    public $order_by = 'id';
    public $order_type = 'asc';

    protected $listeners = [
        '$refresh'
    ];

    public function delete_subscriber(Subscriber $subscriber)
    {
        $this->emitTo('modal', 'delete_subscriber', $subscriber->id);
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

    public function set_active($subscriber_id)
    {      
        $subscriber = Subscriber::find($subscriber_id);
        $active = $subscriber->active;

        $subscriber->active = !$active;

        $subscriber->save();
    }

    public function render()
    {
        $subscribers = Subscriber::where('email', 'like', '%' . $this->search . '%')
            ->orderBy($this->order_by, $this->order_type)
            ->paginate($this->per_page_selected);

        return view('livewire.subscribers.index', [
            'subscribers' => $subscribers
        ]);
    }
}
