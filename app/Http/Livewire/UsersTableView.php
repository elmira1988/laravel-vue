<?php

namespace App\Http\Livewire;

use App\Filters\UsersCreatedFilter;
use LaravelViews\Facades\Header;
use App\User;
use LaravelViews\Views\TableView;
use Illuminate\Database\Eloquent\Builder;

class UsersTableView extends TableView
{
    protected $model = User::class;
    public $searchBy = ['name', 'email'];
    /**
     * Sets a initial query with the data to fill the table
     *
     * @return Builder Eloquent query
     */
    public function repository(): Builder
    {
         return User::query();
    }

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            Header::title('Name')->sortBy('name'),
            'Email',
            'Created',
            'Updated'
        ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row($model): array
    {
        return [
            $model->name,
            $model->email,
            $model->created_at,
            $model->updated_at
        ];
    }


    protected function filters()
    {
        return [
            new UsersCreatedFilter
        ];
    }
}
