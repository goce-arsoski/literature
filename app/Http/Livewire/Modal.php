<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\Subscriber;

class Modal extends Component
{
    public $model_to_delete = "";
    public $modal_property = "hidden";
    public $model_id = null;

    protected $listeners = [
        'delete_user' => 'delete_user',
        'delete_blog' => 'delete_blog',
        'delete_faq' => 'delete_faq',
        'delete_subscriber' => 'delete_subscriber'
    ];

    public function hide()
    {
        $this->modal_property = "hidden";
    }

    public function delete_user($user_id)
    {
        $this->model_to_delete = "user";
        $this->modal_property = "block";
        $this->model_id = $user_id;
    }

    public function confirm_user_deletion($user_id)
    {
        $user = User::find($user_id);
        $user->delete();

        $this->model_to_delete = "";
        $this->modal_property = "hidden";
        $this->model_id = null;
        $this->emitTo('users.index', '$refresh');
    }

    public function delete_blog($blog_id)
    {
        $this->model_to_delete = "blog";
        $this->modal_property = "block";
        $this->model_id = $blog_id;
    }

    public function confirm_blog_deletion($blog_id)
    {
        $blog = Blog::find($blog_id);
        $blog->delete();

        $this->model_to_delete = "";
        $this->modal_property = "hidden";
        $this->model_id = null;
        $this->emitTo('blogs.index', '$refresh');
    }

    public function delete_faq($faq_id)
    {
        $this->model_to_delete = "faq";
        $this->modal_property = "block";
        $this->model_id = $faq_id;
    }

    public function confirm_faq_deletion($faq_id)
    {
        $faq = Faq::find($faq_id);
        $faq->delete();

        $faqs = Faq::orderBy('order')->get();

        foreach ($faqs as $key => $faq_value) {
            $faq_value->order = $key + 1;
            $faq_value->save();
        }


        $this->model_to_delete = "";
        $this->modal_property = "hidden";
        $this->model_id = null;
        $this->emitTo('faqs.index', '$refresh');
    }

    public function delete_subscriber($subscriber_id)
    {
        $this->model_to_delete = "subscriber";
        $this->modal_property = "block";
        $this->model_id = $subscriber_id;
    }

    public function confirm_subscriber_deletion($subscriber_id)
    {
        $subscriber = Subscriber::find($subscriber_id);
        $subscriber->delete();

        $this->model_to_delete = "";
        $this->modal_property = "hidden";
        $this->model_id = null;
        $this->emitTo('subscribers.index', '$refresh');
    }

    public function render()
    {
        return view('livewire.modal');
    }
}
