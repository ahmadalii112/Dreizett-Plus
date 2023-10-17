<?php

namespace App\Http\Service;

use App\Http\Repositories\BaseRepository;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class BaseService
{
    protected BaseRepository $repository;

    public function all(array $with = []): Collection
    {
        return $this->repository->all($with);
    }

    /**
     * Get paginated records from the repository with optional relationships.
     */
    public function paginate(int $perPage = 10, array $with = [], array $where = [], array $orWhere = []): LengthAwarePaginator
    {
        return $this->repository->paginate($with, $perPage, $where, $orWhere);
    }

    /**
     * The function updates data in a repository based on specified conditions.
     *
     * @param  array  $where where An associative array specifying the conditions that the rows to be updated
     * must meet. The keys of the array represent the column names, and the values represent the
     * desired values for those columns.
     * @param  array  $data data An associative array containing the data to be updated in the database. The
     * keys of the array represent the column names, and the values represent the new values for those
     * columns.
     * @param  array  $orWhere orWhere The orWhere parameter is an optional array that specifies additional
     * conditions for the update operation. These conditions are used in conjunction with the
     * parameter to determine which records should be updated. If no conditions are specified in
     * orWhere, only the conditions in where will be used.
     * @return bool A boolean value is being returned.
     */
    public function update(array $where, array $data, array $orWhere = []): bool
    {
        return $this->repository->update($where, $data, $orWhere);
    }

    /**
     * The function creates a new model instance using the given data and returns it.
     *
     * @param  array  $data data The "data" parameter is an array that contains the data needed to create a new
     * model instance. This data typically includes the values for the model's attributes.
     * @return Model|Authenticatable The create method is returning a Model object.
     */
    public function create(array $data): Model|Authenticatable
    {
        return $this->repository->create($data);
    }

    /**
     * The function "find" retrieves a model by its ID from the repository.
     *
     * @param  int  $id id The "id" parameter is an integer that represents the unique identifier of the
     * model you want to find.
     * @param  array  $with with The "with" parameter is an optional array that allows you to specify
     * relationships to eager load with the model. Eager loading is a technique in which you load the
     * related models along with the main model to reduce the number of database queries.
     * @return ?Model an instance of the Model class or null.
     */
    public function find(int $id, array $with = []): ?Model
    {
        return $this->repository->find($id, $with);
    }

    /**
     * The function returns the first model that matches the given conditions and includes the
     * specified relationships.
     *
     * @param  array  $where where An array of key-value pairs representing the conditions that the query should
     * match. For example, if you want to retrieve records where the "name" column is equal to "John",
     * you would pass ['name' => 'John'] as the value for the "where" parameter.
     * @param  array  $orWhere orWhere The "orWhere" parameter is used to specify additional conditions for the
     * query using the OR operator. It is an array of key-value pairs where the key represents the
     * column name and the value represents the condition. For example, if you want to find records
     * where the "name" column is either "John"
     * @param  array  $whereNotNull whereNotNull The "whereNotNull" parameter is an array that specifies the conditions
     * for selecting records where the specified columns are not null. It is used to filter the records
     * based on the specified column values that are not null.
     * @param  array  $with with The "with" parameter is used to specify the relationships that should be eager
     * loaded with the model. It accepts an array of relationship names. Eager loading allows you to
     * load related models in a single query, which can help improve performance when accessing the
     * relationships.
     * @return ?Model a Model object or null.
     */
    public function first(array $where = [], array $orWhere = [], array $whereNotNull = [], array $with = []): ?Model
    {
        return $this->repository->first($where, $orWhere, $whereNotNull, $with);
    }

    /**
     * The function returns a collection of data based on specified conditions and relationships.
     *
     * @param  array  $where where An array of conditions to filter the query results. Each element in the array
     * should be a key-value pair where the key represents the column name and the value represents the
     * condition to be applied on that column.
     * @param  array  $orWhere orWhere The "orWhere" parameter is an array that specifies additional conditions
     * for the query using the OR operator. Each element in the array represents a condition and should
     * be in the format `[column, operator, value]`. For example, `['name', 'like', '%John%']` would
     * search for
     * @param  array  $with The "with" parameter is used to specify any relationships that should be eager
     * loaded with the query. It accepts an array of relationship names. Eager loading allows you to
     * retrieve related models in a more efficient way, reducing the number of database queries.
     * @return Collection a Collection.
     */
    public function get(array $where = [], array $orWhere = [], array $with = []): Collection
    {
        return $this->repository->get($where, $orWhere, $with);
    }

    /**
     * The function checks if a record exists in the repository based on the given conditions.
     *
     * @param  array  $where where An array that specifies the conditions that must be met for a record to exist
     * in the repository. Each key-value pair in the array represents a condition, where the key is the
     * column name and the value is the expected value for that column.
     * @param  array  $orWhere orWhere The "orWhere" parameter is an optional array that specifies additional
     * conditions for the existence check. If provided, the function will check if any of the
     * conditions in  are true in addition to the conditions specified in the "where" array.
     * @return bool A boolean value is being returned.
     */
    public function exists(array $where, array $orWhere = []): bool
    {
        return $this->repository->exists($where, $orWhere);
    }

    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }

    public function pluck(string $valueColumn = 'name', string $keyColumn = 'key'): array
    {
        return $this->repository->pluck($valueColumn, $keyColumn);
    }

    public function updateOrCreate(array $where, array $data): Model
    {
        return $this->repository->updateOrCreate($where, $data);
    }

    public function role($roleName)
    {
        return $this->repository->role($roleName);
    }

    public function select(array $with = [], array $where = [], array $orWhere = []): Builder
    {
        return $this->repository->select($with, $where, $orWhere);
    }
}
