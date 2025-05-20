<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductFilter extends Component
{
    use WithPagination;

    public $category = '';
    public $limit = null;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingCategory()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Product::query();

        if ($this->category) {
            $query->where('category', $this->category);
        }

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        if ($this->limit) {
            $query->take($this->limit);
        }

        $products = $query->latest()->get();

        return view('livewire.product-filter', [
            'products' => $products,
            'categories' => [
                'Ulang Tahun' => 'Ulang Tahun',
                'Pernikahan' => 'Pernikahan',
                'Wisuda' => 'Wisuda',
            ],
        ]);
    }
}
