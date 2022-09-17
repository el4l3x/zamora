<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    
    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $posts = Post::where('status', 2)
            ->where('name', 'LIKE', '%'.$this->search.'%')
            ->latest('id')
            ->paginate();

        return view('livewire.admin.post-index', [
            'posts' => $posts,
        ]);
    }
}
